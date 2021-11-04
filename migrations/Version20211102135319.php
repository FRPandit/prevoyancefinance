<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211102135319 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE credit_leasing (id INT AUTO_INCREMENT NOT NULL, total_remaining INT DEFAULT NULL, end DATE DEFAULT NULL, rate VARCHAR(15) DEFAULT NULL, mensuality INT DEFAULT NULL, cover_first_insured INT DEFAULT NULL, cover_second_insured INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movable_heritage (id INT AUTO_INCREMENT NOT NULL, detained_by VARCHAR(120) DEFAULT NULL, open_date DATE DEFAULT NULL, amount INT DEFAULT NULL, organization VARCHAR(120) DEFAULT NULL, interest_rate INT DEFAULT NULL, monthly_annual_payment VARCHAR(50) DEFAULT NULL, goal VARCHAR(120) DEFAULT NULL, beneficiary VARCHAR(120) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movable_heritage_label (id INT AUTO_INCREMENT NOT NULL, movable_heritage_label VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_four (id INT AUTO_INCREMENT NOT NULL, main_bank VARCHAR(120) NOT NULL, satisfaction TINYINT(1) NOT NULL, advice_frequency TINYINT(1) NOT NULL, missing_service VARCHAR(250) NOT NULL, monthly_saving INT NOT NULL, open_to_proposals TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_three (id INT AUTO_INCREMENT NOT NULL, have_credit_leasing TINYINT(1) NOT NULL, project TINYINT(1) NOT NULL, needs VARCHAR(250) DEFAULT NULL, trusted_lawyer TINYINT(1) NOT NULL, legal_specificity VARCHAR(250) DEFAULT NULL, law_firm VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_two_total_annual_income (part_two_id INT NOT NULL, total_annual_income_id INT NOT NULL, INDEX IDX_B9EAAD0FA956E949 (part_two_id), INDEX IDX_B9EAAD0F81AC812C (total_annual_income_id), PRIMARY KEY(part_two_id, total_annual_income_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patrimony (id INT AUTO_INCREMENT NOT NULL, detained_by VARCHAR(120) DEFAULT NULL, method_of_detention VARCHAR(15) DEFAULT NULL, estimated_value INT DEFAULT NULL, acquisition_value INT DEFAULT NULL, taxation VARCHAR(120) DEFAULT NULL, rent INT DEFAULT NULL, sale TINYINT(1) DEFAULT NULL, capital_of_rest INT DEFAULT NULL, lender VARCHAR(120) DEFAULT NULL, borrowing_date DATE DEFAULT NULL, during INT DEFAULT NULL, percentage_of_insurance VARCHAR(15) DEFAULT NULL, rate VARCHAR(15) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patrimony_label (id INT AUTO_INCREMENT NOT NULL, patrimony_label VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE part_two_total_annual_income ADD CONSTRAINT FK_B9EAAD0FA956E949 FOREIGN KEY (part_two_id) REFERENCES part_two (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_two_total_annual_income ADD CONSTRAINT FK_B9EAAD0F81AC812C FOREIGN KEY (total_annual_income_id) REFERENCES total_annual_income (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE collective_foresight CHANGE cf_label cf_label VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE collective_retirement CHANGE collective_retirement_label collective_retirement_label VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE evolution CHANGE year year INT NOT NULL');
        $this->addSql('ALTER TABLE future_income CHANGE year_label year_label VARCHAR(15) NOT NULL');
        $this->addSql('ALTER TABLE guarantee CHANGE madelin madelin TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE part_two DROP total_annual_income_id, CHANGE evolution_id evolution_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE savings_plan CHANGE savings_label savings_label VARCHAR(25) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE credit_leasing');
        $this->addSql('DROP TABLE movable_heritage');
        $this->addSql('DROP TABLE movable_heritage_label');
        $this->addSql('DROP TABLE part_four');
        $this->addSql('DROP TABLE part_three');
        $this->addSql('DROP TABLE part_two_total_annual_income');
        $this->addSql('DROP TABLE patrimony');
        $this->addSql('DROP TABLE patrimony_label');
        $this->addSql('ALTER TABLE collective_foresight CHANGE cf_label cf_label VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE collective_retirement CHANGE collective_retirement_label collective_retirement_label VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE evolution CHANGE year year INT DEFAULT NULL');
        $this->addSql('ALTER TABLE future_income CHANGE year_label year_label VARCHAR(15) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE guarantee CHANGE madelin madelin TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE part_two ADD total_annual_income_id INT NOT NULL, CHANGE evolution_id evolution_id INT NOT NULL');
        $this->addSql('ALTER TABLE savings_plan CHANGE savings_label savings_label VARCHAR(25) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
