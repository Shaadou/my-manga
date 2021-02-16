<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210215214848 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(75) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, id_membre_id INT NOT NULL, montant DOUBLE PRECISION NOT NULL, date_enregistrement DATE NOT NULL, etat VARCHAR(75) NOT NULL, INDEX IDX_6EEAA67DEAAC4B6D (id_membre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(75) NOT NULL, nom VARCHAR(75) NOT NULL, email VARCHAR(75) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE details_commande (id INT AUTO_INCREMENT NOT NULL, id_commande_id INT NOT NULL, id_produit_id INT DEFAULT NULL, quantite INT NOT NULL, prix DOUBLE PRECISION NOT NULL, titre VARCHAR(255) NOT NULL, INDEX IDX_4BCD5F69AF8E3A3 (id_commande_id), INDEX IDX_4BCD5F6AABEFE2C (id_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, reference VARCHAR(75) NOT NULL, titre VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, prix INT NOT NULL, description VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_29A5EC27BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance VARCHAR(15) NOT NULL, adresse VARCHAR(255) NOT NULL, cp VARCHAR(5) NOT NULL, avatar VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DEAAC4B6D FOREIGN KEY (id_membre_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE details_commande ADD CONSTRAINT FK_4BCD5F69AF8E3A3 FOREIGN KEY (id_commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE details_commande ADD CONSTRAINT FK_4BCD5F6AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('ALTER TABLE details_commande DROP FOREIGN KEY FK_4BCD5F69AF8E3A3');
        $this->addSql('ALTER TABLE details_commande DROP FOREIGN KEY FK_4BCD5F6AABEFE2C');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DEAAC4B6D');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE details_commande');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE user');
    }
}
