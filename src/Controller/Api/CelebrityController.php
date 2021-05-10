<?php

namespace App\Controller\Api;

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
}