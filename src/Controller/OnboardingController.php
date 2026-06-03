<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

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
            // things to ask the user
            $user->setHasCompletedOnboarding(true);
            $em->flush();

            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('onboarding/index.html.twig');
    }
}
