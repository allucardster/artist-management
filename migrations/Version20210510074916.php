<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use DateInterval;
use DateTimeImmutable;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Ramsey\Uuid\Uuid;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210510074916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $bio = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce mauris velit, viverra at augue nec, sodales fermentum elit. Nullam ac purus eros. Nam vitae erat nec ipsum porta bibendum. Ut eu nibh ullamcorper metus blandit pretium. Integer sed mauris pulvinar orci tristique ornare vel at lectus. Sed aliquet congue faucibus. Donec dignissim aliquam massa, eleifend euismod lacus fringilla quis. Pellentesque tincidunt justo sit amet molestie feugiat. Donec sed enim ex. Curabitur aliquet urna vitae velit finibus, nec pharetra nisi dictum. Curabitur faucibus pharetra turpis, nec sodales ipsum gravida ultricies.';
        $names = ['John Doe', 'Rick Sanchez', 'Hideo Kojima', 'John Carmack', 'Michael Jordan'];

        foreach ($names as $name) {
            $id = Uuid::uuid4();
            $birthday = $this->getRandomBirthday()->format('Y-m-d H:i:s');
            $this->addSql("INSERT INTO tbl_celebrity (id, name, birthday, bio) VALUES ('{$id}', '{$name}', '{$birthday}', '{$bio}')");
        }
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }

    private function getRandomBirthday(): DateTimeImmutable
    {
        $start = new DateTimeImmutable();
        $end = $start->sub(new DateInterval('P70Y'));
        $rand = rand($end->getTimestamp(), $start->getTimestamp());

        return $start->setTimestamp($rand);
    }
}
