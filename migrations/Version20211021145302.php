<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021145302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evolution ADD pro_status_id INT DEFAULT NULL, ADD salary_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evolution ADD CONSTRAINT FK_420C28937B3C8E45 FOREIGN KEY (pro_status_id) REFERENCES pro_status (id)');
        $this->addSql('ALTER TABLE evolution ADD CONSTRAINT FK_420C2893B0FDF16E FOREIGN KEY (salary_id) REFERENCES salary (id)');
        $this->addSql('CREATE INDEX IDX_420C28937B3C8E45 ON evolution (pro_status_id)');
        $this->addSql('CREATE INDEX IDX_420C2893B0FDF16E ON evolution (salary_id)');
        $this->addSql('ALTER TABLE part_one ADD objective_id INT NOT NULL, ADD intelligence_id INT NOT NULL, ADD share_in_company_id INT DEFAULT NULL, ADD status_id INT NOT NULL, ADD maried_id INT DEFAULT NULL, ADD pro_status_id INT NOT NULL');
        $this->addSql('ALTER TABLE part_one ADD CONSTRAINT FK_B848A37A73484933 FOREIGN KEY (objective_id) REFERENCES objective (id)');
        $this->addSql('ALTER TABLE part_one ADD CONSTRAINT FK_B848A37A7584E372 FOREIGN KEY (intelligence_id) REFERENCES intelligence (id)');
        $this->addSql('ALTER TABLE part_one ADD CONSTRAINT FK_B848A37A8AFB327A FOREIGN KEY (share_in_company_id) REFERENCES share_in_compagny (id)');
        $this->addSql('ALTER TABLE part_one ADD CONSTRAINT FK_B848A37A6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE part_one ADD CONSTRAINT FK_B848A37A7FFEC9A3 FOREIGN KEY (maried_id) REFERENCES maried (id)');
        $this->addSql('ALTER TABLE part_one ADD CONSTRAINT FK_B848A37A7B3C8E45 FOREIGN KEY (pro_status_id) REFERENCES pro_status (id)');
        $this->addSql('CREATE INDEX IDX_B848A37A73484933 ON part_one (objective_id)');
        $this->addSql('CREATE INDEX IDX_B848A37A7584E372 ON part_one (intelligence_id)');
        $this->addSql('CREATE INDEX IDX_B848A37A8AFB327A ON part_one (share_in_company_id)');
        $this->addSql('CREATE INDEX IDX_B848A37A6BF700BD ON part_one (status_id)');
        $this->addSql('CREATE INDEX IDX_B848A37A7FFEC9A3 ON part_one (maried_id)');
        $this->addSql('CREATE INDEX IDX_B848A37A7B3C8E45 ON part_one (pro_status_id)');
        $this->addSql('ALTER TABLE part_two ADD collective_foresight_id INT DEFAULT NULL, ADD savings_plan_id INT DEFAULT NULL, ADD collective_retirement_id INT DEFAULT NULL, ADD guarantee_id INT NOT NULL, ADD evolution_id INT NOT NULL, ADD total_annual_income_id INT NOT NULL, ADD salary_id INT NOT NULL, ADD future_income_id INT DEFAULT NULL, ADD able_to_measure VARCHAR(15) NOT NULL, CHANGE contribution_class_label contribution_class_label VARCHAR(15) NOT NULL');
        $this->addSql('ALTER TABLE part_two ADD CONSTRAINT FK_D3EEAFED81CAE112 FOREIGN KEY (collective_foresight_id) REFERENCES collective_foresight (id)');
        $this->addSql('ALTER TABLE part_two ADD CONSTRAINT FK_D3EEAFED7F8E4905 FOREIGN KEY (savings_plan_id) REFERENCES savings_plan (id)');
        $this->addSql('ALTER TABLE part_two ADD CONSTRAINT FK_D3EEAFED97F4F26A FOREIGN KEY (collective_retirement_id) REFERENCES collective_retirement (id)');
        $this->addSql('ALTER TABLE part_two ADD CONSTRAINT FK_D3EEAFEDCDFF215A FOREIGN KEY (evolution_id) REFERENCES evolution (id)');
        $this->addSql('ALTER TABLE part_two ADD CONSTRAINT FK_D3EEAFEDB0FDF16E FOREIGN KEY (salary_id) REFERENCES salary (id)');
        $this->addSql('CREATE INDEX IDX_D3EEAFED81CAE112 ON part_two (collective_foresight_id)');
        $this->addSql('CREATE INDEX IDX_D3EEAFED7F8E4905 ON part_two (savings_plan_id)');
        $this->addSql('CREATE INDEX IDX_D3EEAFED97F4F26A ON part_two (collective_retirement_id)');
        $this->addSql('CREATE INDEX IDX_D3EEAFEDCDFF215A ON part_two (evolution_id)');
        $this->addSql('CREATE INDEX IDX_D3EEAFEDB0FDF16E ON part_two (salary_id)');
        $this->addSql('ALTER TABLE future_income ADD pro_status_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE future_income ADD CONSTRAINT FK_DD02E94BC4420662 FOREIGN KEY (pro_status_id) REFERENCES pro_status (id)');
        $this->addSql('CREATE INDEX IDX_DD02E94BC4420662 ON future_income (pro_status_id)');
        $this->addSql('ALTER TABLE salary CHANGE amount amount INT NOT NULL');
        $this->addSql('ALTER TABLE future_income ADD salary_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE future_income ADD CONSTRAINT FK_9413BB71C4420662 FOREIGN KEY (salary_id) REFERENCES salary (id)');
        $this->addSql('CREATE INDEX IDX_9413BB71C4420662 ON future_income (salary_id)');
        $this->addSql('ALTER TABLE total_annual_income ADD salary_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE total_annual_income ADD CONSTRAINT FK_3BB45A54B0FDF16E FOREIGN KEY (salary_id) REFERENCES salary (id)');
        $this->addSql('CREATE INDEX IDX_3BB45A54B0FDF16E ON total_annual_income (salary_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evolution DROP FOREIGN KEY FK_420C28937B3C8E45');
        $this->addSql('ALTER TABLE evolution DROP FOREIGN KEY FK_420C2893B0FDF16E');
        $this->addSql('DROP INDEX IDX_420C28937B3C8E45 ON evolution');
        $this->addSql('DROP INDEX IDX_420C2893B0FDF16E ON evolution');
        $this->addSql('ALTER TABLE evolution DROP pro_status_id, DROP salary_id');
        $this->addSql('ALTER TABLE part_one DROP FOREIGN KEY FK_B848A37A73484933');
        $this->addSql('ALTER TABLE part_one DROP FOREIGN KEY FK_B848A37A7584E372');
        $this->addSql('ALTER TABLE part_one DROP FOREIGN KEY FK_B848A37A8AFB327A');
        $this->addSql('ALTER TABLE part_one DROP FOREIGN KEY FK_B848A37A6BF700BD');
        $this->addSql('ALTER TABLE part_one DROP FOREIGN KEY FK_B848A37A7FFEC9A3');
        $this->addSql('ALTER TABLE part_one DROP FOREIGN KEY FK_B848A37A3D3D2749');
        $this->addSql('ALTER TABLE part_one DROP FOREIGN KEY FK_B848A37A7B3C8E45');
        $this->addSql('DROP INDEX IDX_B848A37A73484933 ON part_one');
        $this->addSql('DROP INDEX IDX_B848A37A7584E372 ON part_one');
        $this->addSql('DROP INDEX IDX_B848A37A8AFB327A ON part_one');
        $this->addSql('DROP INDEX IDX_B848A37A6BF700BD ON part_one');
        $this->addSql('DROP INDEX IDX_B848A37A7FFEC9A3 ON part_one');
        $this->addSql('DROP INDEX IDX_B848A37A3D3D2749 ON part_one');
        $this->addSql('DROP INDEX IDX_B848A37A7B3C8E45 ON part_one');
        $this->addSql('ALTER TABLE part_one DROP objective_id, DROP intelligence_id, DROP share_in_company_id, DROP status_id, DROP maried_id, DROP pro_status_id');
        $this->addSql('ALTER TABLE part_two DROP FOREIGN KEY FK_D3EEAFED81CAE112');
        $this->addSql('ALTER TABLE part_two DROP FOREIGN KEY FK_D3EEAFED7F8E4905');
        $this->addSql('ALTER TABLE part_two DROP FOREIGN KEY FK_D3EEAFED97F4F26A');
        $this->addSql('ALTER TABLE part_two DROP FOREIGN KEY FK_D3EEAFEDDB4B0220');
        $this->addSql('ALTER TABLE part_two DROP FOREIGN KEY FK_D3EEAFEDCDFF215A');
        $this->addSql('ALTER TABLE part_two DROP FOREIGN KEY FK_D3EEAFEDB0FDF16E');
        $this->addSql('ALTER TABLE part_two DROP FOREIGN KEY FK_D3EEAFEDC4420662');
        $this->addSql('DROP INDEX IDX_D3EEAFED81CAE112 ON part_two');
        $this->addSql('DROP INDEX IDX_D3EEAFED7F8E4905 ON part_two');
        $this->addSql('DROP INDEX IDX_D3EEAFED97F4F26A ON part_two');
        $this->addSql('DROP INDEX IDX_D3EEAFEDDB4B0220 ON part_two');
        $this->addSql('DROP INDEX IDX_D3EEAFEDCDFF215A ON part_two');
        $this->addSql('DROP INDEX IDX_D3EEAFEDB0FDF16E ON part_two');
        $this->addSql('DROP INDEX IDX_D3EEAFEDC4420662 ON part_two');
        $this->addSql('ALTER TABLE part_two DROP collective_foresight_id, DROP savings_plan_id, DROP collective_retirement_id, DROP guarantee_id, DROP evolution_id, DROP total_annual_income_id, DROP salary_id, DROP future_income_id, DROP able_to_measure, CHANGE contribution_class_label contribution_class_label VARCHAR(15) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE pro_status DROP FOREIGN KEY FK_DD02E94BC4420662');
        $this->addSql('DROP INDEX IDX_DD02E94BC4420662 ON pro_status');
        $this->addSql('ALTER TABLE pro_status DROP future_income_id');
        $this->addSql('ALTER TABLE salary DROP FOREIGN KEY FK_9413BB71C4420662');
        $this->addSql('DROP INDEX IDX_9413BB71C4420662 ON salary');
        $this->addSql('ALTER TABLE salary DROP future_income_id, CHANGE amount amount INT DEFAULT NULL');
        $this->addSql('ALTER TABLE total_annual_income DROP FOREIGN KEY FK_3BB45A54B0FDF16E');
        $this->addSql('DROP INDEX IDX_3BB45A54B0FDF16E ON total_annual_income');
        $this->addSql('ALTER TABLE total_annual_income DROP salary_id');
    }
}
