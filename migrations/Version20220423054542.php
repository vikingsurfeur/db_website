<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220423054542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photograph (id INT AUTO_INCREMENT NOT NULL, photographer_id INT NOT NULL, portfolio_id INT NOT NULL, title VARCHAR(255) NOT NULL, photographed_at DATETIME NOT NULL, location VARCHAR(255) NOT NULL, is_last_work_portfolio TINYINT(1) NOT NULL, is_on_sale TINYINT(1) NOT NULL, seller_url VARCHAR(255) DEFAULT NULL, file VARCHAR(255) NOT NULL, INDEX IDX_D551C73353EC1A21 (photographer_id), INDEX IDX_D551C733B96B5643 (portfolio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE portfolio (id INT AUTO_INCREMENT NOT NULL, photographer_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, location VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, social_network_url VARCHAR(255) DEFAULT NULL, INDEX IDX_A9ED106253EC1A21 (photographer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, git_hub VARCHAR(255) NOT NULL, behance VARCHAR(255) NOT NULL, linkedin VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE photograph ADD CONSTRAINT FK_D551C73353EC1A21 FOREIGN KEY (photographer_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE photograph ADD CONSTRAINT FK_D551C733B96B5643 FOREIGN KEY (portfolio_id) REFERENCES portfolio (id)');
        $this->addSql('ALTER TABLE portfolio ADD CONSTRAINT FK_A9ED106253EC1A21 FOREIGN KEY (photographer_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photograph DROP FOREIGN KEY FK_D551C733B96B5643');
        $this->addSql('ALTER TABLE photograph DROP FOREIGN KEY FK_D551C73353EC1A21');
        $this->addSql('ALTER TABLE portfolio DROP FOREIGN KEY FK_A9ED106253EC1A21');
        $this->addSql('DROP TABLE photograph');
        $this->addSql('DROP TABLE portfolio');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
