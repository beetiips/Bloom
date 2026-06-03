<?php

namespace App\DataFixtures;

use App\Entity\Exercises;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ExercisesFixtures extends Fixture
{
    private ParameterBagInterface $params;

    public function __construct(ParameterBagInterface $params) {
        $this->params = $params;
    }

    public function load(ObjectManager $manager): void {
        $projectDir = $this->params->get('kernel.project_dir');
        $jsonPath = $projectDir . '/data/exercises.json';

        $json = file_get_contents($jsonPath);
        $exercisesFile = json_decode($json, true);

        foreach ($exercisesFile as $data) {
            $exercise = new Exercises();
            $exercise->setName($data['name']);
            $exercise->setCategory($data['category']);
            $exercise->setBodyPart($data['body_part']);
            $exercise->setEquipment($data['equipment']);
            $exercise->setOwner($data['owner'] ?? null);
            $exercise->setInstructionsEn($data['instructions']['en'] ?? null);
            $exercise->setMuscleGroup($data['muscle_group']);
            $exercise->setSecondaryMuscles($data['secondary_muscles']);
            $exercise->setTarget($data['target']);

            $exercise->setImage($data['image']);
            $exercise->setGifUrl($data['gif_url'] ?? null);

            $manager->persist($exercise);
        }

        $manager->flush();
    }
}
