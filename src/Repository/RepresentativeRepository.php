<?php

namespace App\Repository;

use App\Entity\Representative;
use App\Request\CreateRepresentativeRequest;
use App\Request\UpdateRepresentativeRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

class RepresentativeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Representative::class);
    }

    /**
     * @param CreateRepresentativeRequest $request
     * @return Representative
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function create(CreateRepresentativeRequest $request): Representative
    {
        $representative = new Representative();
        $representative->setName($request->getName());
        $representative->setCompany($request->getCompany());
        $representative->setEmails($request->getEmails());

        $this->getEntityManager()->persist($representative);
        $this->getEntityManager()->flush();

        return $representative;
    }

    /**
     * @param UpdateRepresentativeRequest $request
     * @param Representative $representative
     * @return Representative
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function update(UpdateRepresentativeRequest $request, Representative $representative): Representative
    {
        if ($name = $request->getName()) {
            $representative->setName($name);
        }

        if ($company = $request->getCompany()) {
            $representative->setCompany($company);
        }

        if ($request->getEmails() !== null) {
            $representative->setEmails($request->getEmails());
        }

        $this->getEntityManager()->persist($representative);
        $this->getEntityManager()->flush();

        return $representative;
    }

    /**
     * @param Representative $representative
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function delete(Representative $representative): void
    {
        $this->getEntityManager()->remove($representative);
        $this->getEntityManager()->flush();
    }
}