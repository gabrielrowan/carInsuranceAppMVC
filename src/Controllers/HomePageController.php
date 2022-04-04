<?php

namespace CarInsurance\Controllers;

use CarInsurance\Models\CarTypeModel;
use CarInsurance\Models\CoverTypeModel;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomePageController
{
    private $renderer;
    private $carTypeModel;
    private $coverTypeModel;

    public function __construct(PhpRenderer $renderer, CarTypeModel $carTypeModel, CoverTypeModel $coverTypeModel)
    {
        $this->renderer = $renderer;
        $this->coverTypeModel = $coverTypeModel;
        $this->carTypeModel = $carTypeModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $args['carTypes'] = $this->carTypeModel->getCarTypes();
        $args['coverTypes'] = $this->coverTypeModel->getCoverTypes();
        return $this->renderer->render($response, "homePage.phtml", $args);
    }
}