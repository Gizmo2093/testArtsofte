<?php

declare(strict_types=1);

namespace App\Interface;

use App\Entity\CreditProgram;
use App\Entity\LoanApplication;

interface CreditProgramRepositoryInterface
{
    public function findOneById(int $id): ?CreditProgram;

//    public function save(LoanApplication $application): void;
}