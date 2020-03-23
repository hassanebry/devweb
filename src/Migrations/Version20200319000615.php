<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200319000615 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trajet ADD slug VARCHAR(128) NOT NULL, CHANGE utilisateur_id utilisateur_id INT DEFAULT NULL, CHANGE duree_t duree_t INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2CF7ACBA989D9B62 ON trajet (slug)');
        $this->addSql('ALTER TABLE avis CHANGE utilisateur_id utilisateur_id INT DEFAULT NULL, CHANGE trajet_id trajet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation CHANGE utilisateur_id utilisateur_id INT DEFAULT NULL, CHANGE trajet_id trajet_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Avis CHANGE utilisateur_id utilisateur_id INT DEFAULT NULL, CHANGE trajet_id trajet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation CHANGE utilisateur_id utilisateur_id INT DEFAULT NULL, CHANGE trajet_id trajet_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_2CF7ACBA989D9B62 ON Trajet');
        $this->addSql('ALTER TABLE Trajet DROP slug, CHANGE utilisateur_id utilisateur_id INT DEFAULT NULL, CHANGE duree_t duree_t INT DEFAULT NULL');
    }
}
