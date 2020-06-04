<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200604085857 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE collection_option (collection_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_A8A3F846514956FD (collection_id), INDEX IDX_A8A3F846A7C41D6F (option_id), PRIMARY KEY(collection_id, option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE collection_option ADD CONSTRAINT FK_A8A3F846514956FD FOREIGN KEY (collection_id) REFERENCES collection (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE collection_option ADD CONSTRAINT FK_A8A3F846A7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE collection_option DROP FOREIGN KEY FK_A8A3F846A7C41D6F');
        $this->addSql('DROP TABLE collection_option');
        $this->addSql('DROP TABLE `option`');
    }
}
