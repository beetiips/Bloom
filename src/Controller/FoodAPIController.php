<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class FoodAPIController extends AbstractController
{
    #[Route('/food', name: 'app_food')]
    public function index(HttpClientInterface $client): Response
    {
        $response = $client->request('GET', '/food');
        $foods = $response->toArray();

        return $this->render('food_api/index.html.twig', array(
            'foods' => $foods,
        ));
    }
}
