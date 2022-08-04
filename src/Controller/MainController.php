<?php

declare(strict_types=1);

namespace App\Controller;


use App\Service\FrankfurterJSONDeserializerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    public function __construct(
    )
    {
    }

    /**
     * @Route("/", name="app_main")
     */
    public function index(Request $request, FrankfurterJSONDeserializerService $jsonService): Response
    {
            $today = Date('Y-m-d');
            $givenDate = $request->get('givenDate');

            if($givenDate) {
            return $this->render('main/table.html.twig', [
                'givenDate' => $givenDate,
                'currenciesToday' => $jsonService->JSONDeserializeDate($today)->getRates(),
                'currenciesOnDate' => $jsonService->JSONDeserializeDate($givenDate)->getRates()]);
            }
        return $this->render('main/index.html.twig');
    }
}
