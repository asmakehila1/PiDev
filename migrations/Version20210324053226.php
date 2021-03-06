<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324053226 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite (id_activite INT AUTO_INCREMENT NOT NULL, centre_id INT NOT NULL, descreption_activite VARCHAR(255) NOT NULL, prix_activite DOUBLE PRECISION NOT NULL, INDEX IDX_B8755515463CD7C3 (centre_id), PRIMARY KEY(id_activite)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE centre (id INT AUTO_INCREMENT NOT NULL, nom_centre VARCHAR(255) NOT NULL, owner VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, description_centre VARCHAR(2000) NOT NULL, prix_centre DOUBLE PRECISION NOT NULL, photo_centre VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, num_tel NUMERIC(10, 0) NOT NULL, password VARCHAR(255) NOT NULL, role NUMERIC(10, 0) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment_article (id INT AUTO_INCREMENT NOT NULL, centre_id INT NOT NULL, client_id INT NOT NULL, contenu LONGTEXT NOT NULL, date DATE NOT NULL, INDEX IDX_F1496C76463CD7C3 (centre_id), INDEX IDX_F1496C7619EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT NOT NULL, prix_event DOUBLE PRECISION NOT NULL, descrption_event VARCHAR(2000) NOT NULL, photo_event LONGBLOB NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materiels (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, quantite DOUBLE PRECISION NOT NULL, duree_location INT NOT NULL, statu TINYINT(1) NOT NULL, photo LONGBLOB NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id_promo INT AUTO_INCREMENT NOT NULL, titre_promo VARCHAR(255) NOT NULL, desc_promo VARCHAR(255) NOT NULL, image_promo LONGBLOB NOT NULL, type_promo VARCHAR(255) NOT NULL, PRIMARY KEY(id_promo)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publicite (id INT AUTO_INCREMENT NOT NULL, titre_pub VARCHAR(255) NOT NULL, description_pub VARCHAR(255) NOT NULL, image_pub LONGBLOB NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, type_reclamation VARCHAR(255) NOT NULL, objet_reclamation VARCHAR(255) NOT NULL, image_reclamation LONGBLOB DEFAULT NULL, description_reclamation VARCHAR(1500) NOT NULL, INDEX IDX_CE60640419EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, centre_id INT DEFAULT NULL, evenement_id INT DEFAULT NULL, materiels_id INT DEFAULT NULL, INDEX IDX_42C8495519EB6921 (client_id), INDEX IDX_42C84955463CD7C3 (centre_id), INDEX IDX_42C84955FD02F13 (evenement_id), INDEX IDX_42C84955A10E8B56 (materiels_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515463CD7C3 FOREIGN KEY (centre_id) REFERENCES centre (id)');
        $this->addSql('ALTER TABLE comment_article ADD CONSTRAINT FK_F1496C76463CD7C3 FOREIGN KEY (centre_id) REFERENCES centre (id)');
        $this->addSql('ALTER TABLE comment_article ADD CONSTRAINT FK_F1496C7619EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE60640419EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955463CD7C3 FOREIGN KEY (centre_id) REFERENCES centre (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A10E8B56 FOREIGN KEY (materiels_id) REFERENCES materiels (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515463CD7C3');
        $this->addSql('ALTER TABLE comment_article DROP FOREIGN KEY FK_F1496C76463CD7C3');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955463CD7C3');
        $this->addSql('ALTER TABLE comment_article DROP FOREIGN KEY FK_F1496C7619EB6921');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE60640419EB6921');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955FD02F13');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A10E8B56');
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE centre');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE comment_article');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE materiels');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE publicite');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reservation');
    }
}
