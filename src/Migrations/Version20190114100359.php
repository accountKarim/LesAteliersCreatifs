<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190114100359 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contact DROP name, CHANGE email email VARCHAR(80) NOT NULL');
        $this->addSql('ALTER TABLE oeuvres DROP FOREIGN KEY FK_413EEE3EBCF5E72D');
        $this->addSql('DROP INDEX IDX_413EEE3EBCF5E72D ON oeuvres');
        $this->addSql('ALTER TABLE oeuvres CHANGE techniques techniques VARCHAR(20) NOT NULL, CHANGE categorie_id id_categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE oeuvres ADD CONSTRAINT FK_413EEE3E9F34925F FOREIGN KEY (id_categorie_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_413EEE3E9F34925F ON oeuvres (id_categorie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contact ADD name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE email email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE oeuvres DROP FOREIGN KEY FK_413EEE3E9F34925F');
        $this->addSql('DROP INDEX IDX_413EEE3E9F34925F ON oeuvres');
        $this->addSql('ALTER TABLE oeuvres CHANGE techniques techniques LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE id_categorie_id categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE oeuvres ADD CONSTRAINT FK_413EEE3EBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_413EEE3EBCF5E72D ON oeuvres (categorie_id)');
    }
}
