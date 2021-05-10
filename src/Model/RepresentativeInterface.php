<?php

namespace App\Model;

interface RepresentativeInterface
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getCompany(): string;

    public function setCompany(string $company): void;

    public function getEmails(array $emails): array;

    public function setEmails(array $emails): void;
}