<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230525141039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rule ADD author_id INT NOT NULL');
        $this->addSql('ALTER TABLE rule ADD CONSTRAINT FK_46D8ACCCF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_46D8ACCCF675F31B ON rule (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rule DROP FOREIGN KEY FK_46D8ACCCF675F31B');
        $this->addSql('DROP INDEX IDX_46D8ACCCF675F31B ON rule');
        $this->addSql('ALTER TABLE rule DROP author_id');
    }
}
