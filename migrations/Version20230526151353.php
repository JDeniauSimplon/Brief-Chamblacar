<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230526151353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rule_ride (id INT AUTO_INCREMENT NOT NULL, ride_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rule_ride_rule (rule_ride_id INT NOT NULL, rule_id INT NOT NULL, INDEX IDX_D24B8A98C0BEB3C4 (rule_ride_id), INDEX IDX_D24B8A98744E0351 (rule_id), PRIMARY KEY(rule_ride_id, rule_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rule_ride_rule ADD CONSTRAINT FK_D24B8A98C0BEB3C4 FOREIGN KEY (rule_ride_id) REFERENCES rule_ride (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rule_ride_rule ADD CONSTRAINT FK_D24B8A98744E0351 FOREIGN KEY (rule_id) REFERENCES rule (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rule_ride_rule DROP FOREIGN KEY FK_D24B8A98C0BEB3C4');
        $this->addSql('ALTER TABLE rule_ride_rule DROP FOREIGN KEY FK_D24B8A98744E0351');
        $this->addSql('DROP TABLE rule_ride');
        $this->addSql('DROP TABLE rule_ride_rule');
    }
}
