<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250306035833 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {

        $this->addSql('DROP TABLE IF EXISTS credit_program');

        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE credit_program (id INT AUTO_INCREMENT NOT NULL, interest_rate DOUBLE PRECISION NOT NULL, monthly_payment INT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql("INSERT INTO credit_program (interest_rate, monthly_payment, title) VALUES (12.3, 24276, 'Toyota Direct new')");
        $this->addSql("INSERT INTO credit_program (interest_rate, monthly_payment, title) VALUES (10.1, 35123, 'Nissan Эксклюзив')");
        $this->addSql("INSERT INTO credit_program (interest_rate, monthly_payment, title) VALUES (7.3, 50789, 'Авторассрочка')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE credit_program');
    }
}
