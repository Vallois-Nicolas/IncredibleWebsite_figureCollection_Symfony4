<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;
use App\Entity\Users;
use App\Repository\UsersRepository;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var UsersRepository
     */
    private $repository;

    public function __construct(EntityManagerInterface $em, UsersRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    /**
     * @Route("/login", name="login")
     * @return Response
     */
    public function login(UsersRepository $repository, AuthenticationUtils $authenticationUtils): Response {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }
}