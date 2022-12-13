<?php

namespace staditek\TugasAkhir\App\model\Users;

use staditek\TugasAkhir\App\config\database;

class usersModel extends database{

    private $table = 'tbl_user';

    public function showData() {
        $statement = self::$conn->prepare("SELECT * FROM $this->table");
        $statement->execute();
        
        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function saveData($data) {
        $statement = self::$conn->prepare("INSERT INTO $this->table(username, password, fullname, avatar, contact, email, user_category_id, status) VALUES(
            :username, 
            :password,
            :fullname, 
            :avatar,
            :contact,
            :email,
            :user_category_id,
            :status
        )");

        return $statement->execute($data);
    }

    public function findByID($id) {
        $statement = self::$conn->prepare("SELECT * FROM $this->table WHERE user_id = '$id'");
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public function updateData($data) {
        $statement = self::$conn->prepare("UPDATE $this->table SET 
            username = :username,
            password = :password,
            fullname = :fullname,
            avatar = :avatar,
            contact = :contact,
            email = :email,
            user_category_id = :user_category_id,
            status = :status
            WHERE user_id = :user_id
        ");
        return $statement->execute($data);
    }

    public function dropData($id) {
        $statement = self::$conn->prepare("DELETE FROM $this->table WHERE user_id = '$id'");
        return $statement->execute();
    }

}