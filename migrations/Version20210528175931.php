<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210528175931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, full_name VARCHAR(255) NOT NULL, company VARCHAR(255) DEFAULT NULL, address LONGTEXT NOT NULL, complement LONGTEXT DEFAULT NULL, phone INT NOT NULL, city VARCHAR(255) NOT NULL, code_postal INT NOT NULL, country VARCHAR(255) NOT NULL, delivery_address VARCHAR(255) DEFAULT NULL, delivery_lastname VARCHAR(255) DEFAULT NULL, delivery_firstname VARCHAR(255) DEFAULT NULL, INDEX IDX_D4E6F81A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genres (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, reference VARCHAR(255) NOT NULL, full_name VARCHAR(255) NOT NULL, carrier_name VARCHAR(255) NOT NULL, carrier_price DOUBLE PRECISION NOT NULL, delivery_address LONGTEXT NOT NULL, is_paid TINYINT(1) NOT NULL, more_informations LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, quantity INT NOT NULL, sub_total_ht DOUBLE PRECISION NOT NULL, taxe DOUBLE PRECISION NOT NULL, sub_total_ttc DOUBLE PRECISION NOT NULL, INDEX IDX_F5299398A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_details (id INT AUTO_INCREMENT NOT NULL, orders_id INT NOT NULL, product_name VARCHAR(255) NOT NULL, product_price DOUBLE PRECISION NOT NULL, quantity INT NOT NULL, sub_total_ht DOUBLE PRECISION NOT NULL, taxe DOUBLE PRECISION NOT NULL, sub_total_ttc DOUBLE PRECISION NOT NULL, INDEX IDX_845CA2C1CFFE9AD6 (orders_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, provider_id INT NOT NULL, author_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, more_informations LONGTEXT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, is_best_seller TINYINT(1) DEFAULT NULL, is_new_arrival TINYINT(1) DEFAULT NULL, is_featured TINYINT(1) DEFAULT NULL, is_special_offer TINYINT(1) DEFAULT NULL, image VARCHAR(255) NOT NULL, quantity INT NOT NULL, created_at DATETIME NOT NULL, tags LONGTEXT DEFAULT NULL, slug VARCHAR(255) NOT NULL, bd_ref VARCHAR(255) NOT NULL, heroes VARCHAR(255) DEFAULT NULL, public_price DOUBLE PRECISION DEFAULT NULL, editor_price DOUBLE PRECISION DEFAULT NULL, summary LONGTEXT DEFAULT NULL, provider_ref BIGINT DEFAULT NULL, editor_ref BIGINT DEFAULT NULL, INDEX IDX_D34A04ADA53A8AA (provider_id), INDEX IDX_D34A04ADF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_genres (product_id INT NOT NULL, genres_id INT NOT NULL, INDEX IDX_CA97A4B24584665A (product_id), INDEX IDX_CA97A4B26A3B2603 (genres_id), PRIMARY KEY(product_id, genres_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider (id INT AUTO_INCREMENT NOT NULL, editor_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_92C4739C6995AC4C (editor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reviews_product (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, product_id INT NOT NULL, note INT NOT NULL, comment LONGTEXT DEFAULT NULL, INDEX IDX_E0851D6CA76ED395 (user_id), INDEX IDX_E0851D6C4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE order_details ADD CONSTRAINT FK_845CA2C1CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADA53A8AA FOREIGN KEY (provider_id) REFERENCES provider (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADF675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE product_genres ADD CONSTRAINT FK_CA97A4B24584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_genres ADD CONSTRAINT FK_CA97A4B26A3B2603 FOREIGN KEY (genres_id) REFERENCES genres (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE provider ADD CONSTRAINT FK_92C4739C6995AC4C FOREIGN KEY (editor_id) REFERENCES editor (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reviews_product ADD CONSTRAINT FK_E0851D6CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reviews_product ADD CONSTRAINT FK_E0851D6C4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADF675F31B');
        $this->addSql('ALTER TABLE provider DROP FOREIGN KEY FK_92C4739C6995AC4C');
        $this->addSql('ALTER TABLE product_genres DROP FOREIGN KEY FK_CA97A4B26A3B2603');
        $this->addSql('ALTER TABLE order_details DROP FOREIGN KEY FK_845CA2C1CFFE9AD6');
        $this->addSql('ALTER TABLE product_genres DROP FOREIGN KEY FK_CA97A4B24584665A');
        $this->addSql('ALTER TABLE reviews_product DROP FOREIGN KEY FK_E0851D6C4584665A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADA53A8AA');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81A76ED395');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398A76ED395');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('ALTER TABLE reviews_product DROP FOREIGN KEY FK_E0851D6CA76ED395');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE editor');
        $this->addSql('DROP TABLE genres');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_details');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_genres');
        $this->addSql('DROP TABLE provider');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE reviews_product');
        $this->addSql('DROP TABLE user');
    }
}
