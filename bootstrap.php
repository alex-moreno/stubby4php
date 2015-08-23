<?php
/**
 * Bootstrap.
 */
// Add the autoloading mechanism of Composer
require_once __DIR__ . '/vendor/autoload.php';

use Knp\Provider\ConsoleServiceProvider;
$app = new \Silex\Application();
$app->register(new ConsoleServiceProvider(), array(
'console.name' => 'ConsoleApp',
'console.version' => '1.0.0',
'console.project_directory' => __DIR__ . '/..'
));
