<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180314184906 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Products (id INT AUTO_INCREMENT NOT NULL, provider_id INT DEFAULT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_4ACC380CA53A8AA (provider_id), INDEX IDX_4ACC380C12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Orders (id INT AUTO_INCREMENT NOT NULL, provider_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, date DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_E283F8D8A53A8AA (provider_id), INDEX IDX_E283F8D89395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Reviews (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, product_id INT DEFAULT NULL, review VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_A6CDD2939395C3F3 (customer_id), INDEX IDX_A6CDD2934584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE OrderItems (id INT AUTO_INCREMENT NOT NULL, order_id INT DEFAULT NULL, product_id INT DEFAULT NULL, units INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_7F568F958D9F6D38 (order_id), INDEX IDX_7F568F954584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Customers (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Providers (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Ratings (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, product_id INT DEFAULT NULL, rate INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_10B3E559395C3F3 (customer_id), INDEX IDX_10B3E554584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Images (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, image VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_E7B3BB5C4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Products ADD CONSTRAINT FK_4ACC380CA53A8AA FOREIGN KEY (provider_id) REFERENCES Providers (id)');
        $this->addSql('ALTER TABLE Products ADD CONSTRAINT FK_4ACC380C12469DE2 FOREIGN KEY (category_id) REFERENCES Categories (id)');
        $this->addSql('ALTER TABLE Orders ADD CONSTRAINT FK_E283F8D8A53A8AA FOREIGN KEY (provider_id) REFERENCES Providers (id)');
        $this->addSql('ALTER TABLE Orders ADD CONSTRAINT FK_E283F8D89395C3F3 FOREIGN KEY (customer_id) REFERENCES Customers (id)');
        $this->addSql('ALTER TABLE Reviews ADD CONSTRAINT FK_A6CDD2939395C3F3 FOREIGN KEY (customer_id) REFERENCES Customers (id)');
        $this->addSql('ALTER TABLE Reviews ADD CONSTRAINT FK_A6CDD2934584665A FOREIGN KEY (product_id) REFERENCES Products (id)');
        $this->addSql('ALTER TABLE OrderItems ADD CONSTRAINT FK_7F568F958D9F6D38 FOREIGN KEY (order_id) REFERENCES Orders (id)');
        $this->addSql('ALTER TABLE OrderItems ADD CONSTRAINT FK_7F568F954584665A FOREIGN KEY (product_id) REFERENCES Products (id)');
        $this->addSql('ALTER TABLE Ratings ADD CONSTRAINT FK_10B3E559395C3F3 FOREIGN KEY (customer_id) REFERENCES Customers (id)');
        $this->addSql('ALTER TABLE Ratings ADD CONSTRAINT FK_10B3E554584665A FOREIGN KEY (product_id) REFERENCES Products (id)');
        $this->addSql('ALTER TABLE Images ADD CONSTRAINT FK_E7B3BB5C4584665A FOREIGN KEY (product_id) REFERENCES Products (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Products DROP FOREIGN KEY FK_4ACC380C12469DE2');
        $this->addSql('ALTER TABLE Reviews DROP FOREIGN KEY FK_A6CDD2934584665A');
        $this->addSql('ALTER TABLE OrderItems DROP FOREIGN KEY FK_7F568F954584665A');
        $this->addSql('ALTER TABLE Ratings DROP FOREIGN KEY FK_10B3E554584665A');
        $this->addSql('ALTER TABLE Images DROP FOREIGN KEY FK_E7B3BB5C4584665A');
        $this->addSql('ALTER TABLE OrderItems DROP FOREIGN KEY FK_7F568F958D9F6D38');
        $this->addSql('ALTER TABLE Orders DROP FOREIGN KEY FK_E283F8D89395C3F3');
        $this->addSql('ALTER TABLE Reviews DROP FOREIGN KEY FK_A6CDD2939395C3F3');
        $this->addSql('ALTER TABLE Ratings DROP FOREIGN KEY FK_10B3E559395C3F3');
        $this->addSql('ALTER TABLE Products DROP FOREIGN KEY FK_4ACC380CA53A8AA');
        $this->addSql('ALTER TABLE Orders DROP FOREIGN KEY FK_E283F8D8A53A8AA');
        $this->addSql('DROP TABLE Categories');
        $this->addSql('DROP TABLE Products');
        $this->addSql('DROP TABLE Orders');
        $this->addSql('DROP TABLE Reviews');
        $this->addSql('DROP TABLE OrderItems');
        $this->addSql('DROP TABLE Customers');
        $this->addSql('DROP TABLE Providers');
        $this->addSql('DROP TABLE Ratings');
        $this->addSql('DROP TABLE Images');
    }
}
