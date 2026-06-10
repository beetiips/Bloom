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
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'workoutRoutines')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column]
    private ?bool $mondayChecked = null;

    #[ORM\Column]
    private ?bool $tuesdayChecked = null;

    #[ORM\Column]
    private ?bool $wednesdayChecked = null;

    #[ORM\Column]
    private ?bool $thursdayChecked = null;

    #[ORM\Column]
    private ?bool $fridayChecked = null;

    #[ORM\Column]
    private ?bool $saturdayChecked = null;

    #[ORM\Column]
    private ?bool $sundayChecked = null;

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

    public function getMondayChecked(): ?bool
    {
        return $this->mondayChecked;
    }

    public function setMondayChecked(bool $mondayChecked): static
    {
        $this->mondayChecked = $mondayChecked;

        return $this;
    }

    public function getTuesdayChecked(): ?bool
    {
        return $this->tuesdayChecked;
    }

    public function setTuesdayChecked(bool $tuesdayChecked): static
    {
        $this->tuesdayChecked = $tuesdayChecked;

        return $this;
    }

    public function getWednesdayChecked(): ?bool
    {
        return $this->wednesdayChecked;
    }

    public function setWednesdayChecked(bool $wednesdayChecked): static
    {
        $this->wednesdayChecked = $wednesdayChecked;

        return $this;
    }

    public function getThursdayChecked(): ?bool
    {
        return $this->thursdayChecked;
    }

    public function setThursdayChecked(bool $thursdayChecked): static
    {
        $this->thursdayChecked = $thursdayChecked;

        return $this;
    }

    public function getFridayChecked(): ?bool
    {
        return $this->fridayChecked;
    }

    public function setFridayChecked(bool $fridayChecked): static
    {
        $this->fridayChecked = $fridayChecked;

        return $this;
    }

    public function getSaturdayChecked(): ?bool
    {
        return $this->saturdayChecked;
    }

    public function setSaturdayChecked(bool $saturdayChecked): static
    {
        $this->saturdayChecked = $saturdayChecked;

        return $this;
    }

    public function getSundayChecked(): ?bool
    {
        return $this->sundayChecked;
    }

    public function setSundayChecked(bool $sundayChecked): static
    {
        $this->sundayChecked = $sundayChecked;

        return $this;
    }


}
