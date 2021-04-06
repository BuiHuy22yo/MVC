<?php

namespace MVC\Controllers;

use MVC\Models\StuRepository;
use MVC\Core\Controller;
use MVC\Models\StuModel;
use MVC\Models\StuResourceModel;

class StuController extends Controller
{
    private $stuRepository;

    public function __construct()
    {
        $this->stuRepository = new StuRepository();
    }

    function index()
    {
        $stu = new StuModel();
        $StuResourceModel= new StuResourceModel();
        $d['stu'] = $StuResourceModel->showAll($stu);
    
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"])) {
            $stu = new StuModel();
            $stu->setTitle($_POST["title"]);
            $stu->setDescription($_POST["description"]);
            if ($this->stuRepository->add($stu)) {
                header("Location: " . WEBROOT . "stu/index");
            }
        }
        $this->render("create");
    }

    function edit($id)
    {
        $stu = new StuModel();

        $d['stu'] = $this->stuRepository->get($id);
        if (isset($_POST["title"])) {
            $stu->setId($id);
            $stu->setTitle($_POST["title"]);
            $stu->setDescription($_POST["description"]);
            if ($this->stuRepository->edit($stu)) {
                header("Location: " . WEBROOT . "stu/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $stu = new StuModel();
        $stu->setId($id);
        if ($this->stuRepository->delete($stu)) {
            header("Location: " . WEBROOT . "stu/index");
        }
    }
}
