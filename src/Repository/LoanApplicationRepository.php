<?php

namespace App\Repository;

use App\Entity\LoanApplication;
use App\Interface\LoanApplicationRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

readonly class LoanApplicationRepository implements LoanApplicationRepositoryInterface
{
    public function __construct(
       private EntityManagerInterface $entityManager
    )
    {
    }

    public function save(LoanApplication $application): void
    {
        $this->entityManager->persist($application);
        $this->entityManager->flush();
    }
}
