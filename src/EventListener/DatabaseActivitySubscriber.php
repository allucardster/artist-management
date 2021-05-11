<?php

namespace App\EventListener;

use App\Entity\Celebrity;
use App\Entity\CelebrityRepresentative;
use App\Entity\Log;
use App\Entity\Representative;
use App\Model\CelebrityInterface;
use App\Model\EntityInterface;
use App\Model\LogEntry;
use App\Model\RepresentativeInterface;
use DateTimeImmutable;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\Security\Core\Security;

class DatabaseActivitySubscriber implements EventSubscriber
{
    private EntityManagerInterface $em;

    private SerializerInterface $serializer;

    private Security $security;

    public function __construct(EntityManagerInterface $em, SerializerInterface $serializer, Security $security)
    {
        $this->em = $em;
        $this->serializer = $serializer;
        $this->security = $security;
    }

    public function getSubscribedEvents(): array
    {
        return [
            Events::postUpdate,
        ];
    }

    public function postUpdate(LifecycleEventArgs $args): void
    {
        $entity = $this->getEntity($args);

        if (null === $entity) {
            return;
        }

        $tableName = $this->getTableName($entity);
        if (null === $tableName) {
            return;
        }

        $uow = $this->em->getUnitOfWork();
        $entityChangeSet = $uow->getEntityChangeSet($args->getObject());
        $logEntry = new LogEntry($entity, $entityChangeSet);

        if (null === $logEntry->getType() || empty($logEntry->getChanges())) {
            return;
        }

        $username = 'system';
        if ($user = $this->security->getUser()) {
            $username = $user->getUsername();
        }

        $log = new Log();
        $log->setRowId($entity->getId());
        $log->setTableName($tableName);
        $log->setType($logEntry->getType());
        $log->setChanges($this->serializer->toArray($logEntry->getChanges()));
        $log->setUpdatedAt(new DateTimeImmutable());
        $log->setUpdatedBy($username);

        $this->em->persist($log);
        $this->em->flush();
    }

    private function getEntity(LifecycleEventArgs $args): ?EntityInterface
    {
        $entity = $args->getObject();

        if ($entity instanceof EntityInterface) {
            return $entity;
        }

        return null;
    }

    private function getTableName($entity): ?string
    {
        if ($entity instanceof Celebrity) {
            return $this->em->getClassMetadata(Celebrity::class)->getTableName();
        }

        if ($entity instanceof Representative) {
            return $this->em->getClassMetadata(Representative::class)->getTableName();;
        }

        if ($entity instanceof CelebrityRepresentative) {
            return $this->em->getClassMetadata(CelebrityRepresentative::class)->getTableName();
        }

        return null;
    }
}