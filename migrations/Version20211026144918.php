<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211026144918 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE children (id INT AUTO_INCREMENT NOT NULL, yob INT DEFAULT NULL, handicapped TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_one_children (part_one_id INT NOT NULL, children_id INT NOT NULL, INDEX IDX_4F65F7F8C20A0E86 (part_one_id), INDEX IDX_4F65F7F83D3D2749 (children_id), PRIMARY KEY(part_one_id, children_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE part_one_children ADD CONSTRAINT FK_4F65F7F8C20A0E86 FOREIGN KEY (part_one_id) REFERENCES part_one (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_one_children ADD CONSTRAINT FK_4F65F7F83D3D2749 FOREIGN KEY (children_id) REFERENCES children (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_one ADD child TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE part_one_children DROP FOREIGN KEY FK_4F65F7F83D3D2749');
        $this->addSql('DROP TABLE children');
        $this->addSql('DROP TABLE part_one_children');
        $this->addSql('ALTER TABLE part_one DROP child');
    }
}
