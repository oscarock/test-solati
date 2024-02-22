<?php

namespace App\Model\Dao;

interface UserDAO {

    public function findAll();
    public function findById($id);
    public function insert(array $data);
    public function customUpdate($id, array $data);
    public function customDelete($id);
}

