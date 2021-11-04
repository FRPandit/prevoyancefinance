<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211103161653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE part_five_financial_products (part_five_id INT NOT NULL, financial_products_id INT NOT NULL, INDEX IDX_EE5501BB39C70144 (part_five_id), INDEX IDX_EE5501BB2EBD7B35 (financial_products_id), PRIMARY KEY(part_five_id, financial_products_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_five_previous_financial_products (part_five_id INT NOT NULL, previous_financial_products_id INT NOT NULL, INDEX IDX_596B34C039C70144 (part_five_id), INDEX IDX_596B34C036A17427 (previous_financial_products_id), PRIMARY KEY(part_five_id, previous_financial_products_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_five_financial_investment (part_five_id INT NOT NULL, financial_investment_id INT NOT NULL, INDEX IDX_F8161DE839C70144 (part_five_id), INDEX IDX_F8161DE8EE87D3F6 (financial_investment_id), PRIMARY KEY(part_five_id, financial_investment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_five_risk (part_five_id INT NOT NULL, risk_id INT NOT NULL, INDEX IDX_F379408739C70144 (part_five_id), INDEX IDX_F3794087235B6D1 (risk_id), PRIMARY KEY(part_five_id, risk_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_five_share_of_investment (part_five_id INT NOT NULL, share_of_investment_id INT NOT NULL, INDEX IDX_28D347BE39C70144 (part_five_id), INDEX IDX_28D347BE328E815D (share_of_investment_id), PRIMARY KEY(part_five_id, share_of_investment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_five_unplanned (part_five_id INT NOT NULL, unplanned_id INT NOT NULL, INDEX IDX_17BF6EB239C70144 (part_five_id), INDEX IDX_17BF6EB2200761 (unplanned_id), PRIMARY KEY(part_five_id, unplanned_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_five_drop_reaction (part_five_id INT NOT NULL, drop_reaction_id INT NOT NULL, INDEX IDX_59820F5539C70144 (part_five_id), INDEX IDX_59820F556BF8A3D3 (drop_reaction_id), PRIMARY KEY(part_five_id, drop_reaction_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_five_preference (part_five_id INT NOT NULL, preference_id INT NOT NULL, INDEX IDX_5CC0CB0639C70144 (part_five_id), INDEX IDX_5CC0CB06D81022C0 (preference_id), PRIMARY KEY(part_five_id, preference_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE part_five_financial_products ADD CONSTRAINT FK_EE5501BB39C70144 FOREIGN KEY (part_five_id) REFERENCES part_five (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five_financial_products ADD CONSTRAINT FK_EE5501BB2EBD7B35 FOREIGN KEY (financial_products_id) REFERENCES financial_products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five_previous_financial_products ADD CONSTRAINT FK_596B34C039C70144 FOREIGN KEY (part_five_id) REFERENCES part_five (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five_previous_financial_products ADD CONSTRAINT FK_596B34C036A17427 FOREIGN KEY (previous_financial_products_id) REFERENCES previous_financial_products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five_financial_investment ADD CONSTRAINT FK_F8161DE839C70144 FOREIGN KEY (part_five_id) REFERENCES part_five (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five_financial_investment ADD CONSTRAINT FK_F8161DE8EE87D3F6 FOREIGN KEY (financial_investment_id) REFERENCES financial_investment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five_risk ADD CONSTRAINT FK_F379408739C70144 FOREIGN KEY (part_five_id) REFERENCES part_five (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five_risk ADD CONSTRAINT FK_F3794087235B6D1 FOREIGN KEY (risk_id) REFERENCES risk (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five_share_of_investment ADD CONSTRAINT FK_28D347BE39C70144 FOREIGN KEY (part_five_id) REFERENCES part_five (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five_share_of_investment ADD CONSTRAINT FK_28D347BE328E815D FOREIGN KEY (share_of_investment_id) REFERENCES share_of_investment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five_unplanned ADD CONSTRAINT FK_17BF6EB239C70144 FOREIGN KEY (part_five_id) REFERENCES part_five (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five_unplanned ADD CONSTRAINT FK_17BF6EB2200761 FOREIGN KEY (unplanned_id) REFERENCES unplanned (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five_drop_reaction ADD CONSTRAINT FK_59820F5539C70144 FOREIGN KEY (part_five_id) REFERENCES part_five (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five_drop_reaction ADD CONSTRAINT FK_59820F556BF8A3D3 FOREIGN KEY (drop_reaction_id) REFERENCES drop_reaction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five_preference ADD CONSTRAINT FK_5CC0CB0639C70144 FOREIGN KEY (part_five_id) REFERENCES part_five (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five_preference ADD CONSTRAINT FK_5CC0CB06D81022C0 FOREIGN KEY (preference_id) REFERENCES preference (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five ADD death_funds_id INT NOT NULL');
        $this->addSql('ALTER TABLE part_five ADD CONSTRAINT FK_461AB246D3D321CA FOREIGN KEY (death_funds_id) REFERENCES death_funds (id)');
        $this->addSql('CREATE INDEX IDX_461AB246D3D321CA ON part_five (death_funds_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE part_five_financial_products');
        $this->addSql('DROP TABLE part_five_previous_financial_products');
        $this->addSql('DROP TABLE part_five_financial_investment');
        $this->addSql('DROP TABLE part_five_risk');
        $this->addSql('DROP TABLE part_five_share_of_investment');
        $this->addSql('DROP TABLE part_five_unplanned');
        $this->addSql('DROP TABLE part_five_drop_reaction');
        $this->addSql('DROP TABLE part_five_preference');
        $this->addSql('ALTER TABLE part_five DROP FOREIGN KEY FK_461AB246D3D321CA');
        $this->addSql('DROP INDEX IDX_461AB246D3D321CA ON part_five');
        $this->addSql('ALTER TABLE part_five DROP death_funds_id');
    }
}
