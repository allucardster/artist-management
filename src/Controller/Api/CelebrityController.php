<?php

namespace App\Controller\Api;

use App\Entity\Celebrity;
use App\Pagination\PaginationQuery;
use App\Pagination\PaginationResult;
use App\Repository\CelebrityRepository;
use App\Request\CreateCelebrityRequest;
use App\Request\UpdateCelebrityRequest;
use Doctrine\ORM\ORMException;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Sensio;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Class CelebrityController
 *
 * @Rest\Route("/celebrity")
 *
 * @package App\Controller\Api
 */
class CelebrityController
{
    /**
     * @Rest\Post("")
     * @Sensio\ParamConverter("request", converter="fos_rest.request_body")
     *
     * @param CreateCelebrityRequest $request
     * @param ConstraintViolationListInterface $constraintViolationList
     * @param CelebrityRepository $repository
     * @return View
     * @throws ORMException
     */
    public function create(
        CreateCelebrityRequest $request,
        ConstraintViolationListInterface $constraintViolationList,
        CelebrityRepository $repository
    ): View {
        if ($constraintViolationList->count() > 0) {
            return View::create($constraintViolationList, Response::HTTP_BAD_REQUEST);
        }

        $celebrity = $repository->create($request);

        return View::create($celebrity, Response::HTTP_CREATED);
    }

    /**
     * @Rest\Get("/{id}", requirements={"id"="[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}"})
     * @Rest\View()
     *
     * @param Celebrity $celebrity
     * @return Celebrity
     */
    public function read(Celebrity $celebrity): Celebrity
    {
        return $celebrity;
    }

    /**
     * @Rest\Patch("/{id}", requirements={"id"="[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}"})
     * @Sensio\ParamConverter("request", converter="fos_rest.request_body")
     *
     * @param Celebrity $celebrity
     * @param UpdateCelebrityRequest $request
     * @param ConstraintViolationListInterface $constraintViolationList
     * @param CelebrityRepository $repository
     * @return View
     * @throws ORMException
     */
    public function update(
        Celebrity $celebrity,
        UpdateCelebrityRequest $request,
        ConstraintViolationListInterface $constraintViolationList,
        CelebrityRepository $repository
    ): View {
        if ($constraintViolationList->count() > 0) {
            return View::create($constraintViolationList, Response::HTTP_BAD_REQUEST);
        }

        $repository->update($request, $celebrity);

        return View::create(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Rest\Get("/list")
     * @Rest\View()
     *
     * @param PaginationQuery $paginationQuery
     * @param CelebrityRepository $repository
     * @return PaginationResult
     */
    public function list(PaginationQuery $paginationQuery, CelebrityRepository $repository): PaginationResult
    {
        return PaginationResult::createFrom($repository, $paginationQuery);
    }
}