<?php

use App\WebSocket\Mail\MailerInterface;
use Aura\Session\Session;
use Symfony\Component\Translation\Translator;

$config = [];

$applicationName = 'app_template';

$config = [
    'displayErrorDetails' => true,
    'determineRouteBeforeAppMiddleware' => true,
    'addContentLengthHeader' => false,
];

$config[Session::class] = [
    'name' => $applicationName,
    'cache_expire' => 14400,
];

$config[Translator::class] = [
    'locale' => 'de_CH',
    'path' => __DIR__ . '/../resources/locale',
];

$config['migrations'] = __DIR__ . '/../resources/migrations';

$config['db'] = [
    'database' => 'slim',
    'charset' => 'utf8',
    'encoding' => 'utf8',
    'collation' => 'utf8_unicode_ci',
];

$config['db_test'] = [
    'database' => 'slim_test',
    'charset' => 'utf8',
    'encoding' => 'utf8',
    'collation' => 'utf8_unicode_ci',
];

$config['twig'] = [
    'viewPath' => __DIR__ . '/../templates',
    'cachePath' => __DIR__ . '/../tmp/cache/twig',
    'autoReload' => false,
    'assetCache' => [
        'path' => __DIR__ . '/../public/assets',
        // Cache settings
        'cache_enabled' => true,
        'cache_path' => __DIR__ . '/../tmp/cache',
        'cache_name' => 'assets',
        'cache_lifetime' => 0,
    ],
];

$config['session'] = [
    'name' => 'app_template',
    'autorefresh' => true,
    'lifetime' => '2 hours',
    'path' => '/', //default
    'domain' => null, //default
    'secure' => false, //default
    'httponly' => false, //default
];

$config['logger'] = [
    'main' => 'app',
];

$config['game'] =[
    'ships' => [5, 4, 3, 3, 2, 1],
    // Adjust SHIP_COUNT in ActionHandler if smt is changed.
    'fieldSize' => 13,
];


$env['twig']['assetCache'] ['minify'] = true;
$env['twig']['assetCache'] ['cache_enabled'] = true;
$env['twig']['autoReload'] = true;

return $config;