<?php

namespace App\Request;

use App\Entity\Celebrity;
use App\Entity\Representative;

interface CelebrityRepresentativeRequestInterface
{
    public function getCelebrity(): ?Celebrity;

    public function getRepresentative(): ?Representative;
}