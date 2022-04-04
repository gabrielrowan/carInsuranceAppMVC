<?php

namespace CarInsurance\Factories;

use CarInsurance\Controllers\QuoteAcceptedController;
use Psr\Container\ContainerInterface;

class QuoteAcceptedControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('dbConn');
        return new QuoteAcceptedController($db);
    }
}