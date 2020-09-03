<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200902113826 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE word DROP FOREIGN KEY FK_C3F17511E82E9CB8');
        $this->addSql('DROP INDEX IDX_C3F17511E82E9CB8 ON word');
        $this->addSql('ALTER TABLE word ADD relation VARCHAR(255) NOT NULL, CHANGE language_part_id language_part INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE word DROP relation, CHANGE language_part language_part_id INT NOT NULL');
        $this->addSql('ALTER TABLE word ADD CONSTRAINT FK_C3F17511E82E9CB8 FOREIGN KEY (language_part_id) REFERENCES language_part (id)');
        $this->addSql('CREATE INDEX IDX_C3F17511E82E9CB8 ON word (language_part_id)');
    }
}
