<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200902112824 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chapitre_likes (id INT AUTO_INCREMENT NOT NULL, chapitre_id INT NOT NULL, user_id INT NOT NULL, is_liked TINYINT(1) NOT NULL, is_shared TINYINT(1) NOT NULL, INDEX IDX_FD54E31C1FBEEF7B (chapitre_id), INDEX IDX_FD54E31CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire_chapitres (id INT AUTO_INCREMENT NOT NULL, chapitre_id INT NOT NULL, user_id INT NOT NULL, commentaire VARCHAR(255) NOT NULL, like_number INT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_DF11F6CB1FBEEF7B (chapitre_id), INDEX IDX_DF11F6CBA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_commentaire_chapitres (id INT AUTO_INCREMENT NOT NULL, commentaire_id INT NOT NULL, user_id INT NOT NULL, is_liked TINYINT(1) NOT NULL, is_shared TINYINT(1) NOT NULL, INDEX IDX_1F15BBB5BA9CD190 (commentaire_id), INDEX IDX_1F15BBB5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chapitre_likes ADD CONSTRAINT FK_FD54E31C1FBEEF7B FOREIGN KEY (chapitre_id) REFERENCES chapitres (id)');
        $this->addSql('ALTER TABLE chapitre_likes ADD CONSTRAINT FK_FD54E31CA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE commentaire_chapitres ADD CONSTRAINT FK_DF11F6CB1FBEEF7B FOREIGN KEY (chapitre_id) REFERENCES chapitres (id)');
        $this->addSql('ALTER TABLE commentaire_chapitres ADD CONSTRAINT FK_DF11F6CBA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE user_commentaire_chapitres ADD CONSTRAINT FK_1F15BBB5BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire_chapitres (id)');
        $this->addSql('ALTER TABLE user_commentaire_chapitres ADD CONSTRAINT FK_1F15BBB5A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE chapitres ADD like_number INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_commentaire_chapitres DROP FOREIGN KEY FK_1F15BBB5BA9CD190');
        $this->addSql('DROP TABLE chapitre_likes');
        $this->addSql('DROP TABLE commentaire_chapitres');
        $this->addSql('DROP TABLE user_commentaire_chapitres');
        $this->addSql('ALTER TABLE chapitres DROP like_number');
    }
}
