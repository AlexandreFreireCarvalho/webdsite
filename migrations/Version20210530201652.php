<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210530201652 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cart_details (id INT AUTO_INCREMENT NOT NULL, carts_id INT NOT NULL, product_name VARCHAR(255) NOT NULL, product_price DOUBLE PRECISION NOT NULL, quantity INT NOT NULL, sub_total_ht DOUBLE PRECISION NOT NULL, taxe DOUBLE PRECISION NOT NULL, sub_total_ttc DOUBLE PRECISION NOT NULL, INDEX IDX_89FCC38DBCB5C6F5 (carts_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cart_details ADD CONSTRAINT FK_89FCC38DBCB5C6F5 FOREIGN KEY (carts_id) REFERENCES `Cart` (id)');
        $this->addSql('ALTER TABLE cart ADD user_id INT NOT NULL, ADD reference VARCHAR(255) NOT NULL, ADD full_name VARCHAR(255) NOT NULL, ADD carrier_name VARCHAR(255) NOT NULL, ADD carrier_price DOUBLE PRECISION NOT NULL, ADD delivery_address LONGTEXT NOT NULL, ADD is_paid TINYINT(1) NOT NULL, ADD more_informations LONGTEXT DEFAULT NULL, ADD created_at DATETIME NOT NULL, ADD quantity INT NOT NULL, ADD sub_total_ht DOUBLE PRECISION NOT NULL, ADD taxe DOUBLE PRECISION NOT NULL, ADD sub_total_ttc DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_AB912789A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_AB912789A76ED395 ON cart (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cart_details');
        $this->addSql('ALTER TABLE `Cart` DROP FOREIGN KEY FK_AB912789A76ED395');
        $this->addSql('DROP INDEX IDX_AB912789A76ED395 ON `Cart`');
        $this->addSql('ALTER TABLE `Cart` DROP user_id, DROP reference, DROP full_name, DROP carrier_name, DROP carrier_price, DROP delivery_address, DROP is_paid, DROP more_informations, DROP created_at, DROP quantity, DROP sub_total_ht, DROP taxe, DROP sub_total_ttc');
    }
}
