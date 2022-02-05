<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220204171011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE authors (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, dni VARCHAR(255) NOT NULL, creation_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE books (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, isbn VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE books_authors (book_id INT NOT NULL, author_id INT NOT NULL, INDEX IDX_877EACC216A2B381 (book_id), INDEX IDX_877EACC2F675F31B (author_id), PRIMARY KEY(book_id, author_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE books_authors ADD CONSTRAINT FK_877EACC216A2B381 FOREIGN KEY (book_id) REFERENCES books (id)');
        $this->addSql('ALTER TABLE books_authors ADD CONSTRAINT FK_877EACC2F675F31B FOREIGN KEY (author_id) REFERENCES authors (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books_authors DROP FOREIGN KEY FK_877EACC2F675F31B');
        $this->addSql('ALTER TABLE books_authors DROP FOREIGN KEY FK_877EACC216A2B381');
        $this->addSql('DROP TABLE authors');
        $this->addSql('DROP TABLE books');
        $this->addSql('DROP TABLE books_authors');
    }
}
