<?php

namespace CarInsurance\Factories;

use CarInsurance\Models\CoverTypeModel;
use Psr\Container\ContainerInterface;

class CoverTypeModelFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $db = $container->get('dbConn');
        return new CoverTypeModel($db);
    }
}
