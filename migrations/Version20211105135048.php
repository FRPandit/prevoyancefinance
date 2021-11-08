<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211105135048 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE individual_form ADD financial_products_id INT NOT NULL, ADD previous_financial_products_id INT NOT NULL,ADD financial_investment_id INT NOT NULL, ADD risk_id INT NOT NULL, ADD share_of_investment_id INT NOT NULL, ADD unplanned_id INT NOT NULL, ADD drop_reaction_id INT NOT NULL, ADD preference_id INT NOT NULL, ADD death_funds_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE individual_form ADD CONSTRAINT FK_9A4A67FC2EBD7B35 FOREIGN KEY (financial_products_id) REFERENCES financial_products (id)');
        $this->addSql('ALTER TABLE individual_form ADD CONSTRAINT FK_9A4A67FC36A17427 FOREIGN KEY (previous_financial_products_id) REFERENCES previous_financial_products (id)');
        $this->addSql('ALTER TABLE individual_form ADD CONSTRAINT FK_9A4A67FCEE87D3F6 FOREIGN KEY (financial_investment_id) REFERENCES financial_investment (id)');
        $this->addSql('ALTER TABLE individual_form ADD CONSTRAINT FK_9A4A67FC235B6D1 FOREIGN KEY (risk_id) REFERENCES risk (id)');
        $this->addSql('ALTER TABLE individual_form ADD CONSTRAINT FK_9A4A67FC328E815D FOREIGN KEY (share_of_investment_id) REFERENCES share_of_investment (id)');
        $this->addSql('ALTER TABLE individual_form ADD CONSTRAINT FK_9A4A67FC200761 FOREIGN KEY (unplanned_id) REFERENCES unplanned (id)');
        $this->addSql('ALTER TABLE individual_form ADD CONSTRAINT FK_9A4A67FC6BF8A3D3 FOREIGN KEY (drop_reaction_id) REFERENCES drop_reaction (id)');
        $this->addSql('ALTER TABLE individual_form ADD CONSTRAINT FK_9A4A67FCD81022C0 FOREIGN KEY (preference_id) REFERENCES preference (id)');
        $this->addSql('ALTER TABLE individual_form ADD CONSTRAINT FK_9A4A67FCD3D321CA FOREIGN KEY (death_funds_id) REFERENCES death_funds (id)');
        $this->addSql('CREATE INDEX IDX_9A4A67FC2EBD7B35 ON individual_form (financial_products_id)');
        $this->addSql('CREATE INDEX IDX_9A4A67FC36A17427 ON individual_form (previous_financial_products_id)');
        $this->addSql('CREATE INDEX IDX_9A4A67FCEE87D3F6 ON individual_form (financial_investment_id)');
        $this->addSql('CREATE INDEX IDX_9A4A67FC235B6D1 ON individual_form (risk_id)');
        $this->addSql('CREATE INDEX IDX_9A4A67FC328E815D ON individual_form (share_of_investment_id)');
        $this->addSql('CREATE INDEX IDX_9A4A67FC200761 ON individual_form (unplanned_id)');
        $this->addSql('CREATE INDEX IDX_9A4A67FC6BF8A3D3 ON individual_form (drop_reaction_id)');
        $this->addSql('CREATE INDEX IDX_9A4A67FCD81022C0 ON individual_form (preference_id)');
        $this->addSql('CREATE INDEX IDX_9A4A67FCD3D321CA ON individual_form (death_funds_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE individual_form DROP FOREIGN KEY FK_9A4A67FC2EBD7B35');
        $this->addSql('ALTER TABLE individual_form DROP FOREIGN KEY FK_9A4A67FC36A17427');
        $this->addSql('ALTER TABLE individual_form DROP FOREIGN KEY FK_9A4A67FCEE87D3F6');
        $this->addSql('ALTER TABLE individual_form DROP FOREIGN KEY FK_9A4A67FC235B6D1');
        $this->addSql('ALTER TABLE individual_form DROP FOREIGN KEY FK_9A4A67FC328E815D');
        $this->addSql('ALTER TABLE individual_form DROP FOREIGN KEY FK_9A4A67FC200761');
        $this->addSql('ALTER TABLE individual_form DROP FOREIGN KEY FK_9A4A67FC6BF8A3D3');
        $this->addSql('ALTER TABLE individual_form DROP FOREIGN KEY FK_9A4A67FCD81022C0');
        $this->addSql('ALTER TABLE individual_form DROP FOREIGN KEY FK_9A4A67FCD3D321CA');
        $this->addSql('DROP INDEX IDX_9A4A67FC2EBD7B35 ON individual_form');
        $this->addSql('DROP INDEX IDX_9A4A67FC36A17427 ON individual_form');
        $this->addSql('DROP INDEX IDX_9A4A67FCEE87D3F6 ON individual_form');
        $this->addSql('DROP INDEX IDX_9A4A67FC235B6D1 ON individual_form');
        $this->addSql('DROP INDEX IDX_9A4A67FC328E815D ON individual_form');
        $this->addSql('DROP INDEX IDX_9A4A67FC200761 ON individual_form');
        $this->addSql('DROP INDEX IDX_9A4A67FC6BF8A3D3 ON individual_form');
        $this->addSql('DROP INDEX IDX_9A4A67FCD81022C0 ON individual_form');
        $this->addSql('DROP INDEX IDX_9A4A67FCD3D321CA ON individual_form');
        $this->addSql('ALTER TABLE individual_form DROP financial_products_id,DROP previous_financial_products_id, DROP financial_investment_id, DROP risk_id, DROP share_of_investment_id, DROP unplanned_id, DROP drop_reaction_id, DROP preference_id, DROP death_funds_id');
    }
}
