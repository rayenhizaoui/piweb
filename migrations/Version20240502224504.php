<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240502224504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE evenement CHANGE id_recompense id_recompense INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EBB114009 FOREIGN KEY (id_recompense) REFERENCES recompense (id)');
        $this->addSql('DROP INDEX id_recompence ON evenement');
        $this->addSql('CREATE INDEX IDX_B26681EBB114009 ON evenement (id_recompense)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EBB114009');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EBB114009');
        $this->addSql('ALTER TABLE evenement CHANGE id_recompense id_recompense INT NOT NULL');
        $this->addSql('DROP INDEX idx_b26681ebb114009 ON evenement');
        $this->addSql('CREATE INDEX id_recompence ON evenement (id_recompense)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EBB114009 FOREIGN KEY (id_recompense) REFERENCES recompense (id)');
    }
}
