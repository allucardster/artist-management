<?php

namespace App\Controller\Api;

use App\Entity\Celebrity;
use App\Pagination\PaginationQuery;
use App\Pagination\PaginationResult;
use App\Repository\CelebrityRepository;
use FOS\RestBundle\Controller\Annotations as Rest;

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

    /**
     * @Rest\Get("/{id}", requirements={"id"="[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}"})
     * @Rest\View()
     *
     * @param Celebrity $celebrity
     * @return Celebrity
     */
    public function get(Celebrity $celebrity): Celebrity
    {
        return $celebrity;
    }
}