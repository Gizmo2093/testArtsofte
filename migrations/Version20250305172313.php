<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250305172313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('DROP TABLE IF EXISTS car');
        $this->addSql('DROP TABLE IF EXISTS model');
        $this->addSql('DROP TABLE IF EXISTS brand');

        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, brand_id INT DEFAULT NULL, model_id INT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_773DE69D44F5D008 (brand_id), INDEX IDX_773DE69D7975B7E7 (model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D7975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');

        $this->addSql("INSERT INTO brand (name) VALUES ('Toyota')");
        $this->addSql("INSERT INTO brand (name) VALUES ('Nissan')");
        $this->addSql("INSERT INTO brand (name) VALUES ('Subaru')");


        $this->addSql("INSERT INTO model (name) VALUES ('Rav4')");
        $this->addSql("INSERT INTO model (name) VALUES ('Filder')");
        $this->addSql("INSERT INTO model (name) VALUES ('Terrano')");
        $this->addSql("INSERT INTO model (name) VALUES ('Juke')");
        $this->addSql("INSERT INTO model (name) VALUES ('Forester')");
        $this->addSql("INSERT INTO model (name) VALUES ('Impreza')");

        $this->addSql("INSERT INTO car (brand_id, model_id, photo, price) VALUES (1, 1, 'photo_1', 2000000 )");
        $this->addSql("INSERT INTO car (brand_id, model_id, photo, price) VALUES (1, 2, 'photo_2', 1649000 )");

        $this->addSql("INSERT INTO car (brand_id, model_id, photo, price) VALUES (2, 3, 'photo_2', 719000 )");
        $this->addSql("INSERT INTO car (brand_id, model_id, photo, price) VALUES (2, 4, 'photo_2', 1234000 )");

        $this->addSql("INSERT INTO car (brand_id, model_id, photo, price) VALUES (3, 5, 'photo_2', 1150000 )");
        $this->addSql("INSERT INTO car (brand_id, model_id, photo, price) VALUES (3, 6, 'photo_2', 123000 )");

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D44F5D008');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D7975B7E7');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE model');
    }
}
