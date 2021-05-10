<?php

namespace App\Controller\Api;

use App\Entity\CelebrityRepresentative;
use App\Pagination\PaginationQuery;
use App\Pagination\PaginationResult;
use App\Repository\CelebrityRepresentativeRepository;
use App\Request\CreateCelebrityRepresentativeRequest;
use App\Request\UpdateCelebrityRepresentativeRequest;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Sensio;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Class CelebrityRepresentativeController
 *
 * @Rest\Route("/celebrity-representative")
 *
 * @package App\Controller\Api
 */
class CelebrityRepresentativeController
{
    /**
     * @Rest\Post("")
     * @Sensio\ParamConverter("request", converter="fos_rest.request_body")
     *
     * @param CreateCelebrityRepresentativeRequest $request
     * @param ConstraintViolationListInterface $constraintViolationList
     * @param CelebrityRepresentativeRepository $repository
     * @return View
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function create(
        CreateCelebrityRepresentativeRequest $request,
        ConstraintViolationListInterface $constraintViolationList,
        CelebrityRepresentativeRepository $repository
    ): View {
        if ($constraintViolationList->count() > 0) {
            return View::create($constraintViolationList, Response::HTTP_BAD_REQUEST);
        }

        $celebrityRepresentative = $repository->create($request);

        return View::create($celebrityRepresentative, Response::HTTP_CREATED);
    }

    /**
     * @Rest\Get("/{id}", requirements={"id"="[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}"})
     * @Rest\View()
     *
     * @param CelebrityRepresentative $celebrityRepresentative
     * @return CelebrityRepresentative
     */
    public function read(CelebrityRepresentative $celebrityRepresentative): CelebrityRepresentative
    {
        return $celebrityRepresentative;
    }

    /**
     * @Rest\Patch("/{id}", requirements={"id"="[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}"})
     * @Sensio\ParamConverter("request", converter="fos_rest.request_body")
     *
     * @param CelebrityRepresentative $celebrityRepresentative
     * @param UpdateCelebrityRepresentativeRequest $request
     * @param ConstraintViolationListInterface $constraintViolationList
     * @param CelebrityRepresentativeRepository $repository
     * @return View
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function update(
        CelebrityRepresentative $celebrityRepresentative,
        UpdateCelebrityRepresentativeRequest $request,
        ConstraintViolationListInterface $constraintViolationList,
        CelebrityRepresentativeRepository $repository
    ): View {
        if ($constraintViolationList->count() > 0) {
            return View::create($constraintViolationList, Response::HTTP_BAD_REQUEST);
        }

        $repository->update($request, $celebrityRepresentative);

        return View::create(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Rest\Delete("/{id}", requirements={"id"="[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}"})
     *
     * @param CelebrityRepresentative $celebrityRepresentative
     * @param CelebrityRepresentativeRepository $repository
     * @return View
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function delete(
        CelebrityRepresentative $celebrityRepresentative,
        CelebrityRepresentativeRepository $repository
    ): View {
        $repository->delete($celebrityRepresentative);

        return View::create(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Rest\Get("/list")
     * @Rest\View()
     *
     * @param PaginationQuery $paginationQuery
     * @param CelebrityRepresentativeRepository $repository
     * @return PaginationResult
     */
    public function list(
        PaginationQuery $paginationQuery,
        CelebrityRepresentativeRepository $repository
    ): PaginationResult {
        return PaginationResult::createFrom($repository, $paginationQuery);
    }
}