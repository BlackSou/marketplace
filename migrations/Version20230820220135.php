<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230820220135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, status BOOLEAN NOT NULL, type VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, add_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN product.add_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE product_to_product_category (product_id INT NOT NULL, product_category_id INT NOT NULL, PRIMARY KEY(product_id, product_category_id))');
        $this->addSql('CREATE INDEX IDX_AE89154E4584665A ON product_to_product_category (product_id)');
        $this->addSql('CREATE INDEX IDX_AE89154EBE6903FD ON product_to_product_category (product_category_id)');
        $this->addSql('CREATE TABLE product_category (id INT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE product_to_product_category ADD CONSTRAINT FK_AE89154E4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product_to_product_category ADD CONSTRAINT FK_AE89154EBE6903FD FOREIGN KEY (product_category_id) REFERENCES product_category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_category_id_seq CASCADE');
        $this->addSql('ALTER TABLE product_to_product_category DROP CONSTRAINT FK_AE89154E4584665A');
        $this->addSql('ALTER TABLE product_to_product_category DROP CONSTRAINT FK_AE89154EBE6903FD');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_to_product_category');
        $this->addSql('DROP TABLE product_category');
    }
}
