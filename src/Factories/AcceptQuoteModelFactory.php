<?php

namespace CarInsurance\Factories;

use CarInsurance\Models\AcceptQuoteModel;
use Psr\Container\ContainerInterface;

class AcceptQuoteModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('dbConn');
        return new AcceptQuoteModel($db);
    }
}

