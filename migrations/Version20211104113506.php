<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211104113506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE family_needs (id INT AUTO_INCREMENT NOT NULL, funeral INT NOT NULL, income_taxes INT NOT NULL, property_taxes INT NOT NULL, housing_taxes INT NOT NULL, torew INT NOT NULL, professional_load INT NOT NULL, corporate_taxes INT NOT NULL, professional_vehicle TINYINT(1) NOT NULL, spouse_additional_capital INT NOT NULL, other_additional_capital INT NOT NULL, spouse_salary INT NOT NULL, sufficient_salary TINYINT(1) NOT NULL, wwdc TINYINT(1) NOT NULL, missing_monthly_income INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE health_needs (id INT AUTO_INCREMENT NOT NULL, mutual_health_satisfaction TINYINT(1) NOT NULL, glasses TINYINT(1) NOT NULL, dental_care TINYINT(1) NOT NULL, fee_overruns TINYINT(1) NOT NULL, not_reimbursed TINYINT(1) NOT NULL, spa_treatment TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_six (id INT AUTO_INCREMENT NOT NULL, single_min_income INT NOT NULL, couple_min_income INT NOT NULL, stop_working INT NOT NULL, retirement_capital TINYINT(1) NOT NULL, amount_retirement_capital INT DEFAULT NULL, medical_history TINYINT(1) NOT NULL, family_medical_history TINYINT(1) NOT NULL, smoking TINYINT(1) NOT NULL, stop_smoking TINYINT(1) DEFAULT NULL, cover TINYINT(1) NOT NULL, comment VARCHAR(250) NOT NULL, haveReco TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recommendation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(120) DEFAULT NULL, firstname VARCHAR(120) DEFAULT NULL, job VARCHAR(120) DEFAULT NULL, age INT DEFAULT NULL, relationship VARCHAR(50) DEFAULT NULL, phone VARCHAR(15) DEFAULT NULL, mail VARCHAR(50) DEFAULT NULL, calling_times VARCHAR(120) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE family_needs');
        $this->addSql('DROP TABLE health_needs');
        $this->addSql('DROP TABLE part_six');
        $this->addSql('DROP TABLE recommendation');
    }
}
