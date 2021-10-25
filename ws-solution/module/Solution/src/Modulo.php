<?php
// ! Arquivo carregado quando o modulo pessoa é chamado

namespace Solution;
use Zend\ModuleManager\Feature\ConfigModuloInterface;

class Modulo implements ConfigModuloInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';    
    }// getConfig


    //Usar uma facture para carregar os servicos
    public function getServiceConfig()
    {
        retun [
            'factories'=> [
                Model\SolutionTable::class => function($container) {
                    $tableGateway = $container->get(Model\SolutionTableGateway::class);
                    return new SolutionTable($tableGateway);
                },
               Model\SolutionTableGateway::class => function ($container) {
                   $dbAdapter = $container->get(AdapterInterface::class);
                   $resultSetPrototype = new ResultSet();
                   $resultSetPrototype->setArrayObjectPrototype(new Model\Solution());
                   return new TableGateway('solution', $dbAdapter, null, $resultSetPrototype);
               },  
            ]
        ];
    }// getServiceConfig    



//Class Modulo
}