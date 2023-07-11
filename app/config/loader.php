<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Themys\Models' => APP_PATH . '/common/models/',
    'Themys'        => APP_PATH . '/common/library/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Themys\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'Themys\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
