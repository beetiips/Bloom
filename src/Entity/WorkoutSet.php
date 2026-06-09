<?php

namespace App\Entity;

use App\Repository\WorkoutSetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorkoutSetRepository::class)]
class WorkoutSet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $reps = null;

    #[ORM\Column]
    private ?float $weight = null;

    #[ORM\Column]
    private ?int $rest_time = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReps(): ?int
    {
        return $this->reps;
    }

    public function setReps(int $reps): static
    {
        $this->reps = $reps;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getRestTime(): ?int
    {
        return $this->rest_time;
    }

    public function setRestTime(int $rest_time): static
    {
        $this->rest_time = $rest_time;

        return $this;
    }

}
