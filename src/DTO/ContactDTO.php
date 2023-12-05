<?php

namespace App\DTO;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\component\Validator\Constraints;

class ContactDTO
{
    #[Constraints\Length(min:3)]
    #[Groups(['api:contact'])]
    public string $name = '';

    #[Constraints\Email()]
    public string $email = '';
    public string $message = '';
}
