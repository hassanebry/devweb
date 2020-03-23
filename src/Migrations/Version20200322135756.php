<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200322135756 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trajet CHANGE utilisateur_id utilisateur_id INT DEFAULT NULL, CHANGE duree_t duree_t INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avis CHANGE utilisateur_id utilisateur_id INT DEFAULT NULL, CHANGE trajet_id trajet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation CHANGE utilisateur_id utilisateur_id INT DEFAULT NULL, CHANGE trajet_id trajet_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Avis CHANGE utilisateur_id utilisateur_id INT DEFAULT NULL, CHANGE trajet_id trajet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation CHANGE utilisateur_id utilisateur_id INT DEFAULT NULL, CHANGE trajet_id trajet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Trajet CHANGE utilisateur_id utilisateur_id INT DEFAULT NULL, CHANGE duree_t duree_t INT DEFAULT NULL');
    }
}
