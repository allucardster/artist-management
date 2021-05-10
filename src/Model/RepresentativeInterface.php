<?php

namespace App\Model;

interface RepresentativeInterface extends EntityInterface
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getCompany(): string;

    public function setCompany(string $company): void;

    public function getEmails(): array;

    public function setEmails(array $emails): void;
}