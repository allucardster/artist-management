<?php

namespace App\Request;

use App\Enum\RepresentativeType;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class UpdateCelebrityRepresentativeRequest
{
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