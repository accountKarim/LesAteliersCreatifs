<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190109091444 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oeuvres ADD categorie_id INT DEFAULT NULL, DROP id_categories');
        $this->addSql('ALTER TABLE oeuvres ADD CONSTRAINT FK_413EEE3EBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_413EEE3EBCF5E72D ON oeuvres (categorie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oeuvres DROP FOREIGN KEY FK_413EEE3EBCF5E72D');
        $this->addSql('DROP INDEX IDX_413EEE3EBCF5E72D ON oeuvres');
        $this->addSql('ALTER TABLE oeuvres ADD id_categories INT NOT NULL, DROP categorie_id');
    }
}
