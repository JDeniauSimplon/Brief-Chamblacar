<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230525140942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD passenger_id INT NOT NULL, ADD ride_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849554502E565 FOREIGN KEY (passenger_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955302A8A70 FOREIGN KEY (ride_id) REFERENCES ride (id)');
        $this->addSql('CREATE INDEX IDX_42C849554502E565 ON reservation (passenger_id)');
        $this->addSql('CREATE INDEX IDX_42C84955302A8A70 ON reservation (ride_id)');
        $this->addSql('ALTER TABLE ride ADD driver_id INT NOT NULL');
        $this->addSql('ALTER TABLE ride ADD CONSTRAINT FK_9B3D7CD0C3423909 FOREIGN KEY (driver_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9B3D7CD0C3423909 ON ride (driver_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ride DROP FOREIGN KEY FK_9B3D7CD0C3423909');
        $this->addSql('DROP INDEX IDX_9B3D7CD0C3423909 ON ride');
        $this->addSql('ALTER TABLE ride DROP driver_id');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849554502E565');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955302A8A70');
        $this->addSql('DROP INDEX IDX_42C849554502E565 ON reservation');
        $this->addSql('DROP INDEX IDX_42C84955302A8A70 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP passenger_id, DROP ride_id');
    }
}
