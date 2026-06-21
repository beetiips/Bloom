<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pseudo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $level = null;

    #[ORM\Column]
    private ?bool $hasCompletedOnboarding = false;

    /**
     * @var Collection<int, WorkoutRoutine>
     */
    #[ORM\OneToMany(targetEntity: WorkoutRoutine::class, mappedBy: 'user_id')]
    private Collection $workoutRoutines;

    public function __construct()
    {
        $this->workoutRoutines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;
        return $this;
    }

    public function __serialize(): array
    {
        $data = (array) $this;
        $data["\0".self::class."\0password"] = hash('crc32c', $this->password);
        return $data;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): static
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(?string $level): static
    {
        $this->level = $level;
        return $this;
    }

    public function hasCompletedOnboarding(): ?bool
    {
        return $this->hasCompletedOnboarding;
    }

    public function setHasCompletedOnboarding(bool $hasCompletedOnboarding): static
    {
        $this->hasCompletedOnboarding = $hasCompletedOnboarding;
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
            $workoutRoutine->setUser($this);
        }

        return $this;
    }

    public function removeWorkoutRoutine(WorkoutRoutine $workoutRoutine): static
    {
        if ($this->workoutRoutines->removeElement($workoutRoutine)) {
            if ($workoutRoutine->getUser() === $this) {
                $workoutRoutine->setUser(null);
            }
        }

        return $this;
    }
}
