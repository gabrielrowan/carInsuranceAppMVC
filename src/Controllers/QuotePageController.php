<?php

namespace CarInsurance\Controllers;

use Slim\Views\PhpRenderer;
use CarInsurance\Models\NewQuoteModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class QuotePageController
{
    private $renderer;
    private $NewQuoteModel;

    public function __construct(PhpRenderer $renderer, NewQuoteModel $NewQuoteModel)
    {
        $this->renderer = $renderer;
        $this->CarInsuranceModel = $NewQuoteModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $args['doINeedSomethingHere'] = $this->NewQuoteModel->insertNewCustomerDetails();

        return $this->renderer->render($response, "generateQuotePage.phtml", $args);

    }
}