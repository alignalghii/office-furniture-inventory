<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210318081818 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE furniture (id INT AUTO_INCREMENT NOT NULL, model_id INT DEFAULT NULL, inventory_number INT NOT NULL, price INT NOT NULL, quantity INT NOT NULL, INDEX IDX_665DDAB37975B7E7 (model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE iuser (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(63) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, privilege VARCHAR(31) NOT NULL, active TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, matter VARCHAR(31) DEFAULT NULL, color VARCHAR(31) DEFAULT NULL, description VARCHAR(255) NOT NULL, mtype VARCHAR(31) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE furniture ADD CONSTRAINT FK_665DDAB37975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE furniture DROP FOREIGN KEY FK_665DDAB37975B7E7');
        $this->addSql('DROP TABLE furniture');
        $this->addSql('DROP TABLE iuser');
        $this->addSql('DROP TABLE model');
    }
}
