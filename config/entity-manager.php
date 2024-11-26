<?php

use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;

require_once __DIR__ . '/../vendor/autoload.php';

// Define paths to your entities and development mode
$paths = [__DIR__ . '/../app/Entities'];
$isDevMode = true;

// Create the configuration
$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);

// Database connection settings
$dbParams = require __DIR__ . '/doctrine.php';

// Use DriverManager to create the connection
$connection = DriverManager::getConnection($dbParams, $config);

// Create the EntityManager
return new EntityManager($connection, $config);
