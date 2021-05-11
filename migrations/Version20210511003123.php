<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210511003123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO tbl_celebrity (id, name, birthday, bio) VALUES ('b07f5374-861a-4033-b8f7-79d1e3a8b424', 'John Doe', '2013-01-01 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce mauris velit, viverra at augue nec, sodales fermentum elit. Nullam ac purus eros. Nam vitae erat nec ipsum porta bibendum. Ut eu nibh ullamcorper metus blandit pretium. Integer sed mauris pulvinar orci tristique ornare vel at lectus. Sed aliquet congue faucibus. Donec dignissim aliquam massa, eleifend euismod lacus fringilla quis. Pellentesque tincidunt justo sit amet molestie feugiat. Donec sed enim ex. Curabitur aliquet urna vitae velit finibus, nec pharetra nisi dictum. Curabitur faucibus pharetra turpis, nec sodales ipsum gravida ultricies.')");
        $this->addSql("INSERT INTO tbl_celebrity (id, name, birthday, bio) VALUES ('2538ff80-f692-4f4e-9c1d-a9ac423b3109', 'Rick Sanchez', '1951-03-25 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce mauris velit, viverra at augue nec, sodales fermentum elit. Nullam ac purus eros. Nam vitae erat nec ipsum porta bibendum. Ut eu nibh ullamcorper metus blandit pretium. Integer sed mauris pulvinar orci tristique ornare vel at lectus. Sed aliquet congue faucibus. Donec dignissim aliquam massa, eleifend euismod lacus fringilla quis. Pellentesque tincidunt justo sit amet molestie feugiat. Donec sed enim ex. Curabitur aliquet urna vitae velit finibus, nec pharetra nisi dictum. Curabitur faucibus pharetra turpis, nec sodales ipsum gravida ultricies.')");
        $this->addSql("INSERT INTO tbl_celebrity (id, name, birthday, bio) VALUES ('48ecc235-45bc-4f06-8fb5-8852c747ab5f', 'Hideo Kojima', '1963-08-24 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce mauris velit, viverra at augue nec, sodales fermentum elit. Nullam ac purus eros. Nam vitae erat nec ipsum porta bibendum. Ut eu nibh ullamcorper metus blandit pretium. Integer sed mauris pulvinar orci tristique ornare vel at lectus. Sed aliquet congue faucibus. Donec dignissim aliquam massa, eleifend euismod lacus fringilla quis. Pellentesque tincidunt justo sit amet molestie feugiat. Donec sed enim ex. Curabitur aliquet urna vitae velit finibus, nec pharetra nisi dictum. Curabitur faucibus pharetra turpis, nec sodales ipsum gravida ultricies.')");
        $this->addSql("INSERT INTO tbl_celebrity (id, name, birthday, bio) VALUES ('d0650a00-acdd-4f74-a3ad-2e994114c542', 'John Carmack', '1970-08-20 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce mauris velit, viverra at augue nec, sodales fermentum elit. Nullam ac purus eros. Nam vitae erat nec ipsum porta bibendum. Ut eu nibh ullamcorper metus blandit pretium. Integer sed mauris pulvinar orci tristique ornare vel at lectus. Sed aliquet congue faucibus. Donec dignissim aliquam massa, eleifend euismod lacus fringilla quis. Pellentesque tincidunt justo sit amet molestie feugiat. Donec sed enim ex. Curabitur aliquet urna vitae velit finibus, nec pharetra nisi dictum. Curabitur faucibus pharetra turpis, nec sodales ipsum gravida ultricies.')");
        $this->addSql("INSERT INTO tbl_celebrity (id, name, birthday, bio) VALUES ('43be6866-e237-4b69-87c0-64d2a0584dff', 'Michael Jordan', '1963-02-17 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce mauris velit, viverra at augue nec, sodales fermentum elit. Nullam ac purus eros. Nam vitae erat nec ipsum porta bibendum. Ut eu nibh ullamcorper metus blandit pretium. Integer sed mauris pulvinar orci tristique ornare vel at lectus. Sed aliquet congue faucibus. Donec dignissim aliquam massa, eleifend euismod lacus fringilla quis. Pellentesque tincidunt justo sit amet molestie feugiat. Donec sed enim ex. Curabitur aliquet urna vitae velit finibus, nec pharetra nisi dictum. Curabitur faucibus pharetra turpis, nec sodales ipsum gravida ultricies.')");

        $this->addSql("INSERT INTO tbl_representative (id, name, company, emails) VALUES ('2af6d6dd-212d-4ebb-b707-e5f9c24fd41d', 'John Smith', 'Smith Co.', '[\"john.smith@example.com\", \"johnny.s@example.com\"]')");
        $this->addSql("INSERT INTO tbl_representative (id, name, company, emails) VALUES ('0d267f7e-67f4-437a-8631-7df5c8c7697e', 'Beth Smith', 'Sanchez Inc.', '[\"beth.smith@example.com\"]')");
        $this->addSql("INSERT INTO tbl_representative (id, name, company, emails) VALUES ('b53e8fef-151c-45d7-a7ba-6bdd0715e6a4', 'Morty Smith', 'Morty Ltd.', '[\"morty.smith@example.com\"]')");
        $this->addSql("INSERT INTO tbl_representative (id, name, company, emails) VALUES ('651b5a95-533c-4ac5-a072-dd3d4166afd4', 'John Romero', 'Id Software Inc.', '[\"john.romero@example.com\"]')");
        $this->addSql("INSERT INTO tbl_representative (id, name, company, emails) VALUES ('cffdd196-ae3e-40a9-a200-61b7f53f080e', 'Guillermo del Toro', 'Tequila Gang Ltd.', '[\"guillermo.del.toro@example.com\"]')");

        $this->addSql("INSERT INTO tbl_celebrity_representative (id, celebrity_id, representative_id, types) VALUES ('8e7bb1b7-6482-4250-bcb6-7226e20a32d6', 'b07f5374-861a-4033-b8f7-79d1e3a8b424', '2af6d6dd-212d-4ebb-b707-e5f9c24fd41d', '[\"agent\"]')");
        $this->addSql("INSERT INTO tbl_celebrity_representative (id, celebrity_id, representative_id, types) VALUES ('f4ea958f-232a-4ae9-a3a3-be5405d4894b', '2538ff80-f692-4f4e-9c1d-a9ac423b3109', '0d267f7e-67f4-437a-8631-7df5c8c7697e', '[\"agent\", \"manager\"]')");
        $this->addSql("INSERT INTO tbl_celebrity_representative (id, celebrity_id, representative_id, types) VALUES ('767693dc-c109-465b-9451-5dc66687b7da', '2538ff80-f692-4f4e-9c1d-a9ac423b3109', 'b53e8fef-151c-45d7-a7ba-6bdd0715e6a4', '[\"publicist\"]')");
        $this->addSql("INSERT INTO tbl_celebrity_representative (id, celebrity_id, representative_id, types) VALUES ('46bb5542-1884-45a8-be08-2f03ec45f27f', 'd0650a00-acdd-4f74-a3ad-2e994114c542', '651b5a95-533c-4ac5-a072-dd3d4166afd4', '[\"agent\"]')");
        $this->addSql("INSERT INTO tbl_celebrity_representative (id, celebrity_id, representative_id, types) VALUES ('f6c26a5c-247e-4607-b866-377c80b6888f', '48ecc235-45bc-4f06-8fb5-8852c747ab5f', 'cffdd196-ae3e-40a9-a200-61b7f53f080e', '[\"publicist\"]')");
        $this->addSql("INSERT INTO tbl_celebrity_representative (id, celebrity_id, representative_id, types) VALUES ('8e3df223-aec0-43f9-b140-6c35485ad97c', '43be6866-e237-4b69-87c0-64d2a0584dff', '651b5a95-533c-4ac5-a072-dd3d4166afd4', '[\"manager\"]')");

        $this->addSql("INSERT INTO tbl_log (id, row_id, table_name, type, changes, updated_by, updated_at) VALUES ('19d3d170-596a-444d-8dc6-572106dc9fe6', 'b07f5374-861a-4033-b8f7-79d1e3a8b424', 'tbl_celebrity', 'celebrity_update', '{\"birthday\":{\"from\":\"1954-03-01T17:41:45\",\"to\":\"2003-01-01T00:00:00\"}}', 'admin', '2021-05-11 00:59:14')");
        $this->addSql("INSERT INTO tbl_log (id, row_id, table_name, type, changes, updated_by, updated_at) VALUES ('513d03df-dc7a-44b9-be74-dfcbcb93f84e', '2538ff80-f692-4f4e-9c1d-a9ac423b3109', 'tbl_celebrity', 'celebrity_update', '{\"birthday\":{\"from\":\"2005-10-10T19:52:14\",\"to\":\"1951-03-25T00:00:00\"}}', 'admin', '2021-05-11 01:01:34')");
        $this->addSql("INSERT INTO tbl_log (id, row_id, table_name, type, changes, updated_by, updated_at) VALUES ('e9e6fb2a-fe8e-4dc4-bff9-3f0b2acaddcc', '48ecc235-45bc-4f06-8fb5-8852c747ab5f', 'tbl_celebrity', 'celebrity_update', '{\"birthday\":{\"from\":\"2002-12-13T17:54:42\",\"to\":\"1951-03-25T00:00:00\"}}', 'admin', '2021-05-11 01:03:14')");
        $this->addSql("INSERT INTO tbl_log (id, row_id, table_name, type, changes, updated_by, updated_at) VALUES ('4da78808-6949-4e53-b0a6-956a0ba938da', '48ecc235-45bc-4f06-8fb5-8852c747ab5f', 'tbl_celebrity', 'celebrity_update', '{\"birthday\":{\"from\":\"1951-03-25T00:00:00\",\"to\":\"1963-08-24T00:00:00\"}}', 'admin', '2021-05-11 01:03:37')");
        $this->addSql("INSERT INTO tbl_log (id, row_id, table_name, type, changes, updated_by, updated_at) VALUES ('f6215498-c693-49da-8e44-df51f749488d', 'd0650a00-acdd-4f74-a3ad-2e994114c542', 'tbl_celebrity', 'celebrity_update', '{\"birthday\":{\"from\":\"1959-10-05T09:48:35\",\"to\":\"1970-08-20T00:00:00\"}}', 'admin', '2021-05-11 01:05:01')");
        $this->addSql("INSERT INTO tbl_log (id, row_id, table_name, type, changes, updated_by, updated_at) VALUES ('b87f6af4-1b8a-4a8d-89e9-3fb85bb6be7c', '43be6866-e237-4b69-87c0-64d2a0584dff', 'tbl_celebrity', 'celebrity_update', '{\"birthday\":{\"from\":\"1981-07-06T01:20:33\",\"to\":\"1963-02-17T00:00:00\"}}', 'admin', '2021-05-11 01:06:25')");
        $this->addSql("INSERT INTO tbl_log (id, row_id, table_name, type, changes, updated_by, updated_at) VALUES ('8d26d0d5-e847-4fb0-8b3c-724c8aa7a605', '2af6d6dd-212d-4ebb-b707-e5f9c24fd41d', 'tbl_representative', 'representative_update', '{\"company\":{\"from\":\"Smith Inc.\",\"to\":\"Smith Co.\"},\"emails\":{\"from\":[\"john.smith@example.com\"],\"to\":[\"john.smith@example.com\",\"johnny.s@example.com\"]}}', 'admin', '2021-05-11 01:09:30')");
        $this->addSql("INSERT INTO tbl_log (id, row_id, table_name, type, changes, updated_by, updated_at) VALUES ('315c6f0b-cbef-47d3-8a30-5eb05c3902e1', '0d267f7e-67f4-437a-8631-7df5c8c7697e', 'tbl_representative', 'representative_update', '{\"name\":{\"from\":\"Beth Sanchez\",\"to\":\"Beth Smith\"},\"emails\":{\"from\":[\"beth.sanchez@example.com\"],\"to\":[\"beth.smith@example.com\"]}}', 'admin', '2021-05-11 01:11:54')");
        $this->addSql("INSERT INTO tbl_log (id, row_id, table_name, type, changes, updated_by, updated_at) VALUES ('243c31c3-657b-42ca-88c0-04f209c0ed3f', 'b53e8fef-151c-45d7-a7ba-6bdd0715e6a4', 'tbl_representative', 'representative_update', '{\"company\":{\"from\":\"Sanchez Inc.\",\"to\":\"Morty Ltd.\"}}', 'admin', '2021-05-11 01:13:58')");
        $this->addSql("INSERT INTO tbl_log (id, row_id, table_name, type, changes, updated_by, updated_at) VALUES ('0af99d62-aa44-4fb3-a4a3-390834b48c2b', '651b5a95-533c-4ac5-a072-dd3d4166afd4', 'tbl_representative', 'representative_update', '{\"company\":{\"from\":\"Id Software\",\"to\":\"Id Software Inc.\"}}', 'admin', '2021-05-11 01:15:35')");
        $this->addSql("INSERT INTO tbl_log (id, row_id, table_name, type, changes, updated_by, updated_at) VALUES ('af066106-d259-4cd1-b1d3-afae52318f71', 'cffdd196-ae3e-40a9-a200-61b7f53f080e', 'tbl_representative', 'representative_update', '{\"company\":{\"from\":\"Tequila Gang.\",\"to\":\"Tequila Gang Ltd.\"}}', 'admin', '2021-05-11 01:17:01')");
        $this->addSql("INSERT INTO tbl_log (id, row_id, table_name, type, changes, updated_by, updated_at) VALUES ('6de5750e-c2cd-49a6-a009-6ea7e11a5af2', '8e3df223-aec0-43f9-b140-6c35485ad97c', 'tbl_celebrity_representative', 'celebrity_representative_update', '{\"representative\":{\"from\":{\"name\":\"Morty Smith\",\"company\":\"Morty Ltd.\",\"emails\":[\"morty.smith@example.com\"],\"id\":\"b53e8fef-151c-45d7-a7ba-6bdd0715e6a4\"},\"to\":{\"name\":\"John Romero\",\"company\":\"Id Software Inc.\",\"emails\":[\"john.romero@example.com\"],\"id\":\"651b5a95-533c-4ac5-a072-dd3d4166afd4\"}}}', 'admin', '2021-05-11 21:18:56');");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
