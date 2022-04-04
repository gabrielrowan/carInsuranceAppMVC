<?php

namespace CarInsurance\Factories;

use Psr\Container\ContainerInterface;
use CarInsurance\Controllers\HomePageController;

class HomePageControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $carTypeModel = $container->get('CarTypeModel');
        $coverTypeModel = $container->get('CoverTypeModel');
        $renderer = $container->get('renderer');
        return new HomePageController($renderer, $carTypeModel, $coverTypeModel);
    }
}