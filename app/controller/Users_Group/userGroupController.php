<?php

namespace staditek\TugasAkhir\App\controller\Users_Group;

use staditek\TugasAkhir\App\model\Users_Group\usersGroupModel;

class userGroupController
{
    public static $model = null;

    public function __construct()
    {
        self::$model = new usersGroupModel();
    }

    public function index()
    {
        echo json_encode(self::$model->showData());
        die();
    }

    public function addData()
    {
        $insert = array(
            'group_name' => "admin",
            'description' => "This admin is the head to oversee the work of the cashiers, and this admin can access all the features on this website",
            'allow_add' => 1,
            'allow_edit' => 1,
            'allow_delete' => 1,
            'allow_print' => 1,
            'allow_import' => 1,
            'allow_export' => 1,
        );
        if (self::$model->saveData($insert)) {
            echo json_encode(self::$model->showData());
            die();
        } else {
            echo "GAGAL";
            die();
        }
    }

    public function editShow($id)
    {
        if (self::$model->findByID($id)) {
            echo json_encode(self::$model->findByID($id));
            die();
        } else {
            echo "GAGAL";
            die();
        }
    }

    public function editData()
    {
        $update = array(
            'user_group_id' => 2,
            'group_name' => "admin",
            'description' => "This admin is the head to oversee the work of the cashiers, and this admin can access all the features on this website",
            'allow_add' => 1,
            'allow_edit' => 1,
            'allow_delete' => 1,
            'allow_print' => 1,
            'allow_import' => 1,
            'allow_export' => 1,
        );
        if (self::$model->updateData($update)) {
            echo json_encode(self::$model->showData());
            die();
        } else {
            echo "GAGAL";
            die();
        }

    }

    public function deleteData($id)
    {
        if (self::$model->dropData($id)) {
            echo json_encode(self::$model->showData());
            die();
        } else {
            echo "GAGAL";
            die();
        }
    }
}