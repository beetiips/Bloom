<?php

namespace App\Controller;

use App\Repository\WorkoutRoutineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        $user = $this->getUser();

        if (!$user->hasCompletedOnboarding()) {
            return $this->redirectToRoute('app_onboarding');
        }

        return $this->render('dashboard/index.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    #[IsGranted('ROLE_USER')]
    public function workoutRoutine(WorkoutRoutineRepository $workoutRoutineRepository): Response
    {
        $user = $this->getUser();

        $dayColumn = lcfirst(date('l')) . 'Checked';

        $dayRoutines = $workoutRoutineRepository->findBy([
            'user' => $user,
            $dayColumn => true
        ]);

        return $this->render('dashboard/index.html.twig', [
            'dayRoutines' => $dayRoutines,
        ]);
    }
}
