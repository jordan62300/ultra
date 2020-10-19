<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200818180719 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chapitres ADD CONSTRAINT FK_508679FC41EB8A3C FOREIGN KEY (arc_id) REFERENCES arcs (id)');
        $this->addSql('CREATE INDEX IDX_508679FC41EB8A3C ON chapitres (arc_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chapitres DROP FOREIGN KEY FK_508679FC41EB8A3C');
        $this->addSql('DROP INDEX IDX_508679FC41EB8A3C ON chapitres');
    }
}
