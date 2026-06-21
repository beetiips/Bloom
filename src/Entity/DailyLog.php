<?php

namespace App\Entity;

use App\Repository\DailyLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DailyLogRepository::class)]
class DailyLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\Column(nullable: true)]
    private ?int $mood_rating = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $mental_note = null;

    #[ORM\Column]
    private ?float $sleep_duration = null;

    #[ORM\Column]
    private ?int $sleep_quality = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getMoodRating(): ?int
    {
        return $this->mood_rating;
    }

    public function setMoodRating(?int $mood_rating): static
    {
        $this->mood_rating = $mood_rating;

        return $this;
    }

    public function getMentalNote(): ?string
    {
        return $this->mental_note;
    }

    public function setMentalNote(?string $mental_note): static
    {
        $this->mental_note = $mental_note;

        return $this;
    }

    public function getSleepDuration(): ?float
    {
        return $this->sleep_duration;
    }

    public function setSleepDuration(float $sleep_duration): static
    {
        $this->sleep_duration = $sleep_duration;

        return $this;
    }

    public function getSleepQuality(): ?int
    {
        return $this->sleep_quality;
    }

    public function setSleepQuality(int $sleep_quality): static
    {
        $this->sleep_quality = $sleep_quality;

        return $this;
    }
}
