<?php

namespace CarInsurance\Factories;

use Psr\Container\ContainerInterface;
use CarInsurance\Controllers\QuotePageController;

class QuotePageControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $quoteModel = $container->get('QuoteModel');
        $renderer = $container->get('renderer');
        $carTypeModel = $container->get('CarTypeModel');
        $coverTypeModel = $container->get('CoverTypeModel');
        return new QuotePageController($renderer, $carTypeModel, $coverTypeModel, $quoteModel);
    }
}