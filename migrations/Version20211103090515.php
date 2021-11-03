<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211103090515 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE future_income RENAME INDEX idx_dd02e94bc4420662 TO IDX_5EB9C5E97B3C8E45');
        $this->addSql('ALTER TABLE future_income RENAME INDEX idx_9413bb71c4420662 TO IDX_5EB9C5E9B0FDF16E');
        $this->addSql('ALTER TABLE part_two DROP guarantee_id, DROP future_income_id, CHANGE contribution_class_label contribution_class_label VARCHAR(15) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE future_income RENAME INDEX idx_5eb9c5e9b0fdf16e TO IDX_9413BB71C4420662');
        $this->addSql('ALTER TABLE future_income RENAME INDEX idx_5eb9c5e97b3c8e45 TO IDX_DD02E94BC4420662');
        $this->addSql('ALTER TABLE part_two ADD guarantee_id INT NOT NULL, ADD future_income_id INT DEFAULT NULL, CHANGE contribution_class_label contribution_class_label VARCHAR(15) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
