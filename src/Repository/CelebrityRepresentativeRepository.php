<?php

namespace App\Repository;

use App\Entity\CelebrityRepresentative;
use App\Request\CreateCelebrityRepresentativeRequest;
use App\Request\UpdateCelebrityRepresentativeRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

class CelebrityRepresentativeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CelebrityRepresentative::class);
    }

    /**
     * @param CreateCelebrityRepresentativeRequest $request
     * @return CelebrityRepresentative
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function create(CreateCelebrityRepresentativeRequest $request): CelebrityRepresentative
    {
        $celebrityRepresentative = new CelebrityRepresentative();
        $celebrityRepresentative->setCelebrity($request->getCelebrity());
        $celebrityRepresentative->setRepresentative($request->getRepresentative());
        $celebrityRepresentative->setTypes($request->getTypes());

        $this->getEntityManager()->persist($celebrityRepresentative);
        $this->getEntityManager()->flush($celebrityRepresentative);

        return $celebrityRepresentative;
    }

    /**
     * @param UpdateCelebrityRepresentativeRequest $request
     * @param CelebrityRepresentative $celebrityRepresentative
     * @return CelebrityRepresentative
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function update(UpdateCelebrityRepresentativeRequest $request, CelebrityRepresentative $celebrityRepresentative)
    {
        if ($request->getTypes() !== null) {
            $celebrityRepresentative->setTypes($request->getTypes());
        }

        $this->getEntityManager()->persist($celebrityRepresentative);
        $this->getEntityManager()->flush($celebrityRepresentative);

        return $celebrityRepresentative;
    }

    /**
     * @param CelebrityRepresentative $celebrityRepresentative
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function delete(CelebrityRepresentative $celebrityRepresentative): void
    {
        $this->getEntityManager()->remove($celebrityRepresentative);
        $this->getEntityManager()->flush();
    }
}