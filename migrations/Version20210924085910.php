<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210924085910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD creation_date DATE NOT NULL, ADD exp_date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE user RENAME INDEX pseudo TO UNIQ_8D93D64986CC499D');
        $this->addSql('ALTER TABLE user RENAME INDEX email TO UNIQ_8D93D649E7927C74');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP creation_date, DROP exp_date');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_8d93d649e7927c74 TO email');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_8d93d64986cc499d TO pseudo');
    }
}
