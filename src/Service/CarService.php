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
        if($this->carRepository->findAll()) {
            return array_map(fn($el) => $el?->getResponse(),$this->carRepository->findAll());
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