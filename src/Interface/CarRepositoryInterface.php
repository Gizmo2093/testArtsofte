<?php

declare(strict_types=1);

namespace App\Interface;

use App\Entity\Car;

interface CarRepositoryInterface
{
    /**
     * @return array<mixed>|null
     */
    public function findAll(): ?array;

    public function findById(int $id): ?Car;
}