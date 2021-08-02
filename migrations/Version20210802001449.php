<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210802001449 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE posts DROP FOREIGN KEY FK_885DBAFA4E3EE1A1');
        $this->addSql('DROP INDEX IDX_885DBAFA4E3EE1A1 ON posts');
        $this->addSql('ALTER TABLE posts DROP comentarios_id, CHANGE contenido contenido MEDIUMTEXT NOT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494E3EE1A1');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649C5AF4D0F');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D5E258C5');
        $this->addSql('DROP INDEX IDX_8D93D6494E3EE1A1 ON user');
        $this->addSql('DROP INDEX IDX_8D93D649C5AF4D0F ON user');
        $this->addSql('DROP INDEX IDX_8D93D649D5E258C5 ON user');
        $this->addSql('ALTER TABLE user DROP comentarios_id, DROP posts_id, DROP profesion_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE posts ADD comentarios_id INT DEFAULT NULL, CHANGE contenido contenido MEDIUMTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE posts ADD CONSTRAINT FK_885DBAFA4E3EE1A1 FOREIGN KEY (comentarios_id) REFERENCES comentarios (id)');
        $this->addSql('CREATE INDEX IDX_885DBAFA4E3EE1A1 ON posts (comentarios_id)');
        $this->addSql('ALTER TABLE user ADD comentarios_id INT DEFAULT NULL, ADD posts_id INT DEFAULT NULL, ADD profesion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494E3EE1A1 FOREIGN KEY (comentarios_id) REFERENCES comentarios (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649C5AF4D0F FOREIGN KEY (profesion_id) REFERENCES profesion (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D5E258C5 FOREIGN KEY (posts_id) REFERENCES posts (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6494E3EE1A1 ON user (comentarios_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649C5AF4D0F ON user (profesion_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649D5E258C5 ON user (posts_id)');
    }
}
