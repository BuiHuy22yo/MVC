<?php

namespace MVC\Controllers;

use MVC\Models\TaskRepository;
use MVC\Core\Controller;
use MVC\Models\TaskModel;

class TasksController extends Controller
{
    private $taskRepository;
   
    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
    }

    function index()
    {
        $tasks = new TaskModel();
        $d['tasks'] = $this->taskRepository->getAll($tasks);
        $this->set($d);
        $this->render("index");
    }

     function create()
     {
         if (isset($_POST["title"]))
         {
             $task = new TaskModel();
             $task->setTitle($_POST["title"]);
             $task->setDescription($_POST["description"]);


             if ($this->taskRepository->add($task))
             {
                 header("Location: " . WEBROOT . "tasks/index");
             }
         }
         $this->render("create");
     }

   function edit($id)
   {
       $task = new TaskModel();

       $d['tasks'] = $this->taskRepository->get($id);

       if (isset($_POST["title"]))
       {
           $task->setId($id);
           $task->setTitle($_POST["title"]);
           $task->setDescription($_POST["description"]);
           if ($this->taskRepository->edit($task))
           {
               header("Location: " . WEBROOT . "tasks/index");
           }
       }
       $this->set($d);
       $this->render("edit");
   }

     function delete($id)
     {
        $task = new TaskModel();
        $task->setId($id);
        if ( $this->taskRepository->delete($task))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
     }
}
?>