<?php

namespace App\Entity;

use App\Repository\ExercisesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExercisesRepository::class)]
class Exercises
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\Column(length: 255)]
    private ?string $body_part = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $equipment = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $instructions_en = null;

    #[ORM\Column(length: 255)]
    private ?string $muscle_group = null;

    #[ORM\Column(nullable: true)]
    private ?array $secondary_muscles = null;

    #[ORM\Column(length: 255)]
    private ?string $target = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $gif_url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $owner = null;

    /**
     * @var Collection<int, WorkoutRoutine>
     */
    #[ORM\ManyToMany(targetEntity: WorkoutRoutine::class, mappedBy: 'Exercises')]
    private Collection $workoutRoutines;

    public function __construct()
    {
        $this->workoutRoutines = new ArrayCollection();
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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getBodyPart(): ?string
    {
        return $this->body_part;
    }

    public function setBodyPart(string $body_part): static
    {
        $this->body_part = $body_part;

        return $this;
    }

    public function getEquipment(): ?string
    {
        return $this->equipment;
    }

    public function setEquipment(?string $equipment): static
    {
        $this->equipment = $equipment;

        return $this;
    }

    public function getInstructionsEn(): ?string
    {
        return $this->instructions_en;
    }

    public function setInstructionsEn(string $instructions_en): static
    {
        $this->instructions_en = $instructions_en;

        return $this;
    }

    public function getMuscleGroup(): ?string
    {
        return $this->muscle_group;
    }

    public function setMuscleGroup(string $muscle_group): static
    {
        $this->muscle_group = $muscle_group;

        return $this;
    }

    public function getSecondaryMuscles(): ?array
    {
        return $this->secondary_muscles;
    }

    public function setSecondaryMuscles(?array $secondary_muscles): static
    {
        $this->secondary_muscles = $secondary_muscles;

        return $this;
    }

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(string $target): static
    {
        $this->target = $target;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getGifUrl(): ?string
    {
        return $this->gif_url;
    }

    public function setGifUrl(?string $gif_url): static
    {
        $this->gif_url = $gif_url;

        return $this;
    }

    public function getOwner(): ?string
    {
        return $this->owner;
    }

    public function setOwner(?string $owner): static
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection<int, WorkoutRoutine>
     */
    public function getWorkoutRoutines(): Collection
    {
        return $this->workoutRoutines;
    }

    public function addWorkoutRoutine(WorkoutRoutine $workoutRoutine): static
    {
        if (!$this->workoutRoutines->contains($workoutRoutine)) {
            $this->workoutRoutines->add($workoutRoutine);
            $workoutRoutine->addExercise($this);
        }

        return $this;
    }

    public function removeWorkoutRoutine(WorkoutRoutine $workoutRoutine): static
    {
        if ($this->workoutRoutines->removeElement($workoutRoutine)) {
            $workoutRoutine->removeExercise($this);
        }

        return $this;
    }
}
