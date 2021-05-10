<?php

namespace App\Request;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class UpdateRepresentativeRequest
{
    /**
     * @Assert\NotBlank(allowNull=true)
     *
     * @var string|null
     */
    private ?string $name = null;

    /**
     * @Assert\NotBlank(allowNull=true)
     *
     * @var string|null
     */
    private ?string $company = null;

    /**
     * @Assert\Type(type="array")
     * @Assert\Count(min=1, max=5)
     * @Assert\All(
     *     @Assert\NotBlank(),
     *     @Assert\Email()
     * )
     * @Assert\Unique()
     * @Serializer\Type("array<string>")
     *
     * @var array|null
     */
    private ?array $emails = null;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param string|null $company
     */
    public function setCompany(?string $company): void
    {
        $this->company = $company;
    }

    /**
     * @return array|null
     */
    public function getEmails(): ?array
    {
        return $this->emails;
    }

    /**
     * @param array|null $emails
     */
    public function setEmails(?array $emails): void
    {
        $this->emails = $emails;
    }
}