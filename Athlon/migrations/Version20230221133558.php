<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230221133558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours CHANGE capacity capacity VARCHAR(255) NOT NULL, CHANGE duree_cours duree_cours VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE exercices CHANGE duree_exercices duree_exercices VARCHAR(255) NOT NULL, CHANGE nombre_repetitions nombre_repetitions VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours CHANGE duree_cours duree_cours INT NOT NULL, CHANGE capacity capacity INT NOT NULL');
        $this->addSql('ALTER TABLE exercices CHANGE duree_exercices duree_exercices INT NOT NULL, CHANGE nombre_repetitions nombre_repetitions INT NOT NULL');
    }
}
