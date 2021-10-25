<?php

namespace Pessoa\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use \Model\SolutionTable;

class SolutionController extends AbstractActionController
{

    private $table;

    public function __construct($table)
    {
        $this->table = new SolutionTable($table);
    }
    public function indexAction()
    {
        return new ViewModel();
    }

    public function addAction()
    {
        return new ViewModel();
    }

 //Class   
}
