<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211026130020 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evolution CHANGE year year INT NOT NULL');
        $this->addSql('ALTER TABLE future_income ADD salary_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE future_income ADD CONSTRAINT FK_5EB9C5E9B0FDF16E FOREIGN KEY (salary_id) REFERENCES salary (id)');
        $this->addSql('CREATE INDEX IDX_5EB9C5E9B0FDF16E ON future_income (salary_id)');
        $this->addSql('ALTER TABLE future_income RENAME INDEX idx_dd02e94bc4420662 TO IDX_5EB9C5E97B3C8E45');
        $this->addSql('ALTER TABLE salary DROP FOREIGN KEY FK_9413BB71C4420662');
        $this->addSql('DROP INDEX IDX_9413BB71C4420662 ON salary');
        $this->addSql('ALTER TABLE salary DROP future_income_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evolution CHANGE year year DATE NOT NULL');
        $this->addSql('ALTER TABLE future_income DROP FOREIGN KEY FK_5EB9C5E9B0FDF16E');
        $this->addSql('DROP INDEX IDX_5EB9C5E9B0FDF16E ON future_income');
        $this->addSql('ALTER TABLE future_income DROP salary_id');
        $this->addSql('ALTER TABLE future_income RENAME INDEX idx_5eb9c5e97b3c8e45 TO IDX_DD02E94BC4420662');
        $this->addSql('ALTER TABLE salary ADD future_income_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salary ADD CONSTRAINT FK_9413BB71C4420662 FOREIGN KEY (future_income_id) REFERENCES future_income (id)');
        $this->addSql('CREATE INDEX IDX_9413BB71C4420662 ON salary (future_income_id)');
    }
}
