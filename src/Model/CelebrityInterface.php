<?php

namespace App\Model;

use DateTimeImmutable;

interface CelebrityInterface extends EntityInterface
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getBirthday(): DateTimeImmutable;

    public function setBirthday(DateTimeImmutable $birthday): void;

    public function getBio(): string;

    public function setBio(string $bio): void;
}