<?php

namespace App\Controller;

use App\Entity\CollectionSearch;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Collection;
use App\Repository\CollectionRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CollectionSearchType;


class CollectionController extends AbstractController {

    /**
     * @var CollectionRepository
     */
    private $repository;
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(CollectionRepository $repository, EntityManagerInterface $em) {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/collection", name="collection.index")
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request): Response {

        $search = new CollectionSearch();
        $form = $this->createForm(CollectionSearchType::class, $search);
        $form->handleRequest($request);
        $collection = $paginator->paginate(
            $this->repository->findAllNonAcquiredQuery($search),
            $request->query->getInt('page', 1),
            15
        );
        return $this->render('collection/index.html.twig', [
            'current_link' => 'collection',
            'collection' => $collection,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/details/{slug}-{id}", name="collection.show", requirements={"slug": "[a-zA-Z0-9\-]*"})
     * @return Response
     * Quand une route a un ID dans ses paramètres, si on injecte l'objet dans la méthode alors le find se fera tout seul sur l'id ! Pas besoin de le faire
     */
    public function show(Collection $figure, string $slug): Response {
        if($figure->getSlug() !== $slug) {
            return $this->redirectToRoute('collection.show', [
                'id' => $figure->getId(),
                'slug' => $figure->getSlug()
            ], 301);
        }
        return $this->render('collection/show.html.twig', [
            'figure' => $figure,
            'current_link' => 'collection'
        ]);
    }

}