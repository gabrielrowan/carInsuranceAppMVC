<?php

namespace CarInsurance\Factories;

use CarInsurance\Models\CarTypeModel;
use Psr\Container\ContainerInterface;

class CarTypeModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('dbConn');
        return new CarTypeModel($db);
    }
}
