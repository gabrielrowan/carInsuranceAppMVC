<?php

namespace CarInsurance\Controllers;

use Slim\Views\PhpRenderer;
use CarInsurance\Models\QuoteModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class QuoteAcceptedController
{
    private $renderer;
    private $QuoteModel;

    public function __construct(PhpRenderer $renderer, QuoteModel $QuoteModel)
    {
        $this->renderer = $renderer;
        $this->QuoteModel = $QuoteModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $formData = $request->getParsedBody();
        $id = intval($formData['id']);
        $this->QuoteModel->acceptQuote($id);
        return $this->renderer->render($response, "quoteAccepted.phtml", $args);
    }
}