<?php

namespace App\Entity;

use App\Repository\LoanApplicationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class LoanApplication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private ?int $carId = null;

    #[ORM\Column]
    private ?int $programId = null;

    #[ORM\Column]
    private ?int $initialPayment = null;

    #[ORM\Column]
    private ?int $loanTerm = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarId(): ?int
    {
        return $this->carId;
    }

    public function setCarId(int $carId): static
    {
        $this->carId = $carId;

        return $this;
    }

    public function getProgramId(): ?int
    {
        return $this->programId;
    }

    public function setProgramId(int $programId): static
    {
        $this->programId = $programId;

        return $this;
    }

    public function getInitialPayment(): ?int
    {
        return $this->initialPayment;
    }

    public function setInitialPayment(int $initialPayment): static
    {
        $this->initialPayment = $initialPayment;

        return $this;
    }

    public function getLoanTerm(): ?int
    {
        return $this->loanTerm;
    }

    public function setLoanTerm(int $loanTerm): static
    {
        $this->loanTerm = $loanTerm;

        return $this;
    }
}
