<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210924145731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE access (id INT AUTO_INCREMENT NOT NULL, a_label VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, way VARCHAR(250) DEFAULT NULL, pc VARCHAR(10) DEFAULT NULL, city VARCHAR(30) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, user_admin_id INT NOT NULL, state_id INT NOT NULL, access_id INT NOT NULL, thematic_id INT NOT NULL, category_id INT NOT NULL, art_name VARCHAR(120) NOT NULL, description LONGTEXT NOT NULL, art_img VARCHAR(255) DEFAULT NULL, creation_date DATE NOT NULL, exp_date DATE DEFAULT NULL, INDEX IDX_23A0E6684A66610 (user_admin_id), INDEX IDX_23A0E665D83CC1 (state_id), INDEX IDX_23A0E664FEA67CF (access_id), INDEX IDX_23A0E662395FCED (thematic_id), INDEX IDX_23A0E6612469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, cat_label VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, article_id INT NOT NULL, comment LONGTEXT NOT NULL, INDEX IDX_9474526CA76ED395 (user_id), INDEX IDX_9474526C7294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, glabel VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE state (id INT AUTO_INCREMENT NOT NULL, state_label VARCHAR(8) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, s_label VARCHAR(12) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thematic (id INT AUTO_INCREMENT NOT NULL, th_label VARCHAR(25) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, gender_id INT DEFAULT NULL, address_id INT DEFAULT NULL, status_id INT DEFAULT NULL, img VARCHAR(255) DEFAULT NULL, name VARCHAR(120) DEFAULT NULL, firstname VARCHAR(120) DEFAULT NULL, pseudo VARCHAR(20) NOT NULL, pwd VARCHAR(255) NOT NULL, birthday DATE DEFAULT NULL, email VARCHAR(50) NOT NULL, phone VARCHAR(15) DEFAULT NULL, mobile VARCHAR(15) DEFAULT NULL, mutual_health TINYINT(1) DEFAULT NULL, retirement TINYINT(1) DEFAULT NULL, foresight TINYINT(1) DEFAULT NULL, tax TINYINT(1) DEFAULT NULL, saving TINYINT(1) DEFAULT NULL, succession TINYINT(1) DEFAULT NULL, admin TINYINT(1) DEFAULT NULL, INDEX IDX_8D93D649708A0E0 (gender_id), INDEX IDX_8D93D649F5B7AF75 (address_id), INDEX IDX_8D93D6496BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6684A66610 FOREIGN KEY (user_admin_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E665D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E664FEA67CF FOREIGN KEY (access_id) REFERENCES access (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E662395FCED FOREIGN KEY (thematic_id) REFERENCES thematic (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6612469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6496BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E664FEA67CF');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F5B7AF75');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C7294869C');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6612469DE2');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649708A0E0');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E665D83CC1');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6496BF700BD');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E662395FCED');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6684A66610');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('DROP TABLE access');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE state');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE thematic');
        $this->addSql('DROP TABLE user');
    }
}
