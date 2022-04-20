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
        return $this->render('home/index.html.twig', [
            'boards' => $boardRepository->findAll(),
        ]);
    }
}
