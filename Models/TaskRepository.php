<?php

namespace MVC\Models;

use MVC\Models\TaskResourceModel;

class TaskRepository
{
    protected $taskResourceModel;

    public function __construct()
    {
        $this->taskResourceModel= new TaskResourceModel();
    }

    public function add($model)
    {
        return $this->taskResourceModel->save($model);
    }

    public function edit($model)
    {
        return $this->taskResourceModel->save($model);
    }
    
    public function get($id)
    {
        return $this->taskResourceModel->show($id);
    }

    public function delete($id)
    {
        return $this->taskResourceModel->delete($id);
    }
    
    public function getAll($model)
    {
        return $this->taskResourceModel->showAll($model);
    }
}

?>