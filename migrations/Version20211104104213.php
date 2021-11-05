<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211104104213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE individual_form (id INT AUTO_INCREMENT NOT NULL, death_funds_id INT DEFAULT NULL, INDEX IDX_9A4A67FCD3D321CA (death_funds_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individual_form_financial_products (individual_form_id INT NOT NULL, financial_products_id INT NOT NULL, INDEX IDX_9BB92E4E662A1AF0 (individual_form_id), INDEX IDX_9BB92E4E2EBD7B35 (financial_products_id), PRIMARY KEY(individual_form_id, financial_products_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individual_form_previous_financial_products (individual_form_id INT NOT NULL, previous_financial_products_id INT NOT NULL, INDEX IDX_3AB392FE662A1AF0 (individual_form_id), INDEX IDX_3AB392FE36A17427 (previous_financial_products_id), PRIMARY KEY(individual_form_id, previous_financial_products_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individual_form_financial_investment (individual_form_id INT NOT NULL, financial_investment_id INT NOT NULL, INDEX IDX_3A0C40A5662A1AF0 (individual_form_id), INDEX IDX_3A0C40A5EE87D3F6 (financial_investment_id), PRIMARY KEY(individual_form_id, financial_investment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individual_form_risk (individual_form_id INT NOT NULL, risk_id INT NOT NULL, INDEX IDX_F9B5BD3A662A1AF0 (individual_form_id), INDEX IDX_F9B5BD3A235B6D1 (risk_id), PRIMARY KEY(individual_form_id, risk_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individual_form_share_of_investment (individual_form_id INT NOT NULL, share_of_investment_id INT NOT NULL, INDEX IDX_E571AD02662A1AF0 (individual_form_id), INDEX IDX_E571AD02328E815D (share_of_investment_id), PRIMARY KEY(individual_form_id, share_of_investment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individual_form_unplanned (individual_form_id INT NOT NULL, unplanned_id INT NOT NULL, INDEX IDX_E9BEEBC3662A1AF0 (individual_form_id), INDEX IDX_E9BEEBC3200761 (unplanned_id), PRIMARY KEY(individual_form_id, unplanned_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individual_form_drop_reaction (individual_form_id INT NOT NULL, drop_reaction_id INT NOT NULL, INDEX IDX_2EE1FF9D662A1AF0 (individual_form_id), INDEX IDX_2EE1FF9D6BF8A3D3 (drop_reaction_id), PRIMARY KEY(individual_form_id, drop_reaction_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individual_form_preference (individual_form_id INT NOT NULL, preference_id INT NOT NULL, INDEX IDX_7B3C8B29662A1AF0 (individual_form_id), INDEX IDX_7B3C8B29D81022C0 (preference_id), PRIMARY KEY(individual_form_id, preference_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE individual_form ADD CONSTRAINT FK_9A4A67FCD3D321CA FOREIGN KEY (death_funds_id) REFERENCES death_funds (id)');
        $this->addSql('ALTER TABLE individual_form_financial_products ADD CONSTRAINT FK_9BB92E4E662A1AF0 FOREIGN KEY (individual_form_id) REFERENCES individual_form (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_form_financial_products ADD CONSTRAINT FK_9BB92E4E2EBD7B35 FOREIGN KEY (financial_products_id) REFERENCES financial_products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_form_previous_financial_products ADD CONSTRAINT FK_3AB392FE662A1AF0 FOREIGN KEY (individual_form_id) REFERENCES individual_form (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_form_previous_financial_products ADD CONSTRAINT FK_3AB392FE36A17427 FOREIGN KEY (previous_financial_products_id) REFERENCES previous_financial_products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_form_financial_investment ADD CONSTRAINT FK_3A0C40A5662A1AF0 FOREIGN KEY (individual_form_id) REFERENCES individual_form (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_form_financial_investment ADD CONSTRAINT FK_3A0C40A5EE87D3F6 FOREIGN KEY (financial_investment_id) REFERENCES financial_investment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_form_risk ADD CONSTRAINT FK_F9B5BD3A662A1AF0 FOREIGN KEY (individual_form_id) REFERENCES individual_form (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_form_risk ADD CONSTRAINT FK_F9B5BD3A235B6D1 FOREIGN KEY (risk_id) REFERENCES risk (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_form_share_of_investment ADD CONSTRAINT FK_E571AD02662A1AF0 FOREIGN KEY (individual_form_id) REFERENCES individual_form (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_form_share_of_investment ADD CONSTRAINT FK_E571AD02328E815D FOREIGN KEY (share_of_investment_id) REFERENCES share_of_investment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_form_unplanned ADD CONSTRAINT FK_E9BEEBC3662A1AF0 FOREIGN KEY (individual_form_id) REFERENCES individual_form (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_form_unplanned ADD CONSTRAINT FK_E9BEEBC3200761 FOREIGN KEY (unplanned_id) REFERENCES unplanned (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_form_drop_reaction ADD CONSTRAINT FK_2EE1FF9D662A1AF0 FOREIGN KEY (individual_form_id) REFERENCES individual_form (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_form_drop_reaction ADD CONSTRAINT FK_2EE1FF9D6BF8A3D3 FOREIGN KEY (drop_reaction_id) REFERENCES drop_reaction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_form_preference ADD CONSTRAINT FK_7B3C8B29662A1AF0 FOREIGN KEY (individual_form_id) REFERENCES individual_form (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE individual_form_preference ADD CONSTRAINT FK_7B3C8B29D81022C0 FOREIGN KEY (preference_id) REFERENCES preference (id) ON DELETE CASCADE');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE individual_form_financial_products DROP FOREIGN KEY FK_9BB92E4E662A1AF0');
        $this->addSql('ALTER TABLE individual_form_previous_financial_products DROP FOREIGN KEY FK_3AB392FE662A1AF0');
        $this->addSql('ALTER TABLE individual_form_financial_investment DROP FOREIGN KEY FK_3A0C40A5662A1AF0');
        $this->addSql('ALTER TABLE individual_form_risk DROP FOREIGN KEY FK_F9B5BD3A662A1AF0');
        $this->addSql('ALTER TABLE individual_form_share_of_investment DROP FOREIGN KEY FK_E571AD02662A1AF0');
        $this->addSql('ALTER TABLE individual_form_unplanned DROP FOREIGN KEY FK_E9BEEBC3662A1AF0');
        $this->addSql('ALTER TABLE individual_form_drop_reaction DROP FOREIGN KEY FK_2EE1FF9D662A1AF0');
        $this->addSql('ALTER TABLE individual_form_preference DROP FOREIGN KEY FK_7B3C8B29662A1AF0');
        $this->addSql('DROP TABLE individual_form');
        $this->addSql('DROP TABLE individual_form_financial_products');
        $this->addSql('DROP TABLE individual_form_previous_financial_products');
        $this->addSql('DROP TABLE individual_form_financial_investment');
        $this->addSql('DROP TABLE individual_form_risk');
        $this->addSql('DROP TABLE individual_form_share_of_investment');
        $this->addSql('DROP TABLE individual_form_unplanned');
        $this->addSql('DROP TABLE individual_form_drop_reaction');
        $this->addSql('DROP TABLE individual_form_preference');
    }
}
