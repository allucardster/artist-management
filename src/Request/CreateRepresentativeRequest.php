<?php

namespace App\Request;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class CreateRepresentativeRequest
{
    /**
     * @Assert\NotBlank()
     *
     * @var string
     */
    private string $name;

    /**
     * @Assert\NotBlank()
     *
     * @var string
     */
    private string $company;

    /**
     * @Assert\NotNull()
     * @Assert\Type(type="array")
     * @Assert\Count(min=1, max=5)
     * @Assert\All(
     *     @Assert\NotBlank(),
     *     @Assert\Email()
     * )
     * @Assert\Unique()
     * @Serializer\Type("array<string>")
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