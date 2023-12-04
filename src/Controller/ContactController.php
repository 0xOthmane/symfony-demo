<?php

namespace App\Controller;

use App\DTO\ContactDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'api_contact')]
    public function index(
        #[MapRequestPayload]
        ContactDTO $data
        ): Response
    {
        dd($data);
    }
}
