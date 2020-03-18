<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200318124622 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Avis (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, trajet_id INT DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, date_ajout DATE NOT NULL, INDEX IDX_2FA304CEFB88E14F (utilisateur_id), INDEX IDX_2FA304CED12A823 (trajet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, trajet_id INT DEFAULT NULL, date_reserv DATE NOT NULL, place_reserv INT NOT NULL, etat VARCHAR(255) NOT NULL, INDEX IDX_42C84955FB88E14F (utilisateur_id), INDEX IDX_42C84955D12A823 (trajet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Trajet (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, ville_d VARCHAR(255) NOT NULL, ville_a VARCHAR(255) NOT NULL, date_d DATE NOT NULL, date_a DATE NOT NULL, place_dispo INT NOT NULL, prix DOUBLE PRECISION NOT NULL, distance DOUBLE PRECISION NOT NULL, duree_t INT DEFAULT NULL, heure_d TIME NOT NULL, heure_a TIME NOT NULL, date_ajout DATE NOT NULL, INDEX IDX_2CF7ACBAFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal INT NOT NULL, date_inscription DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Avis ADD CONSTRAINT FK_2FA304CEFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur (id)');
        $this->addSql('ALTER TABLE Avis ADD CONSTRAINT FK_2FA304CED12A823 FOREIGN KEY (trajet_id) REFERENCES Trajet (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955D12A823 FOREIGN KEY (trajet_id) REFERENCES Trajet (id)');
        $this->addSql('ALTER TABLE Trajet ADD CONSTRAINT FK_2CF7ACBAFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Avis DROP FOREIGN KEY FK_2FA304CED12A823');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955D12A823');
        $this->addSql('ALTER TABLE Avis DROP FOREIGN KEY FK_2FA304CEFB88E14F');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955FB88E14F');
        $this->addSql('ALTER TABLE Trajet DROP FOREIGN KEY FK_2CF7ACBAFB88E14F');
        $this->addSql('DROP TABLE Avis');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE Trajet');
        $this->addSql('DROP TABLE Utilisateur');
    }
}
