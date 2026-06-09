<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260609132116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workout_routine_exercises DROP CONSTRAINT fk_573c04979e5edb4d');
        $this->addSql('ALTER TABLE workout_routine_exercises DROP CONSTRAINT fk_573c04971afa70ca');
        $this->addSql('DROP TABLE workout_routine_exercises');
        $this->addSql('ALTER TABLE workout_routine DROP CONSTRAINT fk_3730b47ea76ed395');
        $this->addSql('DROP INDEX idx_3730b47ea76ed395');
        $this->addSql('ALTER TABLE workout_routine RENAME COLUMN user_id TO user_id_id');
        $this->addSql('ALTER TABLE workout_routine ADD CONSTRAINT FK_3730B47E9D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE');
        $this->addSql('CREATE INDEX IDX_3730B47E9D86650F ON workout_routine (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE workout_routine_exercises (workout_routine_id INT NOT NULL, exercises_id INT NOT NULL, PRIMARY KEY (workout_routine_id, exercises_id))');
        $this->addSql('CREATE INDEX idx_573c04979e5edb4d ON workout_routine_exercises (workout_routine_id)');
        $this->addSql('CREATE INDEX idx_573c04971afa70ca ON workout_routine_exercises (exercises_id)');
        $this->addSql('ALTER TABLE workout_routine_exercises ADD CONSTRAINT fk_573c04979e5edb4d FOREIGN KEY (workout_routine_id) REFERENCES workout_routine (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE workout_routine_exercises ADD CONSTRAINT fk_573c04971afa70ca FOREIGN KEY (exercises_id) REFERENCES exercises (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE workout_routine DROP CONSTRAINT FK_3730B47E9D86650F');
        $this->addSql('DROP INDEX IDX_3730B47E9D86650F');
        $this->addSql('ALTER TABLE workout_routine RENAME COLUMN user_id_id TO user_id');
        $this->addSql('ALTER TABLE workout_routine ADD CONSTRAINT fk_3730b47ea76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_3730b47ea76ed395 ON workout_routine (user_id)');
    }
}
