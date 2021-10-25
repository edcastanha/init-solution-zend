<?php

namespace Solution\Models;


classs Solution
{
    private $id;
    private $title;
    private $description;

    public function __construct($data = array())
    {
        $this->id = $data['id'] ?? null;
        $this->title = $data['title'] ?? null;
        $this->description = $data['description'] ?? null;
    }
    


    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }


}//classs Solution