<?php

namespace App\Entity;

use App\Repository\WorkoutRoutineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorkoutRoutineRepository::class)]
class WorkoutRoutine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $day_of_week = null;

    #[ORM\Column]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'workoutRoutines')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    /**
     * @var Collection<int, Exercises>
     */
    #[ORM\ManyToMany(targetEntity: Exercises::class, inversedBy: 'workoutRoutines')]
    private Collection $Exercises;

    public function __construct()
    {
        $this->Exercises = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDayOfWeek(): ?string
    {
        return $this->day_of_week;
    }

    public function setDayOfWeek(string $day_of_week): static
    {
        $this->day_of_week = $day_of_week;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Exercises>
     */
    public function getExercises(): Collection
    {
        return $this->Exercises;
    }

    public function addExercise(Exercises $exercise): static
    {
        if (!$this->Exercises->contains($exercise)) {
            $this->Exercises->add($exercise);
        }

        return $this;
    }

    public function removeExercise(Exercises $exercise): static
    {
        $this->Exercises->removeElement($exercise);

        return $this;
    }

}
