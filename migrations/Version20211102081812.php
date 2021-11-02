<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211102081812 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE part_one_children (part_one_id INT NOT NULL, children_id INT NOT NULL, INDEX IDX_4F65F7F8C20A0E86 (part_one_id), INDEX IDX_4F65F7F83D3D2749 (children_id), PRIMARY KEY(part_one_id, children_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_two_total_annual_income (part_two_id INT NOT NULL, total_annual_income_id INT NOT NULL, INDEX IDX_B9EAAD0FA956E949 (part_two_id), INDEX IDX_B9EAAD0F81AC812C (total_annual_income_id), PRIMARY KEY(part_two_id, total_annual_income_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE total_annual_income_salary (total_annual_income_id INT NOT NULL, salary_id INT NOT NULL, INDEX IDX_D5C26BB381AC812C (total_annual_income_id), INDEX IDX_D5C26BB3B0FDF16E (salary_id), PRIMARY KEY(total_annual_income_id, salary_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE part_one_children ADD CONSTRAINT FK_4F65F7F8C20A0E86 FOREIGN KEY (part_one_id) REFERENCES part_one (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_one_children ADD CONSTRAINT FK_4F65F7F83D3D2749 FOREIGN KEY (children_id) REFERENCES children (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_two_total_annual_income ADD CONSTRAINT FK_B9EAAD0FA956E949 FOREIGN KEY (part_two_id) REFERENCES part_two (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_two_total_annual_income ADD CONSTRAINT FK_B9EAAD0F81AC812C FOREIGN KEY (total_annual_income_id) REFERENCES total_annual_income (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE total_annual_income_salary ADD CONSTRAINT FK_D5C26BB381AC812C FOREIGN KEY (total_annual_income_id) REFERENCES total_annual_income (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE total_annual_income_salary ADD CONSTRAINT FK_D5C26BB3B0FDF16E FOREIGN KEY (salary_id) REFERENCES salary (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE children DROP child, CHANGE yob yob INT DEFAULT NULL, CHANGE handicapped handicapped TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE evolution CHANGE evolution_choice evolution_choice TINYINT(1) NOT NULL, CHANGE year year INT NOT NULL');
        $this->addSql('ALTER TABLE intelligence CHANGE compagny_form compagny_form VARCHAR(25) DEFAULT NULL, CHANGE social_security_number social_security_number BIGINT NOT NULL');
        $this->addSql('ALTER TABLE part_one DROP FOREIGN KEY FK_B848A37A3D3D2749');
        $this->addSql('DROP INDEX IDX_B848A37A3D3D2749 ON part_one');
        $this->addSql('ALTER TABLE part_one ADD child TINYINT(1) NOT NULL, DROP children_id, CHANGE notary_name notary_name VARCHAR(120) DEFAULT NULL');
        $this->addSql('ALTER TABLE part_two DROP FOREIGN KEY FK_D3EEAFED81AC812C');
        $this->addSql('DROP INDEX IDX_D3EEAFED81AC812C ON part_two');
        $this->addSql('ALTER TABLE part_two DROP total_annual_income_id, CHANGE salary_id salary_id INT NOT NULL, CHANGE actual_saving actual_saving INT NOT NULL');
        $this->addSql('ALTER TABLE salary CHANGE amount amount INT NOT NULL');
        $this->addSql('ALTER TABLE total_annual_income DROP FOREIGN KEY FK_3BB45A54B0FDF16E');
        $this->addSql('DROP INDEX IDX_3BB45A54B0FDF16E ON total_annual_income');
        $this->addSql('ALTER TABLE total_annual_income DROP salary_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE part_one_children');
        $this->addSql('DROP TABLE part_two_total_annual_income');
        $this->addSql('DROP TABLE total_annual_income_salary');
        $this->addSql('ALTER TABLE children ADD child TINYINT(1) NOT NULL, CHANGE yob yob DATE NOT NULL, CHANGE handicapped handicapped TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE evolution CHANGE evolution_choice evolution_choice TINYINT(1) DEFAULT NULL, CHANGE year year INT DEFAULT NULL');
        $this->addSql('ALTER TABLE intelligence CHANGE compagny_form compagny_form VARCHAR(25) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE social_security_number social_security_number INT NOT NULL');
        $this->addSql('ALTER TABLE part_one ADD children_id INT NOT NULL, DROP child, CHANGE notary_name notary_name VARCHAR(120) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE part_one ADD CONSTRAINT FK_B848A37A3D3D2749 FOREIGN KEY (children_id) REFERENCES children (id)');
        $this->addSql('CREATE INDEX IDX_B848A37A3D3D2749 ON part_one (children_id)');
        $this->addSql('ALTER TABLE part_two ADD total_annual_income_id INT DEFAULT NULL, CHANGE salary_id salary_id INT DEFAULT NULL, CHANGE actual_saving actual_saving INT DEFAULT NULL');
        $this->addSql('ALTER TABLE part_two ADD CONSTRAINT FK_D3EEAFED81AC812C FOREIGN KEY (total_annual_income_id) REFERENCES total_annual_income (id)');
        $this->addSql('CREATE INDEX IDX_D3EEAFED81AC812C ON part_two (total_annual_income_id)');
        $this->addSql('ALTER TABLE salary CHANGE amount amount INT DEFAULT NULL');
        $this->addSql('ALTER TABLE total_annual_income ADD salary_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE total_annual_income ADD CONSTRAINT FK_3BB45A54B0FDF16E FOREIGN KEY (salary_id) REFERENCES salary (id)');
        $this->addSql('CREATE INDEX IDX_3BB45A54B0FDF16E ON total_annual_income (salary_id)');
    }
}
