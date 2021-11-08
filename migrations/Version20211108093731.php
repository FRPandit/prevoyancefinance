<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211108093731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE documents (id INT AUTO_INCREMENT NOT NULL, document VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_seven (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_seven_documents (part_seven_id INT NOT NULL, documents_id INT NOT NULL, INDEX IDX_5A718CF5C77125D4 (part_seven_id), INDEX IDX_5A718CF55F0F2752 (documents_id), PRIMARY KEY(part_seven_id, documents_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE part_seven_documents ADD CONSTRAINT FK_5A718CF5C77125D4 FOREIGN KEY (part_seven_id) REFERENCES part_seven (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_seven_documents ADD CONSTRAINT FK_5A718CF55F0F2752 FOREIGN KEY (documents_id) REFERENCES documents (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE part_seven_documents DROP FOREIGN KEY FK_5A718CF55F0F2752');
        $this->addSql('ALTER TABLE part_seven_documents DROP FOREIGN KEY FK_5A718CF5C77125D4');
        $this->addSql('DROP TABLE documents');
        $this->addSql('DROP TABLE part_seven');
        $this->addSql('DROP TABLE part_seven_documents');
    }
}
