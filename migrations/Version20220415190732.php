<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220415190732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE board ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE board ADD CONSTRAINT FK_58562B4712469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_58562B4712469DE2 ON board (category_id)');
        $this->addSql('ALTER TABLE category DROP boards_list');
        $this->addSql('ALTER TABLE posts ADD fk_board_id INT NOT NULL');
        $this->addSql('ALTER TABLE posts ADD CONSTRAINT FK_885DBAFAD5C4145B FOREIGN KEY (fk_board_id) REFERENCES board (id)');
        $this->addSql('CREATE INDEX IDX_885DBAFAD5C4145B ON posts (fk_board_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE board DROP FOREIGN KEY FK_58562B4712469DE2');
        $this->addSql('DROP INDEX IDX_58562B4712469DE2 ON board');
        $this->addSql('ALTER TABLE board DROP category_id');
        $this->addSql('ALTER TABLE category ADD boards_list LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE posts DROP FOREIGN KEY FK_885DBAFAD5C4145B');
        $this->addSql('DROP INDEX IDX_885DBAFAD5C4145B ON posts');
        $this->addSql('ALTER TABLE posts DROP fk_board_id');
    }
}
