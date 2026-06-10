<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260610081228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workout_routine ADD monday_checked BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE workout_routine ADD tuesday_checked BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE workout_routine ADD wednesday_checked BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE workout_routine ADD thursday_checked BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE workout_routine ADD friday_checked BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE workout_routine ADD saturday_checked BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE workout_routine ADD sunday_checked BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE workout_routine DROP day_of_week');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workout_routine ADD day_of_week VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE workout_routine DROP monday_checked');
        $this->addSql('ALTER TABLE workout_routine DROP tuesday_checked');
        $this->addSql('ALTER TABLE workout_routine DROP wednesday_checked');
        $this->addSql('ALTER TABLE workout_routine DROP thursday_checked');
        $this->addSql('ALTER TABLE workout_routine DROP friday_checked');
        $this->addSql('ALTER TABLE workout_routine DROP saturday_checked');
        $this->addSql('ALTER TABLE workout_routine DROP sunday_checked');
    }
}
