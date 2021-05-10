<?php

namespace App\Model;

use App\Enum\RepresentativeType;

interface CelebrityRepresentativeInterface extends EntityInterface
{
    public function getCelebrity(): CelebrityInterface;

    public function setCelebrity(CelebrityInterface $celebrity): void;

    public function getRepresentative(): RepresentativeInterface;

    public function setRepresentative(RepresentativeInterface $representative): void;

    public function getTypes(): array;

    public function setTypes(array $types): void;
}