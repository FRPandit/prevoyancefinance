<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211104105147 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE part_five (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE individual_form (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_five_individual_form (part_five_id INT NOT NULL, individual_form_id INT NOT NULL, INDEX IDX_1935577439C70144 (part_five_id), INDEX IDX_19355774662A1AF0 (individual_form_id), PRIMARY KEY(part_five_id, individual_form_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE part_five_individual_form ADD CONSTRAINT FK_1935577439C70144 FOREIGN KEY (part_five_id) REFERENCES part_five (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_five_individual_form ADD CONSTRAINT FK_19355774662A1AF0 FOREIGN KEY (individual_form_id) REFERENCES individual_form (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE part_five_individual_form DROP FOREIGN KEY FK_1935577439C70144');
        $this->addSql('DROP TABLE individual_form');
        $this->addSql('DROP TABLE part_five');
        $this->addSql('DROP TABLE part_five_individual_form');
    }
}
