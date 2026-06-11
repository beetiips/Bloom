<?php

namespace App\Controller\api;

use App\Repository\ExercisesRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class ExercisesAPIController extends AbstractController
{
    #[Route('/api/exercises', name: 'app_api_exercises')]
    #[IsGranted('ROLE_USER')]
    public function index(Request $request, ExercisesRepository $exercisesRepository): JsonResponse
    {

        $request->query->get('exercises');
        $search = $request->query->get('search');
        $body_part = $request->query->get('body_part');
        $equipment = $request->query->get('equipment');
        $exercises = $exercisesRepository->findExercisesForRoutinesByFilter($search, $body_part, $equipment);

        $data = [];

        foreach ($exercises as $exercise) {
            $data[] = [
                'id' => $exercise->getId(),
                'name' => $exercise->getName(),
                'instructions_en' => $exercise->getInstructionsEn(),
                'equipment' => $exercise->getEquipment(),
                'body_part' => $exercise->getBodyPart(),
            ];
        }

        return $this->json($data);
    }
}
