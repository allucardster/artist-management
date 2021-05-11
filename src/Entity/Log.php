<?php

namespace App\Entity;

use App\Doctrine\Entity\Traits\IdTrait;
use App\Enum\LogType;
use App\Model\EntityInterface;
use App\Repository\LogRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Log
 *
 * @ORM\Entity(repositoryClass=LogRepository::class)
 * @ORM\Table(name="tbl_log")
 *
 * @package App\Entity
 */
class Log implements EntityInterface
{
    use IdTrait;

    /**
     * @ORM\Column(type="uuid")
     * @Serializer\Type("string")
     *
     * @var UuidInterface
     */
    private UuidInterface $rowId;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private string $tableName;

    /**
     * @ORM\Column(type=LogType::class)
     *
     * @var LogType
     */
    private LogType $type;

    /**
     * @ORM\Column(type="json")
     *
     * @var array
     */
    private array $changes;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private string $updatedBy;

    /**
     * @ORM\Column(type="datetime_immutable")
     *
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $updatedAt;

    public function getRowId(): UuidInterface
    {
        return $this->rowId;
    }

    public function setRowId(UuidInterface $rowId): void
    {
        $this->rowId = $rowId;
    }

    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function setTableName(string $tableName): void
    {
        $this->tableName = $tableName;
    }

    public function getType(): LogType
    {
        return $this->type;
    }

    public function setType(LogType $type): void
    {
        $this->type = $type;
    }

    public function getChanges(): array
    {
        return $this->changes;
    }

    public function setChanges(array $changes): void
    {
        $this->changes = $changes;
    }

    public function getUpdatedBy(): string
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(string $updatedBy): void
    {
        $this->updatedBy = $updatedBy;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeImmutable $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}