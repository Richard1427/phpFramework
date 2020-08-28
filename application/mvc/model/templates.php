<?php


namespace application\mvc\model;


class templates extends Database{
    public function __construct(){
        parent::__construct();
        $this->table = "templates";
    }
    public function read($id){
        $this->where = "id=$id";
        $model = parent::select()->fetchAll();
        return $model;
    }
}