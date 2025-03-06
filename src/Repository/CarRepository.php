<?php

namespace App\Repository;

use App\Entity\Car;
use App\Interface\CarRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

readonly class CarRepository implements CarRepositoryInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    )
    {
    }

    /**
     * @return array<mixed>|null
     */
    public function findAll(): ?array
    {
        return $this->entityManager->getRepository(Car::class)->findAll();
    }

    public function findById(int $id): ?Car
    {
        return $this->entityManager->getRepository(Car::class)->findOneBy(['id' => $id]);
    }
}
