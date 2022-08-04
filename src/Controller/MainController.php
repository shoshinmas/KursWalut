<?php

declare(strict_types=1);

namespace App\Controller;


use App\Model\CurrencyRate;
use App\Service\FrankfurterJSONDeserializerService;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private DateTime $dateOnDate;

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
            $ratesForToday = $jsonService->JSONDeserializeDate($today);
            $ratesOnDay = $jsonService->JSONDeserializeDate($givenDate);

            $currencyToday = new CurrencyRate();
            $currencyOnDate = new CurrencyRate();

            return $this->render('main/table.html.twig', [
                'currencyToday' => $currencyToday,
                'currencyOnDate' => $currencyOnDate]);
            }
        return $this->render('main/index.html.twig');
    }
}
