<?php

namespace App;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

class RemoteApiService{
    public function __construct(
        #[Autowire('%demo_api_key%')]
        public string $key)
    {
        
    }
}