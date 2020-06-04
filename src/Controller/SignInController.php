<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Users;
use App\Repository\UsersRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Form\UsersType;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SignInController extends AbstractController {

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var UsersRepository
     */
    private $repository;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(EntityManagerInterface $em, UsersRepository $repository, UserPasswordEncoderInterface $encoder) {

        $this->em = $em;
        $this->repository = $repository;
        $this->encoder = $encoder;

    }

    /**
     * @Route("/sign-in", name="signin.index")
     * @return Response
     */
    public function index(Request $request): Response {

        $user = new Users();
        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $user->setPassword($this->encoder->encodePassword($user, $data->getPassword()));
            $this->em->persist($user);
            $this->em->flush();
            $this->addFlash('success', 'Vous êtes bien inscrit sur le site ! Essayez de vous connecter !');
            return $this->redirectToRoute('signin.index');
        }
        return $this->render('users/index.html.twig', [
            'form' => $form->createView()
        ]);

    }
}