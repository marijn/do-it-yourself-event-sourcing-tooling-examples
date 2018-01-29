<?php declare(strict_types = 1);

use Acme\Application\Dependencies;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$request = ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
$dependencies = new Dependencies();
$dispatcher = $dependencies->httpRequestDispatcher();
$emitter = new SapiEmitter();

$emitter->emit($dispatcher->dispatch($request));
