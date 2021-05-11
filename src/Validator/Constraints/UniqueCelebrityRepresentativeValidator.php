<?php

namespace App\Validator\Constraints;

use App\Repository\CelebrityRepresentativeRepository;
use App\Request\CelebrityRepresentativeRequestInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class UniqueCelebrityRepresentativeValidator extends ConstraintValidator
{
    private CelebrityRepresentativeRepository $celebrityRepresentativeRepository;

    public function __construct(CelebrityRepresentativeRepository $celebrityRepresentativeRepository)
    {
        $this->celebrityRepresentativeRepository = $celebrityRepresentativeRepository;
    }

    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof UniqueCelebrityRepresentative) {
            throw new UnexpectedTypeException($constraint, UniqueCelebrityRepresentative::class);
        }

        if (!$value instanceof CelebrityRepresentativeRequestInterface) {
            throw new UnexpectedTypeException($value, CelebrityRepresentativeRequestInterface::class);
        }

        if ($value->getCelebrity() === null && $value->getRepresentative() === null) {
            return;
        }

        $found = $this->celebrityRepresentativeRepository->findOneBy(
            [
                'celebrity' => $value->getCelebrity(),
                'representative' => $value->getRepresentative()
            ]
        );

        if (null === $found) {
            return;
        }

        $this->context
            ->buildViolation($constraint->message)
            ->atPath($constraint->atPath ?? 'celebrity')
            ->addViolation()
        ;
    }
}