<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211103160645 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE death_funds (id INT AUTO_INCREMENT NOT NULL, consumption TINYINT(1) DEFAULT NULL, acquisition TINYINT(1) DEFAULT NULL, amount_acquisition INT DEFAULT NULL, investment TINYINT(1) DEFAULT NULL, amount_investment INT DEFAULT NULL, preference TINYINT(1) NOT NULL, preference_name VARCHAR(120) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE drop_reaction (id INT AUTO_INCREMENT NOT NULL, drop_label VARCHAR(55) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE financial_investment (id INT AUTO_INCREMENT NOT NULL, fi_label VARCHAR(90) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE financial_products (id INT AUTO_INCREMENT NOT NULL, nothing TINYINT(1) DEFAULT NULL, bank_account TINYINT(1) DEFAULT NULL, financial_savings TINYINT(1) DEFAULT NULL, life_insurance TINYINT(1) DEFAULT NULL, life_insurance_uc INT DEFAULT NULL, retirement_investment TINYINT(1) DEFAULT NULL, retirement_investment_uc INT DEFAULT NULL, employee_savings TINYINT(1) DEFAULT NULL, employee_savings_uc INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_five (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preference (id INT AUTO_INCREMENT NOT NULL, pref_label VARCHAR(80) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE previous_financial_products (id INT AUTO_INCREMENT NOT NULL, pfp_label VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE risk (id INT AUTO_INCREMENT NOT NULL, risk_label VARCHAR(35) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE share_of_investment (id INT AUTO_INCREMENT NOT NULL, soi_label VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unplanned (id INT AUTO_INCREMENT NOT NULL, unpl_label VARCHAR(80) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE death_funds');
        $this->addSql('DROP TABLE drop_reaction');
        $this->addSql('DROP TABLE financial_investment');
        $this->addSql('DROP TABLE financial_products');
        $this->addSql('DROP TABLE part_five');
        $this->addSql('DROP TABLE preference');
        $this->addSql('DROP TABLE previous_financial_products');
        $this->addSql('DROP TABLE risk');
        $this->addSql('DROP TABLE share_of_investment');
        $this->addSql('DROP TABLE unplanned');
    }
}
