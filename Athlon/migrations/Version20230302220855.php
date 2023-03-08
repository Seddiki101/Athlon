<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230302220855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (id_c INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, user VARCHAR(255) NOT NULL, statue VARCHAR(255) NOT NULL, remise DOUBLE PRECISION NOT NULL, PRIMARY KEY(id_c)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande_item (id INT AUTO_INCREMENT NOT NULL, produit INT DEFAULT NULL, commande INT DEFAULT NULL, quantity INT NOT NULL, INDEX IDX_747724FD29A5EC27 (produit), INDEX IDX_747724FD6EEAA67D (commande), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, commande INT DEFAULT NULL, adresse VARCHAR(255) NOT NULL, date DATETIME NOT NULL, confirmer TINYINT(1) NOT NULL, email VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_A60C9F1F6EEAA67D (commande), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id_p INT AUTO_INCREMENT NOT NULL, brand VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id_p)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande_item ADD CONSTRAINT FK_747724FD29A5EC27 FOREIGN KEY (produit) REFERENCES produit (id_p)');
        $this->addSql('ALTER TABLE commande_item ADD CONSTRAINT FK_747724FD6EEAA67D FOREIGN KEY (commande) REFERENCES commande (id_c)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F6EEAA67D FOREIGN KEY (commande) REFERENCES commande (id_c)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande_item DROP FOREIGN KEY FK_747724FD29A5EC27');
        $this->addSql('ALTER TABLE commande_item DROP FOREIGN KEY FK_747724FD6EEAA67D');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F6EEAA67D');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commande_item');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
