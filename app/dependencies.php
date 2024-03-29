<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {
    $container = [];

    $container[LoggerInterface::class] = function (ContainerInterface $c) {
        $settings = $c->get('settings');

        $loggerSettings = $settings['logger'];
        $logger = new Logger($loggerSettings['name']);

        $processor = new UidProcessor();
        $logger->pushProcessor($processor);

        $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
        $logger->pushHandler($handler);

        return $logger;
    };

    $container['renderer'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['renderer'];
        $renderer = new PhpRenderer($settings['template_path']);
        return $renderer;
    };

    $container['dbConn'] = function () {
        $db = new PDO('mysql:host=127.0.0.1; dbname=carinsurance', 'root', 'password');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    };

    $container['CarTypeModel'] = DI\factory('\CarInsurance\Factories\CarTypeModelFactory');
    $container['CoverTypeModel'] = DI\factory('\CarInsurance\Factories\CoverTypeModelFactory');
    $container['QuoteModel'] = DI\factory('\CarInsurance\Factories\QuoteModelFactory');
    $container['AcceptQuoteModel'] = DI\factory('\CarInsurance\Factories\AcceptQuoteModelFactory');
    $container['QuotePageController'] = DI\factory('\CarInsurance\Factories\QuotePageControllerFactory');
    $container['HomePageController'] = DI\factory('\CarInsurance\Factories\HomePageControllerFactory');
    $container['QuoteAcceptedController'] = DI\factory('\CarInsurance\Factories\QuoteAcceptedControllerFactory');

    $containerBuilder->addDefinitions($container);
};
