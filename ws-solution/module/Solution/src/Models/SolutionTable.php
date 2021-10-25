<?php

namespace Solution\Models;

use Zend\Db\TableGateway\TableGatewayInterface;

class Solutiontable 
{

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getSolution($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new \RuntimeException(sprintf(
                'Não foi possível encontrar registro com o id:  %d',
                $id
            ));
        }

        return $row;
    }

    public function saveSolution(Solution $solution)
    {
        $data = [
            'title' => $solution->getTitle(),
            'description' => $solution->getDescription()
        ];
        $id = (int) $solution->getId();
        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public deleteSolution($id)
    {
        $this->tableGateway->delete(['id' => (int)$id]);
    }



}//Class SolutionTable end

