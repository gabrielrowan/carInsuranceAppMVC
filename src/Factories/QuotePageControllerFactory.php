<?php

namespace CarInsurance\Factories;

use Psr\Container\ContainerInterface;
use CarInsurance\Controllers\QuotePageControllerController;

class QuotePageControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $CarInsuranceModel = $container->get('CarInsuranceModel');
        $renderer = $container->get('renderer');
        return new QuotePageController($renderer, $CarInsuranceModel);
    }
}