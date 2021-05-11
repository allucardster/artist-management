<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210510234933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tbl_log (id UUID NOT NULL, row_id UUID NOT NULL, table_name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, changes JSON NOT NULL, updated_by VARCHAR(255) NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN tbl_log.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN tbl_log.row_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN tbl_log.type IS \'(DC2Type:App\\Enum\\LogType)\'');
        $this->addSql('COMMENT ON COLUMN tbl_log.updated_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE tbl_log');
    }
}
