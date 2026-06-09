<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260609132252 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workout_routine DROP CONSTRAINT fk_3730b47e9d86650f');
        $this->addSql('DROP INDEX idx_3730b47e9d86650f');
        $this->addSql('ALTER TABLE workout_routine RENAME COLUMN user_id_id TO user_id');
        $this->addSql('ALTER TABLE workout_routine ADD CONSTRAINT FK_3730B47EA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE');
        $this->addSql('CREATE INDEX IDX_3730B47EA76ED395 ON workout_routine (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workout_routine DROP CONSTRAINT FK_3730B47EA76ED395');
        $this->addSql('DROP INDEX IDX_3730B47EA76ED395');
        $this->addSql('ALTER TABLE workout_routine RENAME COLUMN user_id TO user_id_id');
        $this->addSql('ALTER TABLE workout_routine ADD CONSTRAINT fk_3730b47e9d86650f FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_3730b47e9d86650f ON workout_routine (user_id_id)');
    }
}
