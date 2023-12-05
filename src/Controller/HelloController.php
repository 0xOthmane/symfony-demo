<?php

namespace App\Controller;

use App\DTO\ContactDTO;
use App\Entity\Post;
use App\Form\ContactFormType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    #[Route('/hello/{name}', name: 'app_hello')]
    public function index(Request $request, string $name, EntityManagerInterface $manager, PostRepository $repository): Response
    {
        $post = new Post();
        $post->setCreatedAt(new \DateTimeImmutable());
        $post->setUpdatedAt(new \DateTimeImmutable());
        $post->setTitle('Title');
        $post->setSlug('post');
        $post->setContent('Content');

        // dd($manager);
        $manager->persist($post);
        $manager->flush();

        $posts = $manager->getRepository(Post::class)->findAll();
        // $posts = $manager->getRepository(Post::class)->findBy('column', 'condition');
        $post = $repository->findOrFailBySlug('post');
        $post->setTitle('Other title');
        // $manager->remove($post);
        $manager->flush();
        $data = new ContactDTO();
        $form = $this->createForm(ContactFormType::class, $data);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            dd($form->getData(), $data);
        }
        return $this->render('hello.html.twig', [
            'name' => $name,
            'form' => $form
        ]);
    }
}
