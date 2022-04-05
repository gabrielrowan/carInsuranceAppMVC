<?php

namespace CarInsurance\Factories;

use CarInsurance\Controllers\QuoteAcceptedController;
use Psr\Container\ContainerInterface;

class QuoteAcceptedControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $renderer = $container->get('renderer');
        $quoteModel = $container->get('QuoteModel');
        return new QuoteAcceptedController($renderer, $quoteModel);
    }
}