<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210923075615 extends AbstractMigration
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
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, access_id_id INT DEFAULT NULL, thematic_id_id INT NOT NULL, category_id_id INT NOT NULL, name VARCHAR(120) NOT NULL, description LONGTEXT NOT NULL, a_img VARCHAR(255) DEFAULT NULL, INDEX IDX_23A0E669D86650F (user_id_id), INDEX IDX_23A0E6696D1E204 (access_id_id), INDEX IDX_23A0E66FF174F9A (thematic_id_id), INDEX IDX_23A0E669777D11E (category_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, cat_label VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, u_comment_id_id INT NOT NULL, article_id_id INT NOT NULL, comment LONGTEXT DEFAULT NULL, INDEX IDX_9474526C4A3D588F (u_comment_id_id), INDEX IDX_9474526C8F3EC46 (article_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, g_label VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, s_label VARCHAR(12) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thematic (id INT AUTO_INCREMENT NOT NULL, th_label VARCHAR(25) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, gender_id_id INT DEFAULT NULL, address_id_id INT DEFAULT NULL, status_id_id INT DEFAULT NULL, img VARCHAR(255) DEFAULT NULL, name VARCHAR(120) DEFAULT NULL, firstname VARCHAR(120) DEFAULT NULL, pseudo VARCHAR(20) NOT NULL, pwd VARCHAR(255) NOT NULL, birthday DATE DEFAULT NULL, email VARCHAR(50) NOT NULL, phone VARCHAR(15) NOT NULL, mobile VARCHAR(15) NOT NULL, mutual_health TINYINT(1) DEFAULT NULL, retirement TINYINT(1) DEFAULT NULL, foresight TINYINT(1) DEFAULT NULL, tax TINYINT(1) DEFAULT NULL, saving TINYINT(1) DEFAULT NULL, succession TINYINT(1) DEFAULT NULL, admin TINYINT(1) NOT NULL, INDEX IDX_8D93D6496F7F214C (gender_id_id), INDEX IDX_8D93D64948E1E977 (address_id_id), INDEX IDX_8D93D649881ECFA7 (status_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E669D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6696D1E204 FOREIGN KEY (access_id_id) REFERENCES access (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66FF174F9A FOREIGN KEY (thematic_id_id) REFERENCES thematic (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E669777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C4A3D588F FOREIGN KEY (u_comment_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C8F3EC46 FOREIGN KEY (article_id_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6496F7F214C FOREIGN KEY (gender_id_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64948E1E977 FOREIGN KEY (address_id_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649881ECFA7 FOREIGN KEY (status_id_id) REFERENCES status (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6696D1E204');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64948E1E977');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C8F3EC46');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E669777D11E');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6496F7F214C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649881ECFA7');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66FF174F9A');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E669D86650F');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C4A3D588F');
        $this->addSql('DROP TABLE access');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE thematic');
        $this->addSql('DROP TABLE user');
    }
}
