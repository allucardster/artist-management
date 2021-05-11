<?php

namespace App\Validator\Constraints;

use Doctrine\Common\Annotations\Annotation\Target;
use Symfony\Component\Validator\Constraint;

/**
 * Class UniqueCelebrityRepresentative
 *
 * @Annotation
 * @Target({"CLASS", "ANNOTATION"})
 *
 * @package App\Validator\Constraints
 */
class UniqueCelebrityRepresentative extends Constraint
{
    public string $message = 'A celebrity with given representative already exists';
    public ?string $atPath = null;

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }

    public function validatedBy()
    {
        return UniqueCelebrityRepresentativeValidator::class;
    }
}