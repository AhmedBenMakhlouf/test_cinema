<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */

class Version20231010151524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE movie_has_type (movie_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_D7417FB8F93B6FC (movie_id), INDEX IDX_D7417FBC54C8C93 (type_id), PRIMARY KEY(movie_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movie_has_type ADD CONSTRAINT FK_D7417FB8F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_has_type ADD CONSTRAINT FK_D7417FBC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_type DROP FOREIGN KEY FK_7FB876248F93B6FC');
        $this->addSql('ALTER TABLE movie_type DROP FOREIGN KEY FK_7FB87624C54C8C93');
        $this->addSql('DROP TABLE movie_has_people');
        $this->addSql('DROP TABLE movie_type');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE movie_has_people (Movie_id INT NOT NULL, People_id INT NOT NULL, role VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, significance VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(Movie_id, People_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE movie_type (movie_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_7FB87624C54C8C93 (type_id), INDEX IDX_7FB876248F93B6FC (movie_id), PRIMARY KEY(movie_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE movie_type ADD CONSTRAINT FK_7FB876248F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_type ADD CONSTRAINT FK_7FB87624C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_has_type DROP FOREIGN KEY FK_D7417FB8F93B6FC');
        $this->addSql('ALTER TABLE movie_has_type DROP FOREIGN KEY FK_D7417FBC54C8C93');
        $this->addSql('DROP TABLE movie_has_type');
    }
}
