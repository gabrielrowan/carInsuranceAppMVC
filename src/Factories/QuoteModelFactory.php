<?php

namespace CarInsurance\Factories;

use Psr\Container\ContainerInterface;
use CarInsurance\Models\QuoteModel;

class QuoteModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('dbConn');
        return new QuoteModel($db);
    }
}