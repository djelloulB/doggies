<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210728121043 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adoptant (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adoptant_damande_adoption (adoptant_id INT NOT NULL, damande_adoption_id INT NOT NULL, INDEX IDX_60F180918D8B49F9 (adoptant_id), INDEX IDX_60F18091C993DDAD (damande_adoption_id), PRIMARY KEY(adoptant_id, damande_adoption_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, annonceur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, date_maj DATE NOT NULL, INDEX IDX_F65593E5C8764012 (annonceur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annonceur (id INT NOT NULL, categorie_id INT DEFAULT NULL, INDEX IDX_E795BC5EBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE breed (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE damande_adoption (id INT AUTO_INCREMENT NOT NULL, annonce_id INT DEFAULT NULL, INDEX IDX_21FB9A088805AB2F (annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dog (id INT AUTO_INCREMENT NOT NULL, annonce_id INT DEFAULT NULL, est_adopte TINYINT(1) NOT NULL, est_tolerant TINYINT(1) NOT NULL, nom VARCHAR(255) NOT NULL, antecedents VARCHAR(255) DEFAULT NULL, if_lof TINYINT(1) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_812C397D8805AB2F (annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dog_breed (dog_id INT NOT NULL, breed_id INT NOT NULL, INDEX IDX_6309C10A634DFEB (dog_id), INDEX IDX_6309C10AA8B4A30F (breed_id), PRIMARY KEY(dog_id, breed_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, dog_id INT DEFAULT NULL, url_image VARCHAR(255) NOT NULL, INDEX IDX_C53D045F634DFEB (dog_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, demande_adoption_id INT DEFAULT NULL, longueur DOUBLE PRECISION NOT NULL, INDEX IDX_B6BD307FC23B0AAB (demande_adoption_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, residence VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, departement VARCHAR(255) DEFAULT NULL, discr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76BF396750 FOREIGN KEY (id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adoptant ADD CONSTRAINT FK_7B42F2ABF396750 FOREIGN KEY (id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adoptant_damande_adoption ADD CONSTRAINT FK_60F180918D8B49F9 FOREIGN KEY (adoptant_id) REFERENCES adoptant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adoptant_damande_adoption ADD CONSTRAINT FK_60F18091C993DDAD FOREIGN KEY (damande_adoption_id) REFERENCES damande_adoption (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5C8764012 FOREIGN KEY (annonceur_id) REFERENCES annonceur (id)');
        $this->addSql('ALTER TABLE annonceur ADD CONSTRAINT FK_E795BC5EBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE annonceur ADD CONSTRAINT FK_E795BC5EBF396750 FOREIGN KEY (id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE damande_adoption ADD CONSTRAINT FK_21FB9A088805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE dog ADD CONSTRAINT FK_812C397D8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
        $this->addSql('ALTER TABLE dog_breed ADD CONSTRAINT FK_6309C10A634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dog_breed ADD CONSTRAINT FK_6309C10AA8B4A30F FOREIGN KEY (breed_id) REFERENCES breed (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F634DFEB FOREIGN KEY (dog_id) REFERENCES dog (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FC23B0AAB FOREIGN KEY (demande_adoption_id) REFERENCES damande_adoption (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adoptant_damande_adoption DROP FOREIGN KEY FK_60F180918D8B49F9');
        $this->addSql('ALTER TABLE damande_adoption DROP FOREIGN KEY FK_21FB9A088805AB2F');
        $this->addSql('ALTER TABLE dog DROP FOREIGN KEY FK_812C397D8805AB2F');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5C8764012');
        $this->addSql('ALTER TABLE dog_breed DROP FOREIGN KEY FK_6309C10AA8B4A30F');
        $this->addSql('ALTER TABLE annonceur DROP FOREIGN KEY FK_E795BC5EBCF5E72D');
        $this->addSql('ALTER TABLE adoptant_damande_adoption DROP FOREIGN KEY FK_60F18091C993DDAD');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FC23B0AAB');
        $this->addSql('ALTER TABLE dog_breed DROP FOREIGN KEY FK_6309C10A634DFEB');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F634DFEB');
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76BF396750');
        $this->addSql('ALTER TABLE adoptant DROP FOREIGN KEY FK_7B42F2ABF396750');
        $this->addSql('ALTER TABLE annonceur DROP FOREIGN KEY FK_E795BC5EBF396750');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE adoptant');
        $this->addSql('DROP TABLE adoptant_damande_adoption');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE annonceur');
        $this->addSql('DROP TABLE breed');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE damande_adoption');
        $this->addSql('DROP TABLE dog');
        $this->addSql('DROP TABLE dog_breed');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE utilisateur');
    }
}
