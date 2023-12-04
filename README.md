# Small Business Extra Tax Regulation Bundle for Kimai

### Income Tax (IRPF) scenario in Spain

The Small Business Extra Tax Regulation Bundle for Kimai is a powerful plugin that simplifies the use of the small business regulation, commonly applied in countries like Germany and Austria. It offers several features to help you comply with this regulation seamlessly.

## Features

- **Global Small Business Regulation Setting**: This bundle adds a setting that allows you to enable or disable the small business regulation globally in your Kimai instance.

- **VAT Calculation Disable**: When the small business regulation is enabled, VAT calculation is automatically disabled for all invoices.

- **VAT Hiding**: VAT details are hidden on all default invoices, making it easier to provide invoices that adhere to the small business regulation.

- **Invoice Note**: The plugin adds a note to each invoice, indicating that the small business regulation is being applied.

## Requirements

This plugin is compatible with the following Kimai releases:

| Bundle Version | Minimum Kimai Version |
|----------------|-----------------------|
| 2.0            | 2.0                   |

## Installation

To get started with the Small Business Extra Tax Regulation Bundle, follow these steps:

1. Clone this repository to your Kimai installation's `plugins` directory:

   ```bash
   cd var/plugins/
   git clone https://github.com/nestorPons/kimai2-SmallBusinessExtraTaxBundle.git SmallBusinessExtraTaxBundle
   ```

2. Rebuild the cache:

   ```bash
   bin/console kimai:reload --env=prod
   ```

3. Enable Small Business Regulation:

   - Go to the system settings.
   - Navigate to the "Invoices" section.
   - Enable the checkbox for the small business regulation.
   - Once enabled, the small business regulation will be applied to all your invoices.

## Generating Migrations

To generate migrations for this bundle, follow these steps:

1. Open your terminal.

2. Run the following command to generate a new migration:

   ```bash
   bin/console doctrine:migrations:diff --em=default --configuration=var/plugins/SmallBusinessExtraTaxBundle/Migrations/doctrine.yaml
   ```

   This command will create a new migration file based on the changes you've made in your bundle.

3. Once you've generated the migration, you can execute all migrations with the following commands:

   ```bash
   bin/console kimai:bundle:tasks:install
   bin/console doctrine:migrations:migrate --em=default --configuration=var/plugins/SmallBusinessExtraTaxBundle/Migrations/doctrine.yaml
   ```

   These commands will apply the migrations, making your changes to the database.

## Use Case for Spanish IRPF Tax

In some cases, such as the Spanish IRPF tax, you may need to reflect additional taxes on your invoices. This bundle is flexible and can be customized to accommodate such requirements. By enabling the small business regulation globally and configuring your settings accordingly, you can adapt the bundle to include taxes like IRPF in your invoices for compliance with specific regulations in your country.