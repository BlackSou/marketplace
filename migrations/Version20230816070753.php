<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230816070753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ALTER add_date TYPE DATE');
        $this->addSql('ALTER TABLE product ALTER add_date DROP NOT NULL');
        $this->addSql('COMMENT ON COLUMN product.add_date IS \'(DC2Type:date_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE product ALTER add_date TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE product ALTER add_date SET NOT NULL');
        $this->addSql('COMMENT ON COLUMN product.add_date IS NULL');
    }
}
