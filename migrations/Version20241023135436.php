<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241023135436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire ADD user_id INT DEFAULT NULL, DROP content');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_67F068BCA76ED395 ON commentaire (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BA9CD190');
        $this->addSql('DROP INDEX IDX_8D93D649BA9CD190 ON user');
        $this->addSql('ALTER TABLE user DROP commentaire_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA76ED395');
        $this->addSql('DROP INDEX IDX_67F068BCA76ED395 ON commentaire');
        $this->addSql('ALTER TABLE commentaire ADD content LONGTEXT NOT NULL, DROP user_id');
        $this->addSql('ALTER TABLE user ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D93D649BA9CD190 ON user (commentaire_id)');
    }
}
