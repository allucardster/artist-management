<?php

namespace App\Repository;

use App\Entity\Celebrity;
use App\Request\CreateCelebrityRequest;
use App\Request\UpdateCelebrityRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
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
     * @throws OptimisticLockException
     */
    public function create(CreateCelebrityRequest $request): Celebrity
    {
        $celebrity = new Celebrity();
        $celebrity->setName($request->getName());
        $celebrity->setBirthday($request->getBirthday());
        $celebrity->setBio($request->getBio());

        $this->getEntityManager()->persist($celebrity);
        $this->getEntityManager()->flush();

        return $celebrity;
    }

    /**
     * @param UpdateCelebrityRequest $request
     * @param Celebrity $celebrity
     * @return Celebrity
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function update(UpdateCelebrityRequest $request, Celebrity $celebrity): Celebrity
    {
        if ($name = $request->getName()) {
            $celebrity->setName($name);
        }

        if ($birthday = $request->getBirthday()) {
            $celebrity->setBirthday($birthday);
        }

        if ($bio = $request->getBio()) {
            $celebrity->setBio($bio);
        }

        $this->getEntityManager()->persist($celebrity);
        $this->getEntityManager()->flush();

        return $celebrity;
    }

    /**
     * @param Celebrity $celebrity
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function delete(Celebrity $celebrity): void
    {
        $this->getEntityManager()->remove($celebrity);
        $this->getEntityManager()->flush();
    }
}