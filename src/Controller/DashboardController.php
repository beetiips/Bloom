<?php

namespace App\Controller;

use App\Repository\WorkoutRoutineRepository;
use App\Repository\DailyLogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(WorkoutRoutineRepository $workoutRoutineRepository, DailyLogRepository $dailyLogRepository): Response
    {
        $user = $this->getUser();

        if (!$user->hasCompletedOnboarding()) {
            return $this->redirectToRoute('app_onboarding');
        }

        $dayColumn = lcfirst(date('l')) . 'Checked';

        $dayRoutines = $workoutRoutineRepository->findBy([
            'user' => $user,
            $dayColumn => true
        ]);

        $latestLog = $dailyLogRepository->findOneBy(
            ['user' => $user],
            ['date' => 'DESC']
        );

        return $this->render('dashboard/index.html.twig', [
            'user' => $user,
            'dayRoutines' => $dayRoutines,
            'latestLog' => $latestLog,
        ]);
    }
}
