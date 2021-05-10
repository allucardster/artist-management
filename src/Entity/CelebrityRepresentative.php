<?php

namespace App\Entity;

use App\Doctrine\Entity\Traits\IdTrait;
use App\Model\CelebrityInterface;
use App\Model\CelebrityRepresentativeInterface;
use App\Model\RepresentativeInterface;
use App\Repository\CelebrityRepresentativeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CelebrityRepresentative
 *
 * @ORM\Entity(repositoryClass=CelebrityRepresentativeRepository::class)
 * @ORM\Table(
 *     name="tbl_celebrity_representative",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(columns={"celebrity_id", "representative_id"})
 *     }
 * )
 *
 * @package App\Entity
 */
class CelebrityRepresentative implements CelebrityRepresentativeInterface
{
    use IdTrait;

    /**
     * @ORM\ManyToOne(targetEntity=Celebrity::class)
     * @ORM\JoinColumn(name="celebrity_id", referencedColumnName="id")
     *
     * @var CelebrityInterface
     */
    private CelebrityInterface $celebrity;

    /**
     * @ORM\ManyToOne(targetEntity=Representative::class)
     * @ORM\JoinColumn(name="representative_id", referencedColumnName="id")
     *
     * @var RepresentativeInterface
     */
    private RepresentativeInterface $representative;

    /**
     * @ORM\Column(type="json")
     *
     * @var array
     */
    private array $types;

    public function getCelebrity(): CelebrityInterface
    {
        return $this->celebrity;
    }

    public function setCelebrity(CelebrityInterface $celebrity): void
    {
        $this->celebrity = $celebrity;
    }

    public function getRepresentative(): RepresentativeInterface
    {
        return $this->representative;
    }

    public function setRepresentative(RepresentativeInterface $representative): void
    {
        $this->representative = $representative;
    }

    public function getTypes(): array
    {
        return $this->types;
    }

    public function setTypes(array $types): void
    {
        $this->types = $types;
    }
}