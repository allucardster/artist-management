<?php

namespace App\Model;

use App\Enum\LogType;
use App\Model\CelebrityInterface;
use App\Model\EntityInterface;
use App\Model\RepresentativeInterface;
use DateTimeImmutable;
use Ramsey\Uuid\UuidInterface;

class LogEntry
{
    private EntityInterface $entity;

    private array $entityChangeSet;

    public function __construct(EntityInterface $entity, array $entityChangeSet)
    {
        $this->entity = $entity;
        $this->entityChangeSet = $entityChangeSet;
    }

    public function getType(): ?LogType
    {
        if ($this->entity instanceof CelebrityInterface) {
            return LogType::CELEBRITY_UPDATE();
        }

        if ($this->entity instanceof RepresentativeInterface) {
            return LogType::REPRESENTATIVE_UPDATE();
        }

        return null;
    }

    /**
     * @return LogEntryChange[]
     */
    public function getChanges(): array
    {
        $changes = [];
        foreach ($this->entityChangeSet as $key => $values) {
            if (!is_string($key) || !is_array($values)) {
                continue;
            }

            if ($logChange = LogEntryChange::createFrom($values)) {
                $changes[$key] = $logChange;
            }
        }

        return $changes;
    }
}