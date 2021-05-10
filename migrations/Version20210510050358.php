<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210510050358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tbl_celebrity_representative (id UUID NOT NULL, celebrity_id UUID DEFAULT NULL, representative_id UUID DEFAULT NULL, types JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A8E0181E9D12EF95 ON tbl_celebrity_representative (celebrity_id)');
        $this->addSql('CREATE INDEX IDX_A8E0181EFC3FF006 ON tbl_celebrity_representative (representative_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A8E0181E9D12EF95FC3FF006 ON tbl_celebrity_representative (celebrity_id, representative_id)');
        $this->addSql('COMMENT ON COLUMN tbl_celebrity_representative.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN tbl_celebrity_representative.celebrity_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN tbl_celebrity_representative.representative_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE tbl_celebrity_representative ADD CONSTRAINT FK_A8E0181E9D12EF95 FOREIGN KEY (celebrity_id) REFERENCES tbl_celebrity (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tbl_celebrity_representative ADD CONSTRAINT FK_A8E0181EFC3FF006 FOREIGN KEY (representative_id) REFERENCES tbl_representative (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE tbl_celebrity_representative');
    }
}
