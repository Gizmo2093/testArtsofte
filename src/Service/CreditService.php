<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\LoanApplication;
use App\Interface\CreditProgramRepositoryInterface;

class CreditService
{
    public function __construct(
        private CreditProgramRepositoryInterface $creditProgramRepository,
    )
    {
    }

    /**
     * @return array<mixed>|null
     */
    public function getCreditProgram(int $price, float $initialPayment, int $loanTerm): ?array
    {
        if($initialPayment == $price/2 && $loanTerm <= 5) {
            $creditProgram = $this->creditProgramRepository->findOneById(3);
        }
        else if($initialPayment == $price/5 && $loanTerm > 15) {
            $creditProgram = $this->creditProgramRepository->findOneById(1);
        }
        else {
            $creditProgram = $this->creditProgramRepository->findOneById(2);
        }

        return $creditProgram ?
            [
                'programId' => $creditProgram->getId(),
                'interestRate' => $creditProgram->getInterestRate(),
                'monthlyPayment' => $creditProgram->getMonthlyPayment(),
                'title' => $creditProgram->getTitle(),
            ] : null;
    }

    public function saveLoanApplication(int $carId, int $programId, int $initialPayment, int $loanTerm): bool
    {
        try {
            $loanApplication = new LoanApplication();
            $loanApplication->setCarId($carId)
                ->setProgramId($programId)
                ->setInitialPayment($initialPayment)
                ->setLoanTerm($loanTerm);
            $this->creditProgramRepository->save($loanApplication);
            return true;
        }
        catch (\Exception $e) {
            return false;
        }
    }
}