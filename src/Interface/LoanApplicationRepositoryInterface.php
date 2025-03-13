<?php

declare(strict_types=1);

namespace App\Interface;

use App\Entity\LoanApplication;

interface LoanApplicationRepositoryInterface
{
    public function save(LoanApplication $application): void;
}