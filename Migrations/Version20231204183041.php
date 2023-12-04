<?php

declare(strict_types=1);

namespace KimaiPlugin\SmallBusinessExtraTaxBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231204183041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE migration_versions');
        $this->addSql('ALTER TABLE kimai2_activities CHANGE comment comment LONGTEXT DEFAULT NULL, CHANGE visible visible TINYINT(1) DEFAULT 1 NOT NULL, CHANGE time_budget time_budget INT NOT NULL, CHANGE budget budget DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE kimai2_activities_rates CHANGE activity_id activity_id INT NOT NULL');
        $this->addSql('ALTER TABLE kimai2_customers CHANGE comment comment LONGTEXT DEFAULT NULL, CHANGE address address LONGTEXT DEFAULT NULL, CHANGE time_budget time_budget INT NOT NULL, CHANGE budget budget DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE kimai2_customers_rates CHANGE customer_id customer_id INT NOT NULL');
        $this->addSql('ALTER TABLE kimai2_invoice_templates CHANGE address address LONGTEXT DEFAULT NULL, CHANGE vat vat DOUBLE PRECISION NOT NULL, CHANGE payment_terms payment_terms LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE kimai2_projects CHANGE comment comment LONGTEXT DEFAULT NULL, CHANGE budget budget DOUBLE PRECISION NOT NULL, CHANGE time_budget time_budget INT NOT NULL');
        $this->addSql('ALTER TABLE kimai2_projects_rates CHANGE project_id project_id INT NOT NULL');
        $this->addSql('ALTER TABLE kimai2_tags CHANGE visible visible TINYINT(1) DEFAULT 1 NOT NULL');
        $this->addSql('ALTER TABLE kimai2_timesheet CHANGE description description LONGTEXT DEFAULT NULL, CHANGE billable billable TINYINT(1) DEFAULT 1 NOT NULL, CHANGE modified_at modified_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE kimai2_timesheet_tags RENAME INDEX idx_e3284efeabdd46be TO IDX_732EECA9ABDD46BE');
        $this->addSql('ALTER TABLE kimai2_timesheet_tags RENAME INDEX idx_e3284efebad26311 TO IDX_732EECA9BAD26311');
        $this->addSql('ALTER TABLE kimai2_user_preferences CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE kimai2_users CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE kimai2_working_times CHANGE approved_at approved_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE kimai2_sessions CHANGE id id VARBINARY(128) NOT NULL, CHANGE data data LONGBLOB NOT NULL');
        $this->addSql('CREATE INDEX lifetime_idx ON kimai2_sessions (lifetime)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE migration_versions (version VARCHAR(191) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, executed_at DATETIME DEFAULT NULL, execution_time INT DEFAULT NULL, PRIMARY KEY(version)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE kimai2_working_times CHANGE approved_at approved_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE kimai2_tags CHANGE visible visible TINYINT(1) DEFAULT 1');
        $this->addSql('ALTER TABLE kimai2_activities CHANGE comment comment TEXT DEFAULT NULL, CHANGE visible visible TINYINT(1) NOT NULL, CHANGE budget budget DOUBLE PRECISION DEFAULT \'0\' NOT NULL, CHANGE time_budget time_budget INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE kimai2_users CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE kimai2_timesheet CHANGE description description TEXT DEFAULT NULL, CHANGE billable billable TINYINT(1) DEFAULT 1, CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE kimai2_user_preferences CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE kimai2_customers CHANGE comment comment TEXT DEFAULT NULL, CHANGE address address TEXT DEFAULT NULL, CHANGE budget budget DOUBLE PRECISION DEFAULT \'0\' NOT NULL, CHANGE time_budget time_budget INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE kimai2_activities_rates CHANGE activity_id activity_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX lifetime_idx ON kimai2_sessions');
        $this->addSql('ALTER TABLE kimai2_sessions CHANGE id id VARCHAR(128) NOT NULL, CHANGE data data BLOB NOT NULL');
        $this->addSql('ALTER TABLE kimai2_projects_rates CHANGE project_id project_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE kimai2_customers_rates CHANGE customer_id customer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE kimai2_invoice_templates CHANGE address address TEXT DEFAULT NULL, CHANGE vat vat DOUBLE PRECISION DEFAULT \'0\', CHANGE payment_terms payment_terms TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE kimai2_timesheet_tags RENAME INDEX idx_732eeca9abdd46be TO IDX_E3284EFEABDD46BE');
        $this->addSql('ALTER TABLE kimai2_timesheet_tags RENAME INDEX idx_732eeca9bad26311 TO IDX_E3284EFEBAD26311');
        $this->addSql('ALTER TABLE kimai2_projects CHANGE comment comment TEXT DEFAULT NULL, CHANGE budget budget DOUBLE PRECISION DEFAULT \'0\' NOT NULL, CHANGE time_budget time_budget INT DEFAULT 0 NOT NULL');
    }
}
