<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\LoanApplication;
use App\Interface\CreditProgramRepositoryInterface;
use App\Interface\LoanApplicationRepositoryInterface;

readonly class CreditService
{
    public function __construct(
        private CreditProgramRepositoryInterface $creditProgramRepository,
        private LoanApplicationRepositoryInterface $loanApplicationRepository,
    )
    {
    }

    /**
     * @return array<mixed>|null
     */
    public function getCreditProgram(int $price, float $initialPayment, int $loanTerm): ?array
    {
        $creditProgramId = match (true) {
            $initialPayment == $price / 2 && $loanTerm <= 5 => 3,
            $initialPayment == $price / 5 && $loanTerm > 15 => 1,
            default => 2,
        };

        $creditProgram = $this->creditProgramRepository->findOneById($creditProgramId);

        return $creditProgram ? [
            'programId' => $creditProgram->getId(),
            'interestRate' => $creditProgram->getInterestRate(),
            'monthlyPayment' => $creditProgram->getMonthlyPayment(),
            'title' => $creditProgram->getTitle(),
        ] : [];
    }

    public function saveLoanApplication(int $carId, int $programId, int $initialPayment, int $loanTerm): bool|\Exception
    {
        try {
            $loanApplication = new LoanApplication();
            $loanApplication->setCarId($carId)
                ->setProgramId($programId)
                ->setInitialPayment($initialPayment)
                ->setLoanTerm($loanTerm);
            $this->loanApplicationRepository->save($loanApplication);
            return true;
        }
        catch (\Exception $e) {
            return $e;
        }
    }
}