<?php

use Doctrine\Migrations\Configuration\Migration\Configuration;

return [
    'migrations_paths' => [
        'App\Migrations' => __DIR__ . '/../migrations',
    ],
    'all_or_nothing' => true,
    'check_database_platform' => true,
];
