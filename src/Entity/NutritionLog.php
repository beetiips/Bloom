<?php

namespace App\Entity;

use App\Repository\NutritionLogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NutritionLogRepository::class)]
class NutritionLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $meal_name = null;

    #[ORM\Column(nullable: true)]
    private ?int $calories = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMealName(): ?string
    {
        return $this->meal_name;
    }

    public function setMealName(string $meal_name): static
    {
        $this->meal_name = $meal_name;

        return $this;
    }

    public function getCalories(): ?int
    {
        return $this->calories;
    }

    public function setCalories(?int $calories): static
    {
        $this->calories = $calories;

        return $this;
    }
}
