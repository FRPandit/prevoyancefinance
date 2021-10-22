<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021122455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE children (id INT AUTO_INCREMENT NOT NULL, child TINYINT(1) NOT NULL, yob DATE NOT NULL, handicapped TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intelligence (id INT AUTO_INCREMENT NOT NULL, woman TINYINT(1) NOT NULL, man TINYINT(1) NOT NULL, name VARCHAR(120) NOT NULL, firstname VARCHAR(120) NOT NULL, phone VARCHAR(15) NOT NULL, email VARCHAR(50) NOT NULL, native_country VARCHAR(60) NOT NULL, department VARCHAR(25) NOT NULL, job VARCHAR(120) NOT NULL, compagny_form VARCHAR(25) NOT NULL, axa_customer TINYINT(1) NOT NULL, social_security_number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maried (id INT AUTO_INCREMENT NOT NULL, community_before TINYINT(1) NOT NULL, community_after TINYINT(1) NOT NULL, separation_of_property TINYINT(1) NOT NULL, part_acquisitions TINYINT(1) NOT NULL, year INT NOT NULL, previous_wedding TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objective (id INT AUTO_INCREMENT NOT NULL, audit TINYINT(1) NOT NULL, retirement_solution TINYINT(1) NOT NULL, succession_solution TINYINT(1) NOT NULL, foresight_solution TINYINT(1) NOT NULL, saving_solution TINYINT(1) NOT NULL, health_solution TINYINT(1) NOT NULL, tax_solution TINYINT(1) NOT NULL, borrower_insurance TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_one (id INT AUTO_INCREMENT NOT NULL, donation TINYINT(1) NOT NULL, testament TINYINT(1) NOT NULL, notary TINYINT(1) NOT NULL, notary_name VARCHAR(120) NOT NULL, donation_between_spouses TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pro_status (id INT AUTO_INCREMENT NOT NULL, pro_label VARCHAR(30) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE share_in_compagny (id INT AUTO_INCREMENT NOT NULL, share_label VARCHAR(15) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE children');
        $this->addSql('DROP TABLE intelligence');
        $this->addSql('DROP TABLE maried');
        $this->addSql('DROP TABLE objective');
        $this->addSql('DROP TABLE part_one');
        $this->addSql('DROP TABLE pro_status');
        $this->addSql('DROP TABLE share_in_compagny');
    }
}
