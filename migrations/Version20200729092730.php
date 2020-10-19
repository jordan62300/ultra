<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200729092730 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chapitres ADD manga_id INT NOT NULL, ADD file_name VARCHAR(255) NOT NULL, CHANGE chemin_image statut VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE chapitres ADD CONSTRAINT FK_508679FC7B6461 FOREIGN KEY (manga_id) REFERENCES mangas (id)');
        $this->addSql('CREATE INDEX IDX_508679FC7B6461 ON chapitres (manga_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chapitres DROP FOREIGN KEY FK_508679FC7B6461');
        $this->addSql('DROP INDEX IDX_508679FC7B6461 ON chapitres');
        $this->addSql('ALTER TABLE chapitres ADD chemin_image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP manga_id, DROP statut, DROP file_name');
    }
}
