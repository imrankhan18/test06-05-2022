<?php

use Phalcon\Mvc\Application;
use Phalcon\Config\ConfigFactory;
use Phalcon\Di\FactoryDefault;
use Phalcon\Escaper;
use Phalcon\Events\Event;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Url;

// use App\Model;

require_once '../vendor/autoload.php';

// Define some absolute path constants to aid in locating resources
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

// Register an autoloader
$loader = new Loader();

$loader->registerDirs(
    [
        APP_PATH . '/controllers/',
        APP_PATH . '/models/',
        APP_PATH . '/components/',
        APP_PATH . '/resources/',
    ]
);
// $loader->registerNameSpaces(
//     [
//         'App\Model' => '../app/models/',
//     ]
// );

$loader->register();

$container = new FactoryDefault();

$container->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');
        return $view;
    }
);

$container->set(
    'url',
    function () {
        $url = new Url();
        $url->setBaseUri('/');
        return $url;
    }
);

$application = new Application($container);
$container->set(
    'mongo',
    function () {
        return new \MongoDB\Client('mongodb://mongo', array('username' => 'root', 'password' => 'password123'));
    },
    true
);

$container->set(
    'config',
    function () {
        $fileName = '../app/etc/Config.php';
        $factory = new ConfigFactory();
        return $factory->newInstance('php', $fileName);
    }
);
$container->set(
    'escaper',
    function () {
        return new Escaper();
    }
);



try {
    // Handle the request
    $response = $application->handle(
        $_SERVER['REQUEST_URI']
    );

    $response->send();
} catch (\Exception $e) {
    echo 'Exception: ', $e->getMessage();
}
