<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210804133731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adoptant_damande_adoption DROP FOREIGN KEY FK_60F18091C993DDAD');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FC23B0AAB');
        $this->addSql('CREATE TABLE adoptant_demande_adoption (adoptant_id INT NOT NULL, demande_adoption_id INT NOT NULL, INDEX IDX_EA8DE5F28D8B49F9 (adoptant_id), INDEX IDX_EA8DE5F2C23B0AAB (demande_adoption_id), PRIMARY KEY(adoptant_id, demande_adoption_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande_adoption (id INT AUTO_INCREMENT NOT NULL, annonce_id INT DEFAULT NULL, INDEX IDX_AB87FF6B8805AB2F (annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adoptant_demande_adoption ADD CONSTRAINT FK_EA8DE5F28D8B49F9 FOREIGN KEY (adoptant_id) REFERENCES adoptant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adoptant_demande_adoption ADD CONSTRAINT FK_EA8DE5F2C23B0AAB FOREIGN KEY (demande_adoption_id) REFERENCES demande_adoption (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande_adoption ADD CONSTRAINT FK_AB87FF6B8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
        $this->addSql('DROP TABLE adoptant_damande_adoption');
        $this->addSql('DROP TABLE damande_adoption');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FC23B0AAB');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FC23B0AAB FOREIGN KEY (demande_adoption_id) REFERENCES demande_adoption (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adoptant_demande_adoption DROP FOREIGN KEY FK_EA8DE5F2C23B0AAB');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FC23B0AAB');
        $this->addSql('CREATE TABLE adoptant_damande_adoption (adoptant_id INT NOT NULL, damande_adoption_id INT NOT NULL, INDEX IDX_60F180918D8B49F9 (adoptant_id), INDEX IDX_60F18091C993DDAD (damande_adoption_id), PRIMARY KEY(adoptant_id, damande_adoption_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE damande_adoption (id INT AUTO_INCREMENT NOT NULL, annonce_id INT DEFAULT NULL, INDEX IDX_21FB9A088805AB2F (annonce_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE adoptant_damande_adoption ADD CONSTRAINT FK_60F180918D8B49F9 FOREIGN KEY (adoptant_id) REFERENCES adoptant (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adoptant_damande_adoption ADD CONSTRAINT FK_60F18091C993DDAD FOREIGN KEY (damande_adoption_id) REFERENCES damande_adoption (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE damande_adoption ADD CONSTRAINT FK_21FB9A088805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE adoptant_demande_adoption');
        $this->addSql('DROP TABLE demande_adoption');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FC23B0AAB');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FC23B0AAB FOREIGN KEY (demande_adoption_id) REFERENCES damande_adoption (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
