<?php

namespace App\Model;

use Ramsey\Uuid\UuidInterface;

interface EntityInterface
{
    public function getId(): UuidInterface;
}