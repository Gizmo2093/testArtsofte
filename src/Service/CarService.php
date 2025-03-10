<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Car;
use App\Interface\CarRepositoryInterface;

readonly class CarService
{
    public function __construct(
        private CarRepositoryInterface $carRepository
    )
    {
    }

    /**
     * @return array<mixed>|null
     */
    public function getCars(): ?array
    {
        $cars = $this->carRepository->findAll();
        if($cars) {
            return array_map(fn($el) => $el?->getResponse(), $cars);
        }
        else return [];
    }

    /**
     * @return array<mixed>|null
     */
    public function getCarById(int $id): ?array
    {
        return $this->carRepository->findById($id)?->getResponse($id);
    }
}