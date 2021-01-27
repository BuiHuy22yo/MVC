<?php

namespace MVC\Core;

use MVC\Config\Database;
use PDO;

class ResourceModel implements ResourceModelInterface
{
    private $table;
    private $id;
    private $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function save($model)
    {
        $col = [];
        $placeName = [];
        $properties = $model->getProperties();

        if ($model->getId() == null) {
            unset($properties['id']);
        }

        foreach ($properties as $key => $value) {
            array_push($placeName, ':' . $key);
            if($key != 'created_at'){
                array_push($col, $key . ' = :' . $key); 
            } 
        }
      
        $columnsUpdate = implode(', ', $col);
        $columnsInsert = implode(', ', array_keys($properties));
        $values = implode(', ', $placeName);

        if ($model->getId() == null) {
            $sql = "INSERT INTO $this->table ($columnsInsert) VALUES ($values)";
            $req = Database::getBdd()->prepare($sql);
            $date = array('created_at' => date('Y-m-d H:i:s') , 'updated_at' => date('Y-m-d H:i:s'));
            return $req->execute(array_merge($properties, $date));
        } else {
            $sql = "UPDATE $this->table SET  $columnsUpdate WHERE id = :id";
            $req = Database::getBdd()->prepare($sql);
            $date = array(':id' => $model->getId(), 'updated_at' => date('Y-m-d H:i:s'));
            return $req->execute(array_merge($properties, $date));
        }
    }

    public function delete($model)
    {
        $id = $model->getId();
        $sql = "DELETE FROM $this->table WHERE id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        return $req->execute();
    }

    public function show($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute([':id' => $id]);
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function showAll($model)
    {
        $sql = "SELECT * FROM $this->table";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
}
