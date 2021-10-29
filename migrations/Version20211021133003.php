<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021133003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE collective_foresight (id INT AUTO_INCREMENT NOT NULL, cf_label VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE collective_retirement (id INT AUTO_INCREMENT NOT NULL, collective_retirement_label VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evolution (id INT AUTO_INCREMENT NOT NULL, evolution TINYINT(1) NOT NULL, year INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE future_income (id INT AUTO_INCREMENT NOT NULL, year_label VARCHAR(15) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guarantee (id INT AUTO_INCREMENT NOT NULL, company VARCHAR(120) DEFAULT NULL, amount_of_guarantees INT DEFAULT NULL, date DATE DEFAULT NULL, contribution INT DEFAULT NULL, madelin TINYINT(1) DEFAULT NULL, beneficiaries VARCHAR(120) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_two (id INT AUTO_INCREMENT NOT NULL, active_company_savings_plan TINYINT(1) DEFAULT NULL, actual_saving INT NOT NULL, contribution_class TINYINT(1) NOT NULL, contribution_class_label VARCHAR(15) DEFAULT NULL, trusted_account TINYINT(1) NOT NULL, trusted_account_name VARCHAR(120) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salary (id INT AUTO_INCREMENT NOT NULL, amount INT DEFAULT NULL, gross_net TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE savings_plan (id INT AUTO_INCREMENT NOT NULL, savings_label VARCHAR(25) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE total_annual_income (id INT AUTO_INCREMENT NOT NULL, income_label VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE collective_foresight');
        $this->addSql('DROP TABLE collective_retirement');
        $this->addSql('DROP TABLE evolution');
        $this->addSql('DROP TABLE future_income');
        $this->addSql('DROP TABLE guarantee');
        $this->addSql('DROP TABLE part_two');
        $this->addSql('DROP TABLE salary');
        $this->addSql('DROP TABLE savings_plan');
        $this->addSql('DROP TABLE total_annual_income');
    }
}
