<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();


    $app->get('/', function ($request, $response, $args) use ($container) {
        $carTypeModel = $container->get('CarTypeModel');
        $args['carTypes'] = $carTypeModel->getCarTypes();
        $coverTypeModel = $container->get('CoverTypeModel');
        $args['coverTypes'] = $coverTypeModel->getCoverTypes();
        $renderer = $container->get('renderer');
        return $renderer->render($response, "homePage.phtml", $args);
    });

    $app->post('/generateQuotePage', function ($request, $response, $args) use ($container) {
        $NewQuoteModel = $container->get('NewQuoteModel');
        $formData = $request->getParsedBody();
        $carTypeModel = $container->get('CarTypeModel');
        $carTypeMultiplier = $carTypeModel->getCarTypeMultiplierByID(intval($formData['carType']))['type_multiplier'];
        $coverTypeModel = $container->get('CoverTypeModel');
        $coverTypeMultiplier = $coverTypeModel->getCoverMultiplierByID(intval($formData['coverType']))['cover_multiplier'];
        $quoteValue = intval($formData['carValue']) * floatval($carTypeMultiplier) * floatval($coverTypeMultiplier);
        $args['quoteValue'] = $quoteValue;
        $generateNewQuoteDetails = $NewQuoteModel->insertNewCustomerDetails($formData['customerName'], intval($formData['carType']), intval($formData['coverType']), strval($quoteValue), intval($formData['carValue']));
        $renderer = $container->get('renderer');
        return $renderer->render($response, "generateQuotePage.phtml", $args);
    });
};
