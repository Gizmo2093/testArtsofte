<?php


namespace App\Controller;

use App\Controller\Request\CreditRequest;
use App\Service\CreditService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

class CreditController extends AbstractController
{

    public function __construct(
        private readonly CreditService $creditService
    )
    {
    }

    #[Route('/credit/calculate', name: 'api.v1.credit', methods: ['GET'])]
    public function calculateCredit(
        #[MapQueryParameter(filter: \FILTER_VALIDATE_INT)] int $price,
        #[MapQueryParameter(filter: \FILTER_VALIDATE_FLOAT)] float $initialPayment,
        #[MapQueryParameter(filter: \FILTER_VALIDATE_INT)] int $loanTerm): JsonResponse
    {

        $creditProgram = $this->creditService->getCreditProgram($price, $initialPayment, $loanTerm);

        return new JsonResponse(['creditProgram' => $creditProgram]);
    }

    #[Route('/request', name: 'api.v1.request', methods: ['POST'])]
    public function requestCredit(#[MapRequestPayload] CreditRequest $request): JsonResponse
    {
        $result = $this->creditService->saveLoanApplication($request->carId, $request->programId, $request->initialPayment, $request->loanTerm);
        return new JsonResponse(['success' => $result]);
    }
}