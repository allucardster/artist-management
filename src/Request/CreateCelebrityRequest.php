<?php

namespace App\Request;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class CreateCelebrityRequest
{
    /**
     * @Assert\NotBlank()
     *
     * @var string
     */
    private string $name;

    /**
     * @Assert\NotBlank()
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s'>")
     *
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $birthday;

    /**
     * @Assert\NotBlank()
     *
     * @var string
     */
    private string $bio;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBirthday(): ?DateTimeImmutable
    {
        return $this->birthday;
    }

    public function setBirthday(DateTimeImmutable $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getBio(): string
    {
        return $this->bio;
    }

    public function setBio(string $bio): void
    {
        $this->bio = $bio;
    }
}