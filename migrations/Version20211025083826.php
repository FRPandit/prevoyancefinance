<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211025083826 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE guarantee_label (id INT AUTO_INCREMENT NOT NULL, guarantee_label VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_two_guarantee (part_two_id INT NOT NULL, guarantee_id INT NOT NULL, INDEX IDX_E07DDCB2A956E949 (part_two_id), INDEX IDX_E07DDCB2DB4B0220 (guarantee_id), PRIMARY KEY(part_two_id, guarantee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_two_future_income (part_two_id INT NOT NULL, future_income_id INT NOT NULL, INDEX IDX_4AC070CCA956E949 (part_two_id), INDEX IDX_4AC070CCC4420662 (future_income_id), PRIMARY KEY(part_two_id, future_income_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE part_two_guarantee ADD CONSTRAINT FK_E07DDCB2A956E949 FOREIGN KEY (part_two_id) REFERENCES part_two (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_two_guarantee ADD CONSTRAINT FK_E07DDCB2DB4B0220 FOREIGN KEY (guarantee_id) REFERENCES guarantee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_two_future_income ADD CONSTRAINT FK_4AC070CCA956E949 FOREIGN KEY (part_two_id) REFERENCES part_two (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_two_future_income ADD CONSTRAINT FK_4AC070CCC4420662 FOREIGN KEY (future_income_id) REFERENCES future_income (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE future_income RENAME INDEX idx_dd02e94bc4420662 TO IDX_5EB9C5E97B3C8E45');
        $this->addSql('ALTER TABLE future_income RENAME INDEX idx_9413bb71c4420662 TO IDX_5EB9C5E9B0FDF16E');
        $this->addSql('ALTER TABLE guarantee ADD guarantee_label_id INT NOT NULL, DROP name');
        $this->addSql('ALTER TABLE guarantee ADD CONSTRAINT FK_589198D8E7A1D12E FOREIGN KEY (guarantee_label_id) REFERENCES guarantee_label (id)');
        $this->addSql('CREATE INDEX IDX_589198D8E7A1D12E ON guarantee (guarantee_label_id)');
        $this->addSql('ALTER TABLE part_two DROP guarantee_id, DROP future_income_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE guarantee DROP FOREIGN KEY FK_589198D8E7A1D12E');
        $this->addSql('DROP TABLE guarantee_label');
        $this->addSql('DROP TABLE part_two_guarantee');
        $this->addSql('DROP TABLE part_two_future_income');
        $this->addSql('ALTER TABLE future_income RENAME INDEX idx_5eb9c5e9b0fdf16e TO IDX_9413BB71C4420662');
        $this->addSql('ALTER TABLE future_income RENAME INDEX idx_5eb9c5e97b3c8e45 TO IDX_DD02E94BC4420662');
        $this->addSql('DROP INDEX IDX_589198D8E7A1D12E ON guarantee');
        $this->addSql('ALTER TABLE guarantee ADD name VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP guarantee_label_id');
        $this->addSql('ALTER TABLE part_two ADD guarantee_id INT NOT NULL, ADD future_income_id INT DEFAULT NULL');
    }
}
