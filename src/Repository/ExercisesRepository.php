<?php

namespace App\Repository;

use App\Entity\Exercises;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Exercises>
 */
class ExercisesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Exercises::class);
    }

    public function findExercisesForRoutinesByFilter(?string $search, ?string $body_part, ?string $equipment): array
    {
        $queryBuilder = $this->createQueryBuilder('e');

        if ($search) {
            $queryBuilder
                ->andWhere('e.name LIKE :search')
                ->setParameter('search', '%' . $search . '%');
        }

        if ($body_part) {
            $queryBuilder
                ->andWhere('e.body_part = :body_part')
                ->setParameter('body_part', $body_part);
        }

        if ($equipment) {
            $queryBuilder
                ->andWhere('e.equipment = :equipment')
                ->setParameter('equipment', $equipment);
        }

        return $queryBuilder->getQuery()->getResult();
    }

}
