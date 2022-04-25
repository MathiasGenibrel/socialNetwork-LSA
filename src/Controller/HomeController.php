<?php

namespace App\Controller;

use App\Repository\BoardRepository;
use App\Repository\PostsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    #[Route('/', name: 'app_home')]
    public function index(BoardRepository $boardRepository,PostsRepository $post): Response
    {
        $authChecker = $this->container->get('security.authorization_checker');
        if (($authChecker->isGranted('ROLE_INSIDER') === true) || ($authChecker->isGranted('ROLE_USER') === true) || ($authChecker->isGranted('ROLE_COLLABORATOR') === true || ($authChecker->isGranted('ROLE_EXTERNAL') === true))) { 
            return $this->render('home/index.html.twig', [
                'boards' => $boardRepository->findAll(),
            ]);
        } elseif (($authChecker->isGranted('ROLE_ADMIN') === true)) {
            return $this->redirectToRoute('admin');
        } else {
            return $this->redirectToRoute('app_login');
        }
        
    }
}
