<?php

// ! Arquivo de configurações


//Primeiramente vamos definir o nome do módulo e na sequencia a routes para o módulo
// Utilizando o factory do Zend Framework para contrução do controller Pessoa
namespace Solution;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'pessoa' => [
                'type' => \Zend\Router\Http\Segment::class,
                'options' => [
                    'route' => '/solution[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        '__NAMESPACE__' => 'Solution',
                        'controller' => Controller\SolutionController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\SolutionController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'Solution' => __DIR__ . '/../view',
        ],
    ],
    'db' => [
        'driver' => 'PdoMysql',
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'driver_options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ],
    ],
];