<?php

require '../vendor/autoload.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

use App\Repositories\InvoiceRepository;
use App\Controllers\DashboardController;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

// تحميل إعدادات Doctrine
$entityManager = require '../config/doctrine.php';

// إعداد Twig
$loader = new FilesystemLoader('../resources/views');
$twig = new Environment($loader, [
    'cache' => false, // يمكنك تعطيله بإزالة هذا السطر أثناء التطوير
]);

// إعداد مستودع الفواتير
$invoiceRepository = $entityManager->getRepository(App\Entities\Invoice::class);

// إذا كان المستودع مخصصًا:
if (!$invoiceRepository instanceof InvoiceRepository) {
    $invoiceRepository = new InvoiceRepository(
        $entityManager,
        $entityManager->getClassMetadata(App\Entities\Invoice::class)

    );
}

// تمرير المستودع وTwig إلى DashboardController
$dashboardController = new DashboardController($invoiceRepository, $twig);

// عرض لوحة التحكم
echo $dashboardController->index();
