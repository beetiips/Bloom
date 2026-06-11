<?php

namespace App\Controller;

use App\Entity\WorkoutRoutine;
use App\Form\WorkoutRoutineFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\WorkoutRoutineRepository;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class WorkoutRoutineController extends AbstractController
{
    #[Route('/new-routine', name: 'app_new_routine')]
    #[IsGranted('ROLE_USER')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $workoutRoutine = new WorkoutRoutine();
        $workoutRoutine->setUser($this->getUser());

        $form = $this->createForm(WorkoutRoutineFormType::class, $workoutRoutine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($workoutRoutine);
            $entityManager->flush();
            return $this->redirectToRoute('app_workout_routine');
        }

        return $this->render('routine/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/my-workout-routine', name: 'app_workout_routine')]
    #[IsGranted('ROLE_USER')]
    public function index(WorkoutRoutineRepository $workoutRoutineRepository): Response
    {
        $user = $this->getUser();
        $dayColumn = lcfirst(date('l')) . 'Checked';

        $dayRoutines = $workoutRoutineRepository->findBy(['user' => $user, $dayColumn => true]);
        $allRoutines = $workoutRoutineRepository->findBy(['user' => $user]);

        return $this->render('routine/index.html.twig', [
            'dayRoutines' => $dayRoutines,
            'allRoutines' => $allRoutines,
        ]);
    }

    #[Route('/{id}/edit-routine', name: 'app_edit_routine')]
    #[IsGranted('ROLE_USER')]
    public function edit(Request $request, WorkoutRoutine $workoutRoutine, EntityManagerInterface $entityManager): Response
    {
        if ($workoutRoutine->getUser() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $form = $this->createForm(WorkoutRoutineFormType::class, $workoutRoutine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_workout_routine');
        }

        return $this->render('routine/edit.html.twig', [
            'form' => $form->createView(),
            'workoutRoutine' => $workoutRoutine,
        ]);
    }

    #[Route('/{id}/delete-routine', name: 'app_delete_routine', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function delete(Request $request, WorkoutRoutine $workoutRoutine, EntityManagerInterface $entityManager): Response
    {
        if ($workoutRoutine->getUser() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        if ($this->isCsrfTokenValid('delete'.$workoutRoutine->getId(), $request->request->get('_token'))) {
            $entityManager->remove($workoutRoutine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_workout_routine');
    }

}
