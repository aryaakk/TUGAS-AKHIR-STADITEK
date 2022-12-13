<?php

namespace staditek\TugasAkhir\App\model\Users_Group;

use staditek\TugasAkhir\App\config\database;

class usersGroupModel extends database
{
    private $table = 'tbl_user_group';

    public function showData()
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public function saveData($data)
    {
        $statement = self::$conn->prepare("INSERT INTO $this->table(group_name, description, allow_add, allow_edit, allow_delete, allow_print, allow_import, allow_export) VALUES(
            :group_name, 
            :description,
            :allow_add,
            :allow_edit,
            :allow_delete,
            :allow_print,
            :allow_import,
            :allow_export
        )");
        return $statement->execute($data);
    }

    public function findByID($id)
    {
        $statement = self::$conn->prepare("SELECT * FROM $this->table WHERE user_group_id = '$id'");
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public function updateData($data)
    {
        $statement = self::$conn->prepare("UPDATE $this->table SET 
            group_name = :group_name,
            description = :description,
            allow_add = :allow_add,
            allow_edit = :allow_edit,
            allow_delete = :allow_delete,
            allow_print = :allow_print,
            allow_import = :allow_import,
            allow_export = :allow_export 
            WHERE user_group_id = :user_group_id
        ");
        return $statement->execute($data);
    }

    public function dropData($id)
    {
        $statement = self::$conn->prepare("DELETE FROM $this->table WHERE user_group_id = '$id'");
        return $statement->execute();
    }
}