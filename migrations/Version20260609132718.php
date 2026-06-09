<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260609132718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE workout_routine_exercises (workout_routine_id INT NOT NULL, exercises_id INT NOT NULL, PRIMARY KEY (workout_routine_id, exercises_id))');
        $this->addSql('CREATE INDEX IDX_573C04979E5EDB4D ON workout_routine_exercises (workout_routine_id)');
        $this->addSql('CREATE INDEX IDX_573C04971AFA70CA ON workout_routine_exercises (exercises_id)');
        $this->addSql('ALTER TABLE workout_routine_exercises ADD CONSTRAINT FK_573C04979E5EDB4D FOREIGN KEY (workout_routine_id) REFERENCES workout_routine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workout_routine_exercises ADD CONSTRAINT FK_573C04971AFA70CA FOREIGN KEY (exercises_id) REFERENCES exercises (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workout_routine_exercises DROP CONSTRAINT FK_573C04979E5EDB4D');
        $this->addSql('ALTER TABLE workout_routine_exercises DROP CONSTRAINT FK_573C04971AFA70CA');
        $this->addSql('DROP TABLE workout_routine_exercises');
    }
}
