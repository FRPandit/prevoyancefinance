<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210923115336 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE state (id INT AUTO_INCREMENT NOT NULL, state_label VARCHAR(8) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD state_label_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66267E0C04 FOREIGN KEY (state_label_id_id) REFERENCES state (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66267E0C04 ON article (state_label_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66267E0C04');
        $this->addSql('DROP TABLE state');
        $this->addSql('DROP INDEX IDX_23A0E66267E0C04 ON article');
        $this->addSql('ALTER TABLE article DROP state_label_id_id');
    }
}
