<?php

namespace App\Model;

use DateTimeInterface;

class LogEntryChange
{
    /**
     * @var mixed
     */
    private $from;

    /**
     * @var mixed
     */
    private $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public static function createFrom(array $values): ?self
    {
        $values = array_values($values);
        if (empty($values) || count($values) < 2) {
            return null;
        }

        $from = $values[0];
        $to = $values[1];

        if (
            $from instanceof DateTimeInterface
            && $to instanceof DateTimeInterface
            && $from->format(DateTimeInterface::ATOM) === $to->format(DateTimeInterface::ATOM)
        ) {
            return null;
        }

        return new self($from, $to);
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function getTo()
    {
        return $this->to;
    }
}