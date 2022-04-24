<?php

namespace App\Controller;

use App\Entity\Board;
use App\Form\BoardType;
use App\Repository\BoardRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


#[Route('/board')]
class BoardController extends AbstractController
{
    #[Route('/', name: 'app_board_index', methods: ['GET'])]
    public function index(BoardRepository $boardRepository): Response
    {
        return $this->render('board/index.html.twig', [
            'boards' => $boardRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_board_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BoardRepository $boardRepository, SluggerInterface $slugger): Response
    {
        $board = new Board();
        $form = $this->createForm(BoardType::class, $board);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $board->setImage($_FILES['board']['name']['image']);
          
            $boardRepository->add($board);
            
            $file_name = $_FILES['board']['name']['image'];
            $destination = $this->getParameter('images_directory');
            move_uploaded_file($_FILES['board']['tmp_name']['image'], $destination . $file_name);
            return $this->redirectToRoute('app_board_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('board/new.html.twig', [
            'board' => $board,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_board_show', methods: ['GET'])]
    public function show(Board $board): Response
    {
        return $this->render('board/show.html.twig', [
            'board' => $board,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_board_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, 
                         Board $board, 
                         BoardRepository $boardRepository,
                         SluggerInterface $slugger,
                         UserRepository $user): Response
    {
        $form = $this->createForm(BoardType::class, $board);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $board->setImage($_FILES['board']['name']['image']);
          
            $boardRepository->add($board);
            
            $file_name = $_FILES['board']['name']['image'];
            $destination = $this->getParameter('images_directory');
            move_uploaded_file($_FILES['board']['tmp_name']['image'], $destination . $file_name);
            // $boardRepository->add($board); 
            // $imageFile = $form->get('image')->getData();
            // if ($imageFile) {
            //     $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            //     // this is needed to safely include the file name as part of the URL
            //     // $safeFilename = $slugger->slug($originalFilename);
            //     $newFilename = '-'.uniqid().'.'.$imageFile->guessExtension();

            //     // Move the file to the directory where images are stored
            //     try {
            //         $imageFile->move(
            //             $this->getParameter('images_directory'),
            //             $newFilename
            //         );
            //     } catch (FileException $e) {
            //         // ... handle exception if something happens during file upload
            //     }
            //     // $board->setImage(
            //     //     new File($this->getParameter('images_directory').'/'.$board->getImage())
            //     // );               
            //      // var_dump($newFilename);
            //     // exit;
            // }
            return $this->redirectToRoute('app_board_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('board/edit.html.twig', [
            'board' => $board,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_board_delete', methods: ['POST'])]
    public function delete(Request $request, Board $board, BoardRepository $boardRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$board->getId(), $request->request->get('_token'))) {
            $boardRepository->remove($board);
        }

        return $this->redirectToRoute('app_board_index', [], Response::HTTP_SEE_OTHER);
    }
}
