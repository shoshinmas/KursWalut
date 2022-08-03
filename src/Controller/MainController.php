<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\CurrencyExchange;
use App\Form\FormType;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CurrencyExchangeRepository;

class MainController extends AbstractController
{
    private DateTime $dateOnDate;

    public function __construct(
        private readonly CurrencyExchangeRepository $currencyExchangeRepository,
    )
    {
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    #[Route('/', name: 'app_main')]
    public function index(EntityManager $entityManager, Request $request): Response
    {
        $form = $this->createForm(FormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $currencyExchange = new CurrencyExchange();
            $dateOnDate = $form->getData();
            //$currencyExchange->set();
            $entityManager->persist($currencyExchange);
            $entityManager->flush();
            return $this->redirectToRoute('app_table');
        }
        return $this->render('main/table.html.twig', [
            'comment_form' => $form->createView()
        ]);
    }

    #[Route('/{dateOnDate}', name: 'app_table')]
    public function createTable(): Response
    {
        return $this->render('main/table.html.twig', [
            'rates' => $this->currencyExchangeRepository->findByDate([], ['rateOnDate' => 'DESC']),
        ]);
    }
}
