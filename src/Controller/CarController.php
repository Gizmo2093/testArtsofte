<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\CarService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class CarController extends AbstractController
{
    public function __construct(
        private readonly CarService $carService
    )
    {
    }

    #[Route('/cars', name: 'api.v1.cars', methods: ['GET'])]
    public function getCars(): JsonResponse
    {
        $result = $this->carService->getCars();
        return new JsonResponse(['cars' => $result]);
    }

    #[Route('/cars/{id}', name: 'api.v1.cars.id', methods: ['GET'])]
    public function getCarById(int $id): JsonResponse
    {
        $result = $this->carService->getCarById($id);
        return new JsonResponse(['car' => $result]);
    }
}