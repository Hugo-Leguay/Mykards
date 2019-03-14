<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190221113218 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cards ADD current_cards_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cards ADD CONSTRAINT FK_4C258FD412D2B5D FOREIGN KEY (current_cards_id) REFERENCES current_cards (id)');
        $this->addSql('CREATE INDEX IDX_4C258FD412D2B5D ON cards (current_cards_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cards DROP FOREIGN KEY FK_4C258FD412D2B5D');
        $this->addSql('DROP INDEX IDX_4C258FD412D2B5D ON cards');
        $this->addSql('ALTER TABLE cards DROP current_cards_id');
    }
}
