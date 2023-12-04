<?php

declare(strict_types=1);

namespace KimaiPlugin\SmallBusinessExtraTaxBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20231204175500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add extra_tax field to invoice table and invoice template table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE kimai2_invoices ADD extra_tax DECIMAL(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE kimai2_invoice_templates ADD extra_tax DECIMAL(10, 2) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE kimai2_invoices DROP extra_tax');
        $this->addSql('ALTER TABLE kimai2_invoice_templates DROP extra_tax');
    }
}
