<?php

use Ebcms\App;
use Ebcms\Config;
use Ebcms\Container;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

App::getInstance()->execute(function (
    App $app,
    Config $config,
    Container $container
) {
    $container->set(LoggerInterface::class, function () use ($app, $config): LoggerInterface {
        $logger = new Logger('my_logger');
        foreach ($config->get('handlers@ebcms/monolog', [
            new StreamHandler($app->getAppPath() . '/runtime/log/' . date('Y-m/d') . '.log', Logger::DEBUG)
        ]) as $handler) {
            $logger->pushHandler($handler);
        }
        return $logger;
    });
});
