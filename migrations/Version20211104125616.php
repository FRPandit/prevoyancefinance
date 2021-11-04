<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211104125616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE part_six_recommendation (part_six_id INT NOT NULL, recommendation_id INT NOT NULL, INDEX IDX_A4A72444A64D9F34 (part_six_id), INDEX IDX_A4A72444D173940B (recommendation_id), PRIMARY KEY(part_six_id, recommendation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE part_six_recommendation ADD CONSTRAINT FK_A4A72444A64D9F34 FOREIGN KEY (part_six_id) REFERENCES part_six (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_six_recommendation ADD CONSTRAINT FK_A4A72444D173940B FOREIGN KEY (recommendation_id) REFERENCES recommendation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_six ADD family_needs_id INT NOT NULL, ADD health_needs_id INT NOT NULL, CHANGE havereco have_reco TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE part_six ADD CONSTRAINT FK_813303706F76B9E5 FOREIGN KEY (family_needs_id) REFERENCES family_needs (id)');
        $this->addSql('ALTER TABLE part_six ADD CONSTRAINT FK_8133037045E92F38 FOREIGN KEY (health_needs_id) REFERENCES health_needs (id)');
        $this->addSql('CREATE INDEX IDX_813303706F76B9E5 ON part_six (family_needs_id)');
        $this->addSql('CREATE INDEX IDX_8133037045E92F38 ON part_six (health_needs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE part_six_recommendation');
        $this->addSql('ALTER TABLE part_six DROP FOREIGN KEY FK_813303706F76B9E5');
        $this->addSql('ALTER TABLE part_six DROP FOREIGN KEY FK_8133037045E92F38');
        $this->addSql('DROP INDEX IDX_813303706F76B9E5 ON part_six');
        $this->addSql('DROP INDEX IDX_8133037045E92F38 ON part_six');
        $this->addSql('ALTER TABLE part_six DROP family_needs_id, DROP health_needs_id, CHANGE have_reco haveReco TINYINT(1) NOT NULL');
    }
}
