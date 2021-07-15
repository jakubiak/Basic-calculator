<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Calculate;
use App\Form\CalculateType;
use App\Service\CalculateStrategyFactoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CalculateController extends AbstractController
{
    public function __construct(private CalculateStrategyFactoryInterface $calculateStrategyFactory)
    {
    }

    public function index(Request $request): Response
    {
        $calculate = new Calculate();
        $result    = null;

        $calculateForm = $this->createForm(CalculateType::class, $calculate);

        $calculateForm->handleRequest($request);
        if ($calculateForm->isSubmitted() && $calculateForm->isValid()) {
            $calculate = $calculateForm->getData();
            $strategy = $this->calculateStrategyFactory->create($calculate->getOperation());
            $result = $strategy->calculate($calculate);
        }

        return $this->render('calculate.html.twig', [
            'form'   => $calculateForm->createView(),
            'result' => $result,
        ]);
    }
}
