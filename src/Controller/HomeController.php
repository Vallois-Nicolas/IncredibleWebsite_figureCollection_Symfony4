<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use App\Repository\CollectionRepository;

class HomeController extends AbstractController {

    /**
     * @Route("/", name="home")
     * @param CollectionRepository $repository
     * @return Response
     */
    public function index(CollectionRepository $repository): Response {

        $collection = $repository->findLatest();
        return $this->render('pages/home.html.twig', [
            'collection' => $collection
        ]);

    }

}