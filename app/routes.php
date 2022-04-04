<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', 'HomePageController');

    $app->get('/generateQuotePage.phtml', 'QuotePageController');

    $app->post('/generateQuotePage', function ($request, $response, $args) use ($container) {
        $QuoteModel = $container->get('QuoteModel');
        $formData = $request->getParsedBody();

        $carTypeModel = $container->get('CarTypeModel');
        $carTypeMultiplier = $carTypeModel->getCarTypeMultiplierByID(intval($formData['carType']))['type_multiplier'];

        $coverTypeModel = $container->get('CoverTypeModel');
        $coverTypeMultiplier = $coverTypeModel->getCoverMultiplierByID(intval($formData['coverType']))['cover_multiplier'];

        $quoteValue = intval($formData['carValue']) * floatval($carTypeMultiplier) * floatval($coverTypeMultiplier);

        $args['quoteValue'] = $quoteValue;
        $generateNewQuoteDetails = $QuoteModel->insertNewCustomerDetails($formData['customerName'], intval($formData['carType']), intval($formData['coverType']), strval($quoteValue), intval($formData['carValue']));

        $id = $QuoteModel->getCustomerID();
        $args['id'] = $id;

        $renderer = $container->get('renderer');
        return $renderer->render($response, "generateQuotePage.phtml", $args);
    });

//    $app->get('/acceptQuote', 'QuoteAcceptedController');

    $app->post('/acceptQuote', function ($request, $response, $args) use ($container) {
        //retrieve the id
        $formData = $request->getParsedBody();
        $id = intval($formData['id']);

        //update the db
        $quoteModel = $container->get('QuoteModel');
        $quoteModel->acceptQuote($id);
        $retrievedQuoteData = $quoteModel->retrieveQuoteDetails($id);
        $args['customer_name'] = $retrievedQuoteData['customer_name'];

        //render out a page
        $renderer = $container->get('renderer');
        return $renderer->render($response, "quoteAccepted.phtml", $args);
    });


};
