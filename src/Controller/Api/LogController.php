<?php

namespace App\Controller\Api;

use App\Pagination\PaginationQuery;
use App\Pagination\PaginationResult;
use App\Repository\LogRepository;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Sensio;

/**
 * Class LogController
 *
 * @Rest\Route("/log")
 * @Sensio\IsGranted("ROLE_ADMIN")
 *
 * @package App\Controller\Api
 */
class LogController
{
    /**
     * @Rest\Get("/list")
     * @Rest\View()
     *
     * @param PaginationQuery $paginationQuery
     * @param LogRepository $repository
     * @return PaginationResult
     */
    public function list(PaginationQuery $paginationQuery, LogRepository $repository): PaginationResult
    {
        return PaginationResult::createFrom($repository, $paginationQuery);
    }
}