<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
final class OnboardingController extends AbstractController
{
    #[Route('/onboarding', name: 'app_onboarding')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

        if ($user->hasCompletedOnboarding()) {
            return $this->redirectToRoute('app_dashboard');
        }

        if ($request->isMethod('POST')) {
            $sleepDuration = $request->request->get('sleep_duration');
            $sleepQuality = $request->request->get('sleep_quality');
            $mealText = $request->request->get('meal_text');
            $level = $request->request->get('level');

            $user->setLevel($level);
            $user->setHasCompletedOnboarding(true);
            $em->flush();

            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('onboarding/index.html.twig');
    }
}
