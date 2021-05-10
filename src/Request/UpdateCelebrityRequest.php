<?php

namespace App\Request;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class UpdateCelebrityRequest
{
    /**
     * @Assert\NotBlank(allowNull=true)
     *
     * @var string|null
     */
    private ?string $name = null;

    /**
     * @Assert\NotBlank(allowNull=true)
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     *
     * @var DateTimeImmutable|null
     */
    private ?DateTimeImmutable $birthday = null;

    /**
     * @Assert\NotBlank(allowNull=true)
     *
     * @var string|null
     */
    private ?string $bio = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getBirthday(): ?DateTimeImmutable
    {
        return $this->birthday;
    }

    public function setBirthday(?DateTimeImmutable $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): void
    {
        $this->bio = $bio;
    }
}