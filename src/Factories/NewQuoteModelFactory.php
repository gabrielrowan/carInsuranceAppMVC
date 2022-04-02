<?php

namespace CarInsurance\Factories;

use Psr\Container\ContainerInterface;
use CarInsurance\Models\NewQuoteModel;

class NewQuoteModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('dbConn');
        return new NewQuoteModel($db);
    }
}