<?php

namespace App\Controller;

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
}
