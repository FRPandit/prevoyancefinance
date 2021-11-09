<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211108155121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE audit (id INT AUTO_INCREMENT NOT NULL, part_one_id INT NOT NULL, part_two_id INT NOT NULL, part_three_id INT NOT NULL, part_four_id INT NOT NULL, part_five_id INT NOT NULL, part_six_id INT NOT NULL, part_seven_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_9218FF79C20A0E86 (part_one_id), INDEX IDX_9218FF79A956E949 (part_two_id), INDEX IDX_9218FF79E0F3881A (part_three_id), INDEX IDX_9218FF7965F0F7AF (part_four_id), INDEX IDX_9218FF7939C70144 (part_five_id), INDEX IDX_9218FF79A64D9F34 (part_six_id), INDEX IDX_9218FF79C77125D4 (part_seven_id), INDEX IDX_9218FF79A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE audit ADD CONSTRAINT FK_9218FF79C20A0E86 FOREIGN KEY (part_one_id) REFERENCES part_one (id)');
        $this->addSql('ALTER TABLE audit ADD CONSTRAINT FK_9218FF79A956E949 FOREIGN KEY (part_two_id) REFERENCES part_two (id)');
        $this->addSql('ALTER TABLE audit ADD CONSTRAINT FK_9218FF79E0F3881A FOREIGN KEY (part_three_id) REFERENCES part_three (id)');
        $this->addSql('ALTER TABLE audit ADD CONSTRAINT FK_9218FF7965F0F7AF FOREIGN KEY (part_four_id) REFERENCES part_four (id)');
        $this->addSql('ALTER TABLE audit ADD CONSTRAINT FK_9218FF7939C70144 FOREIGN KEY (part_five_id) REFERENCES part_five (id)');
        $this->addSql('ALTER TABLE audit ADD CONSTRAINT FK_9218FF79A64D9F34 FOREIGN KEY (part_six_id) REFERENCES part_six (id)');
        $this->addSql('ALTER TABLE audit ADD CONSTRAINT FK_9218FF79C77125D4 FOREIGN KEY (part_seven_id) REFERENCES part_seven (id)');
        $this->addSql('ALTER TABLE audit ADD CONSTRAINT FK_9218FF79A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE audit');
    }
}
