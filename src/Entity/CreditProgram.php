<?php

namespace App\Entity;

use App\Repository\CreditProgramRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class CreditProgram
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private ?float $interestRate = null;

    #[ORM\Column]
    private ?int $monthlyPayment = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInterestRate(): ?float
    {
        return $this->interestRate;
    }

    public function setInterestRate(float $interestRate): static
    {
        $this->interestRate = $interestRate;

        return $this;
    }

    public function getMonthlyPayment(): ?int
    {
        return $this->monthlyPayment;
    }

    public function setMonthlyPayment(int $monthlyPayment): static
    {
        $this->monthlyPayment = $monthlyPayment;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }
}
