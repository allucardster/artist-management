<?php

namespace App\Request;

use App\Entity\Celebrity;
use App\Entity\Representative;
use App\Enum\RepresentativeType;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class UpdateCelebrityRepresentativeRequest
{
    /**
     * @Serializer\Type(Celebrity::class)
     *
     * @var Celebrity|null
     */
    private ?Celebrity $celebrity = null;

    /**
     * @Serializer\Type(Representative::class)
     *
     * @var Representative|null
     */
    private ?Representative $representative = null;

    /**
     * @Assert\Type(type="array")
     * @Assert\Count(min=1, max=3)
     * @Assert\All(
     *     @Assert\NotBlank(),
     *     @Assert\Choice(callback={RepresentativeType::class, "toArray"})
     * )
     * @Assert\Unique()
     * @Serializer\Type("array<string>")
     *
     * @var array|null
     */
    private ?array $types = null;

    /**
     * @return Celebrity|null
     */
    public function getCelebrity(): ?Celebrity
    {
        return $this->celebrity;
    }

    /**
     * @param Celebrity|null $celebrity
     */
    public function setCelebrity(?Celebrity $celebrity): void
    {
        $this->celebrity = $celebrity;
    }

    /**
     * @return Representative|null
     */
    public function getRepresentative(): ?Representative
    {
        return $this->representative;
    }

    /**
     * @param Representative|null $representative
     */
    public function setRepresentative(?Representative $representative): void
    {
        $this->representative = $representative;
    }

    /**
     * @return array|null
     */
    public function getTypes(): ?array
    {
        return $this->types;
    }

    /**
     * @param array|null $types
     */
    public function setTypes(?array $types): void
    {
        $this->types = $types;
    }
}