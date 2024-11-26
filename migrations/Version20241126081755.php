<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241126081755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'إنشاء جميع الجداول المطلوبة في قاعدة البيانات';
    }

    public function up(Schema $schema): void
    {
        // جدول المستخدمين
        $usersTable = $schema->createTable('users');
        $usersTable->addColumn('id', 'bigint', ['unsigned' => true, 'autoincrement' => true]);
        $usersTable->addColumn('name', 'string', ['length' => 255]);
        $usersTable->addColumn('email', 'string', ['length' => 255]);
        $usersTable->addColumn('email_verified_at', 'datetime', ['notnull' => false]);
        $usersTable->addColumn('password', 'string', ['length' => 255]);
        $usersTable->addColumn('role', 'string', ['default' => 'user']);
        $usersTable->addColumn('remember_token', 'string', ['length' => 100, 'notnull' => false]);
        $usersTable->addColumn('created_at', 'datetime', ['notnull' => false]);
        $usersTable->addColumn('updated_at', 'datetime', ['notnull' => false]);
        $usersTable->setPrimaryKey(['id']);

        // جدول المواقع
        $locationsTable = $schema->createTable('locations');
        $locationsTable->addColumn('id', 'bigint', ['unsigned' => true, 'autoincrement' => true]);
        $locationsTable->addColumn('name', 'string', ['length' => 255]);
        $locationsTable->addColumn('created_at', 'datetime', ['notnull' => false]);
        $locationsTable->addColumn('updated_at', 'datetime', ['notnull' => false]);
        $locationsTable->setPrimaryKey(['id']);

        // جدول المناديب
        $mandoubsTable = $schema->createTable('mandoubs');
        $mandoubsTable->addColumn('id', 'bigint', ['unsigned' => true, 'autoincrement' => true]);
        $mandoubsTable->addColumn('name', 'string', ['length' => 255]);
        $mandoubsTable->addColumn('phone', 'string', ['length' => 20, 'notnull' => false]);
        $mandoubsTable->addColumn('created_at', 'datetime', ['notnull' => false]);
        $mandoubsTable->addColumn('updated_at', 'datetime', ['notnull' => false]);
        $mandoubsTable->setPrimaryKey(['id']);

        // جدول الناقلين
        $carriersTable = $schema->createTable('carriers');
        $carriersTable->addColumn('id', 'bigint', ['unsigned' => true, 'autoincrement' => true]);
        $carriersTable->addColumn('name', 'string', ['length' => 255]);
        $carriersTable->addColumn('created_at', 'datetime', ['notnull' => false]);
        $carriersTable->addColumn('updated_at', 'datetime', ['notnull' => false]);
        $carriersTable->setPrimaryKey(['id']);

        // جدول العملاء
        $customersTable = $schema->createTable('customers');
        $customersTable->addColumn('id', 'bigint', ['unsigned' => true, 'autoincrement' => true]);
        $customersTable->addColumn('name', 'string', ['length' => 255]);
        $customersTable->addColumn('phone', 'string', ['length' => 20, 'notnull' => false]);
        $customersTable->addColumn('email', 'string', ['length' => 255, 'notnull' => false]);
        $customersTable->addColumn('created_at', 'datetime', ['notnull' => false]);
        $customersTable->addColumn('updated_at', 'datetime', ['notnull' => false]);
        $customersTable->setPrimaryKey(['id']);

        // جدول الفواتير
        $invoicesTable = $schema->createTable('invoices');
        $invoicesTable->addColumn('id', 'bigint', ['unsigned' => true, 'autoincrement' => true]);
        $invoicesTable->addColumn('date', 'date');
        $invoicesTable->addColumn('quantity', 'integer');
        $invoicesTable->addColumn('loading_location_id', 'bigint', ['unsigned' => true, 'notnull' => false]);
        $invoicesTable->addColumn('unloading_location_id', 'bigint', ['unsigned' => true, 'notnull' => false]);
        $invoicesTable->addColumn('mandoub_id', 'bigint', ['unsigned' => true, 'notnull' => false]);
        $invoicesTable->addColumn('order_number', 'string', ['length' => 255]);
        $invoicesTable->addColumn('invoice_number', 'string', ['length' => 255]);
        $invoicesTable->addColumn('car_number', 'string', ['length' => 255, 'notnull' => false]);
        $invoicesTable->addColumn('purchase_price', 'decimal', ['precision' => 10, 'scale' => 2]);
        $invoicesTable->addColumn('total_purchase', 'decimal', ['precision' => 10, 'scale' => 2]);
        $invoicesTable->addColumn('carrier_id', 'bigint', ['unsigned' => true, 'notnull' => false]);
        $invoicesTable->addColumn('sale_price', 'decimal', ['precision' => 10, 'scale' => 2]);
        $invoicesTable->addColumn('total_sale', 'decimal', ['precision' => 10, 'scale' => 2]);
        $invoicesTable->addColumn('customer_id', 'bigint', ['unsigned' => true, 'notnull' => false]);
        $invoicesTable->addColumn('profit', 'decimal', ['precision' => 10, 'scale' => 2]);
        $invoicesTable->addColumn('created_at', 'datetime', ['notnull' => false]);
        $invoicesTable->addColumn('updated_at', 'datetime', ['notnull' => false]);
        $invoicesTable->setPrimaryKey(['id']);

        // إنشاء العلاقات
        $invoicesTable->addForeignKeyConstraint('locations', ['loading_location_id'], ['id'], ['onDelete' => 'SET NULL']);
        $invoicesTable->addForeignKeyConstraint('locations', ['unloading_location_id'], ['id'], ['onDelete' => 'SET NULL']);
        $invoicesTable->addForeignKeyConstraint('mandoubs', ['mandoub_id'], ['id'], ['onDelete' => 'SET NULL']);
        $invoicesTable->addForeignKeyConstraint('carriers', ['carrier_id'], ['id'], ['onDelete' => 'SET NULL']);
        $invoicesTable->addForeignKeyConstraint('customers', ['customer_id'], ['id'], ['onDelete' => 'SET NULL']);

        // جدول الفترات الزمنية
        $timePeriodsTable = $schema->createTable('time_periods');
        $timePeriodsTable->addColumn('id', 'bigint', ['unsigned' => true, 'autoincrement' => true]);
        $timePeriodsTable->addColumn('start_date', 'date');
        $timePeriodsTable->addColumn('end_date', 'date', ['notnull' => false]);
        $timePeriodsTable->addColumn('is_open', 'boolean', ['default' => true]);
        $timePeriodsTable->addColumn('created_at', 'datetime', ['notnull' => false]);
        $timePeriodsTable->addColumn('updated_at', 'datetime', ['notnull' => false]);
        $timePeriodsTable->setPrimaryKey(['id']);

        // جدول السجلات
        $logsTable = $schema->createTable('logs');
        $logsTable->addColumn('id', 'bigint', ['unsigned' => true, 'autoincrement' => true]);
        $logsTable->addColumn('user_id', 'bigint', ['unsigned' => true]);
        $logsTable->addColumn('action', 'text');
        $logsTable->addColumn('created_at', 'datetime', ['notnull' => false]);
        $logsTable->setPrimaryKey(['id']);
        $logsTable->addForeignKeyConstraint('users', ['user_id'], ['id'], ['onDelete' => 'CASCADE']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('logs');
        $schema->dropTable('time_periods');
        $schema->dropTable('invoices');
        $schema->dropTable('customers');
        $schema->dropTable('carriers');
        $schema->dropTable('mandoubs');
        $schema->dropTable('locations');
        $schema->dropTable('users');
    }
}
