<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190117091507 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone INT DEFAULT NULL, email VARCHAR(80) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE oeuvres DROP FOREIGN KEY FK_413EEE3E1C3AC5D2');
        $this->addSql('DROP INDEX IDX_413EEE3E1C3AC5D2 ON oeuvres');
        $this->addSql('ALTER TABLE oeuvres CHANGE techniques techniques VARCHAR(20) NOT NULL, CHANGE photo photo VARCHAR(180) NOT NULL, CHANGE id_categories_id categories_id INT NOT NULL');
        $this->addSql('ALTER TABLE oeuvres ADD CONSTRAINT FK_413EEE3EA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_413EEE3EA21214B7 ON oeuvres (categories_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE contact');
        $this->addSql('ALTER TABLE oeuvres DROP FOREIGN KEY FK_413EEE3EA21214B7');
        $this->addSql('DROP INDEX IDX_413EEE3EA21214B7 ON oeuvres');
        $this->addSql('ALTER TABLE oeuvres CHANGE techniques techniques LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE photo photo VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE categories_id id_categories_id INT NOT NULL');
        $this->addSql('ALTER TABLE oeuvres ADD CONSTRAINT FK_413EEE3E1C3AC5D2 FOREIGN KEY (id_categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_413EEE3E1C3AC5D2 ON oeuvres (id_categories_id)');
    }
}
