<?php

declare(strict_types=1);


namespace App\Controller\Request;

use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;


class CreditRequest
{
    public function __construct(

        #[Assert\NotBlank]
        #[Assert\Type('integer')]
        #[SerializedName(serializedName: 'carId')]
        public int $carId,

        #[Assert\NotBlank]
        #[Assert\Type('integer')]
        #[SerializedName(serializedName: 'programId')]
        public int $programId,

        #[Assert\NotBlank]
        #[Assert\Type('integer')]
        #[SerializedName(serializedName: 'initialPayment')]
        public int $initialPayment,

        #[Assert\NotBlank]
        #[Assert\Type('integer')]
        #[SerializedName(serializedName: 'loanTerm')]
        public int $loanTerm,
    )
    {
    }


}