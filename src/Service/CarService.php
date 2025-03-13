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
     * @return array<mixed>
     */
    public function getCars(): array
    {
        $cars = $this->carRepository->findAll();
        return  $cars ? array_map(fn(Car $el) => $el->getResponse(), $cars) : [];
    }

    /**
     * @return array<mixed>|null
     */
    public function getCarById(int $id): ?array
    {
        return $this->carRepository->findById($id)?->getResponse($id);
    }
}