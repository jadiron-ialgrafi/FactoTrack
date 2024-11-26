<?php

namespace App\Repositories;

use Doctrine\ORM\EntityManager;

class UserRepository
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getTotalUsers()
    {
        return $this->entityManager->getRepository('App\Entities\User')
            ->count([]);
    }
}
