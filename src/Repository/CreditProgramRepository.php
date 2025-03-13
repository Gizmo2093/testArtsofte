<?php

namespace App\Repository;

use App\Entity\CreditProgram;
use App\Entity\LoanApplication;
use App\Interface\CreditProgramRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

readonly class CreditProgramRepository implements CreditProgramRepositoryInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    )
    {
    }

    public function findOneById(int $id): ?CreditProgram
    {
        return $this->entityManager->getRepository(CreditProgram::class)->findOneBy(['id' => $id]);
    }

//    public function save(LoanApplication $application): void
//    {
//        $this->entityManager->persist($application);
//        $this->entityManager->flush();
//    }
}
