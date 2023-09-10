<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */

class Version20231010151478 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie_has_people ADD id INT AUTO_INCREMENT NOT NULL, DROP Movie_id, DROP People_id, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie_has_people MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON movie_has_people');
        $this->addSql('ALTER TABLE movie_has_people ADD Movie_id INT NOT NULL, ADD People_id INT NOT NULL, DROP id');
        $this->addSql('ALTER TABLE movie_has_people ADD PRIMARY KEY (Movie_id, People_id)');
    }


}