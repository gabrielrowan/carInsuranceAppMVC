<?php
namespace CarInsurance\Factories;

use Psr\Container\ContainerInterface;
use CarInsurance\Models\CarInsuranceModel;

class CarInsuranceModelFactory
{
public function __invoke(ContainerInterface $container)
{
$db = $container->get('dbConn');
return new CarInsuranceModel($db);
}
}