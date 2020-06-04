<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Collection;
use App\Repository\CollectionRepository;
use App\Form\CollectionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminCollectionController extends AbstractController {

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
     * @Route("/admin", name="admin.collection.index")
     * @return Response
     */
    public function index(): Response {

        $collection = $this->repository->findAll();
        return $this->render('admin/collection/index.html.twig', [
            'collection' => $collection
        ]);

    }

    /**
     * @Route("/admin/collection/new", name="admin.collection.new")
     * @return Response
     */
    public function new(Request $request): Response {
        $collection = new Collection();
        $form = $this->createForm(CollectionType::class, $collection);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($collection);
            $this->em->flush();
            return $this->redirectToRoute('admin.collection.index');
        }
        return $this->render('admin/collection/new.html.twig', [
            'collection' => $collection,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/collection/{id}", name="admin.collection.edit", requirements={"id": "^[0-9]+$"}, methods="GET|POST")
     * @return Response
     */
    public function edit(Collection $figure, Request $request): Response {

        $form = $this->createForm(CollectionType::class, $figure);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success', 'Figurine modifié avec succès !');
            return $this->redirectToRoute('admin.collection.index');
        }
        return $this->render('admin/collection/edit.html.twig', [
            'figure' => $figure,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/admin/collection/{id}", name="admin.collection.delete", requirements={"id": "^[0-9]+$"}, methods="DELETE")
     * @return RedirectResponse
     */
    public function delete(Collection $figure, Request $request): Response {

        if($this->isCsrfTokenValid('delete' . $figure->getId(), $request->get('_token'))) {
            $this->em->remove($figure);
            $this->em->flush();
        }
        return $this->redirectToRoute('admin.collection.index');
    }
}