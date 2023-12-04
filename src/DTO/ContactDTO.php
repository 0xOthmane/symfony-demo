<?php

namespace App\DTO;

use Symfony\component\Validator\Constraints;

class ContactDTO
{
    #[Constraints\Length(min:3)]
    public string $name = '';

    #[Constraints\Email()]
    public string $email = '';
    public string $message = '';
}
