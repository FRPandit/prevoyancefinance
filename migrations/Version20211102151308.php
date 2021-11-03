<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211102151308 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE part_four_movable_heritage (part_four_id INT NOT NULL, movable_heritage_id INT NOT NULL, INDEX IDX_B630E8D565F0F7AF (part_four_id), INDEX IDX_B630E8D57B5CFC7C (movable_heritage_id), PRIMARY KEY(part_four_id, movable_heritage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_three_patrimony (part_three_id INT NOT NULL, patrimony_id INT NOT NULL, INDEX IDX_AFC67A0CE0F3881A (part_three_id), INDEX IDX_AFC67A0C9A60D1F0 (patrimony_id), PRIMARY KEY(part_three_id, patrimony_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part_three_credit_leasing (part_three_id INT NOT NULL, credit_leasing_id INT NOT NULL, INDEX IDX_AD5E0BE4E0F3881A (part_three_id), INDEX IDX_AD5E0BE43A14DD68 (credit_leasing_id), PRIMARY KEY(part_three_id, credit_leasing_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE part_four_movable_heritage ADD CONSTRAINT FK_B630E8D565F0F7AF FOREIGN KEY (part_four_id) REFERENCES part_four (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_four_movable_heritage ADD CONSTRAINT FK_B630E8D57B5CFC7C FOREIGN KEY (movable_heritage_id) REFERENCES movable_heritage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_three_patrimony ADD CONSTRAINT FK_AFC67A0CE0F3881A FOREIGN KEY (part_three_id) REFERENCES part_three (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_three_patrimony ADD CONSTRAINT FK_AFC67A0C9A60D1F0 FOREIGN KEY (patrimony_id) REFERENCES patrimony (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_three_credit_leasing ADD CONSTRAINT FK_AD5E0BE4E0F3881A FOREIGN KEY (part_three_id) REFERENCES part_three (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_three_credit_leasing ADD CONSTRAINT FK_AD5E0BE43A14DD68 FOREIGN KEY (credit_leasing_id) REFERENCES credit_leasing (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movable_heritage ADD movable_heritage_label_id INT NOT NULL');
        $this->addSql('ALTER TABLE movable_heritage ADD CONSTRAINT FK_BD28D1F77F5FC5D8 FOREIGN KEY (movable_heritage_label_id) REFERENCES movable_heritage_label (id)');
        $this->addSql('CREATE INDEX IDX_BD28D1F77F5FC5D8 ON movable_heritage (movable_heritage_label_id)');
        $this->addSql('ALTER TABLE patrimony ADD patrimony_label_id INT NOT NULL');
        $this->addSql('ALTER TABLE patrimony ADD CONSTRAINT FK_986416E23DA10740 FOREIGN KEY (patrimony_label_id) REFERENCES patrimony_label (id)');
        $this->addSql('CREATE INDEX IDX_986416E23DA10740 ON patrimony (patrimony_label_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE part_four_movable_heritage');
        $this->addSql('DROP TABLE part_three_patrimony');
        $this->addSql('DROP TABLE part_three_credit_leasing');
        $this->addSql('ALTER TABLE movable_heritage DROP FOREIGN KEY FK_BD28D1F77F5FC5D8');
        $this->addSql('DROP INDEX IDX_BD28D1F77F5FC5D8 ON movable_heritage');
        $this->addSql('ALTER TABLE movable_heritage DROP movable_heritage_label_id');
        $this->addSql('ALTER TABLE patrimony DROP FOREIGN KEY FK_986416E23DA10740');
        $this->addSql('DROP INDEX IDX_986416E23DA10740 ON patrimony');
        $this->addSql('ALTER TABLE patrimony DROP patrimony_label_id');
    }
}
