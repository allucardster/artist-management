<?php

namespace App\Entity;

use App\Doctrine\Entity\Traits\IdTrait;
use App\Model\CelebrityInterface;
use App\Repository\CelebrityRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Celebrity
 *
 * @ORM\Entity(repositoryClass=CelebrityRepository::class)
 * @ORM\Table(name="tbl_celebrity")
 *
 * @package App\Entity
 */
class Celebrity implements CelebrityInterface
{
    use IdTrait;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private string $name;

    /**
     * @ORM\Column(type="datetime_immutable")
     *
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $birthday;

    /**
     * @ORM\Column(type="text")
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

    public function getBirthday(): DateTimeImmutable
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