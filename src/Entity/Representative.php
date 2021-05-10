<?php

namespace App\Entity;

use App\Doctrine\Entity\Traits\IdTrait;
use App\Model\RepresentativeInterface;
use App\Repository\RepresentativeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Representative
 *
 * @ORM\Entity(repositoryClass=RepresentativeRepository::class)
 * @ORM\Table(name="tbl_representative")
 *
 * @package App\Entity
 */
class Representative implements RepresentativeInterface
{
    use IdTrait;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private string $name;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private string $company;

    /**
     * @ORM\Column(type="json")
     *
     * @var array
     */
    private array $emails;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCompany(): string
    {
        return $this->company;
    }

    public function setCompany(string $company): void
    {
        $this->company = $company;
    }

    public function getEmails(): array
    {
        return $this->emails;
    }

    public function setEmails(array $emails): void
    {
        $this->emails = $emails;
    }
}