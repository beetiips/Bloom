<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\WorkoutRoutine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WorkoutRoutine>
 */
class WorkoutRoutineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkoutRoutine::class);
    }

    public function findRoutinesByUserAndDay(User $user, string $day): array
    {
        return $this->createQueryBuilder('routine')
            ->andWhere('routine.user_id = :user')
            ->andWhere('routine.day_of_week = :day')
            ->setParameter('user', $user)
            ->setParameter('day', $day)
            ->getQuery()
            ->getResult();
    }
}
