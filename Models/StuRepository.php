<?php

namespace MVC\Models;

use MVC\Models\StuResourceModel;

class StuRepository
{
    private $stuResourceModel;

    public function __construct()
    {
        $this->stuResourceModel= new StuResourceModel();
    }

    public function add($model)
    {
        return $this->stuResourceModel->save($model);
    }

    public function edit($model)
    {
        return $this->stuResourceModel->save($model);
    }
    
    public function get($id)
    {
        return $this->stuResourceModel->show($id);
    }

    public function delete($id)
    {
        return $this->stuResourceModel->delete($id);
    }
    
    public function getAll($model)
    {
        return $this->stuResourceModel->showAll($model);
    }
}
