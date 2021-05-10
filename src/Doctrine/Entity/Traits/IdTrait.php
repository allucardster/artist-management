<?php

namespace App\Doctrine\Entity\Traits;

use Ramsey\Uuid\UuidInterface;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;

trait IdTrait
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     *
     * @var UuidInterface
     */
    protected UuidInterface $id;

    public function getId(): UuidInterface
    {
        return $this->id;
    }
}