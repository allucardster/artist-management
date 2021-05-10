<?php

namespace App\Controller\Api;

use App\Entity\Representative;
use App\Pagination\PaginationQuery;
use App\Pagination\PaginationResult;
use App\Repository\RepresentativeRepository;
use App\Request\CreateRepresentativeRequest;
use App\Request\UpdateRepresentativeRequest;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Sensio;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Class RepresentativeController
 *
 * @Rest\Route("/representative")
 *
 * @package App\Controller\Api
 */
class RepresentativeController
{
    /**
     * @Rest\Post("")
     * @Sensio\ParamConverter("request", converter="fos_rest.request_body")
     *
     * @param CreateRepresentativeRequest $request
     * @param ConstraintViolationListInterface $constraintViolationList
     * @param RepresentativeRepository $repository
     * @return View
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function create(
        CreateRepresentativeRequest $request,
        ConstraintViolationListInterface $constraintViolationList,
        RepresentativeRepository $repository
    ): View {
        if ($constraintViolationList->count() > 0) {
            return View::create($constraintViolationList, Response::HTTP_BAD_REQUEST);
        }

        $representative = $repository->create($request);

        return View::create($representative, Response::HTTP_CREATED);
    }

    /**
     * @Rest\Get("/{id}", requirements={"id"="[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}"})
     * @Rest\View()
     *
     * @param Representative $representative
     * @return Representative
     */
    public function read(Representative $representative): Representative
    {
        return $representative;
    }

    /**
     * @Rest\Patch("/{id}", requirements={"id"="[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}"})
     * @Sensio\ParamConverter("request", converter="fos_rest.request_body")
     *
     * @param Representative $representative
     * @param UpdateRepresentativeRequest $request
     * @param ConstraintViolationListInterface $constraintViolationList
     * @param RepresentativeRepository $repository
     * @return View
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function update(
        Representative $representative,
        UpdateRepresentativeRequest $request,
        ConstraintViolationListInterface $constraintViolationList,
        RepresentativeRepository $repository
    ): View {
        if ($constraintViolationList->count() > 0) {
            return View::create($constraintViolationList, Response::HTTP_BAD_REQUEST);
        }

        $repository->update($request, $representative);

        return View::create(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Rest\Delete("/{id}", requirements={"id"="[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}"})
     *
     * @param Representative $representative
     * @param RepresentativeRepository $repository
     * @return View
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function delete(Representative $representative, RepresentativeRepository $repository): View
    {
        $repository->delete($representative);

        return View::create(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Rest\Get("/list")
     * @Rest\View()
     *
     * @param PaginationQuery $paginationQuery
     * @param RepresentativeRepository $repository
     * @return PaginationResult
     */
    public function list(PaginationQuery $paginationQuery, RepresentativeRepository $repository): PaginationResult
    {
        return PaginationResult::createFrom($repository, $paginationQuery);
    }
}