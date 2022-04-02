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

//    $CarInsuranceModel = $container->get('CarInsuranceModel');

    $app->post('/generateQuotePage', function ($request, $response, $args) use ($container) {
        $CarInsuranceModel = $container->get('CarInsuranceModel');
        $formData = $request->getParsedBody();
        $args['formData'] = 'hello I am working';
        //var_dump($formData);
        $carTypeModel = $container->get('CarTypeModel');
        $carTypeMultiplier = $carTypeModel->getCarTypeMultiplierByID(intval($formData['carType']))['type_multiplier'];
        $coverTypeModel = $container->get('CoverTypeModel');
        $coverTypeMultiplier = $coverTypeModel->getCoverMultiplierByID(intval($formData['coverType']))['cover_multiplier'];
        $quoteValue = intval($formData['carValue']) * floatval($carTypeMultiplier) * floatval($coverTypeMultiplier);
        $args['quoteValue'] = $quoteValue;
        $generateNewQuoteDetails = $CarInsuranceModel->insertNewCustomerDetails($formData['customerName'], intval($formData['carType']), intval($formData['coverType']), strval($quoteValue), intval($formData['carValue']));
        $renderer = $container->get('renderer');
        return $renderer->render($response, "generateQuotePage.phtml", $args);
    });


    $app->post('/quoteAccepted', function ($request, $response, $args) use ($container) {
        $renderer = $container->get('renderer');
        return $renderer->render($response, "quoteAccepted.phtml", $args);
    });

    $app->post('/quoteRejected', function ($request, $response, $args) use ($container) {
        $renderer = $container->get('renderer');
        return $renderer->render($response, "quoteRejected.phtml", $args);
    });


};
