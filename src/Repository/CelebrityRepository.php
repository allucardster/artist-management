<?php

namespace App\Repository;

use App\Entity\Celebrity;
use App\Request\CreateCelebrityRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

class CelebrityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Celebrity::class);
    }

    /**
     * @param CreateCelebrityRequest $request
     * @return Celebrity
     * @throws ORMException
     */
    public function create(CreateCelebrityRequest $request): Celebrity
    {
        $celebrity = new Celebrity();
        $celebrity->setName($request->getName());
        $celebrity->setBirthday($request->getBirthday());
        $celebrity->setBio($request->getBio());

        $this->getEntityManager()->persist($celebrity);

        return $celebrity;
    }
}