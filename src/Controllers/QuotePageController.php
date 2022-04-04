<?php

namespace CarInsurance\Controllers;

use CarInsurance\Models\CarTypeModel;
use CarInsurance\Models\CoverTypeModel;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class QuotePageController
{
    private $renderer;
    private $carTypeModel;
    private $coverTypeModel;
    private $quoteModel;

    public function __construct(PhpRenderer $renderer, CarTypeModel $carTypeModel, CoverTypeModel $coverTypeModel, QuoteModel $quoteModel)
    {
        $this->renderer = $renderer;
        $this->coverTypeModel = $coverTypeModel;
        $this->carTypeModel = $carTypeModel;
        $this->quoteModel = $quoteModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $formData = $request->getParsedBody();
        $carTypeMultiplier = $this->carTypeModel->getCarTypeMultiplierByID(intval($formData['carType']))['type_multiplier'];
        $coverTypeMultiplier = $this->coverTypeModel->getCoverMultiplierByID(intval($formData['coverType']))['cover_multiplier'];
        $quoteValue = intval($formData['carValue']) * floatval($carTypeMultiplier) * floatval($coverTypeMultiplier);
        $args['quoteValue'] = $quoteValue;
        $generateNewQuoteDetails = $this->quoteModel->insertNewCustomerDetails($formData['customerName'], intval($formData['carType']), intval($formData['coverType']), strval($quoteValue), intval($formData['carValue']));
        $id = $this->quoteModel->getCustomerID();
        $args['id'] = $id;
        return $this->renderer->render($response, "generateQuotePage.phtml", $args);
    }
}