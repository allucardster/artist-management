<?php

namespace App\Request;

use App\Entity\Celebrity;
use App\Entity\Representative;
use App\Enum\RepresentativeType;
use App\Validator\Constraints\UniqueCelebrityRepresentative;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class CreateCelebrityRepresentativeRequest
 *
 * @UniqueCelebrityRepresentative()
 *
 * @package App\Request
 */
class CreateCelebrityRepresentativeRequest implements CelebrityRepresentativeRequestInterface
{
    /**
     * @Assert\NotNull()
     * @Serializer\Type(Celebrity::class)
     *
     * @var Celebrity
     */
    private Celebrity $celebrity;

    /**
     * @Assert\NotNull()
     * @Serializer\Type(Representative::class)
     *
     * @var Representative
     */
    private Representative $representative;

    /**
     * @Assert\NotNull()
     * @Assert\Type(type="array")
     * @Assert\Count(min=1, max=3)
     * @Assert\All(
     *     @Assert\NotBlank(),
     *     @Assert\Choice(callback={RepresentativeType::class, "toArray"})
     * )
     * @Assert\Unique()
     * @Serializer\Type("array<string>")
     *
     * @var array
     */
    private array $types;

    public function getCelebrity(): Celebrity
    {
        return $this->celebrity;
    }

    public function setCelebrity(Celebrity $celebrity): void
    {
        $this->celebrity = $celebrity;
    }

    public function getRepresentative(): Representative
    {
        return $this->representative;
    }

    public function setRepresentative(Representative $representative): void
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