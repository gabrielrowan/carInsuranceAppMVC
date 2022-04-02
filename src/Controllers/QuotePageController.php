<?php

namespace CarInsurance\Controllers;

use Slim\Views\PhpRenderer;
use CarInsurance\Models\CarInsuranceModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class QuotePageController
{
    private $renderer;
    private $CarInsuranceModel;

    public function __construct(PhpRenderer $renderer, CarInsuranceModel $CarInsuranceModel)
    {
        $this->renderer = $renderer;
        $this->CarInsuranceModel = $CarInsuranceModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $args['doINeedSomethingHere'] = $this->CarInsuranceModel->insertNewCustomerDetails();

        return $this->renderer->render($response, "generateQuotePage.phtml", $args);

    }
}