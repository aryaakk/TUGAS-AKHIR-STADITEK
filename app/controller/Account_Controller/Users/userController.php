<?php

namespace staditek\TugasAkhir\App\controller\Account_Controller\Users;

use staditek\TugasAkhir\App\model\Users\usersModel;


class userController
{
    public static $model = null;

    public function __construct()
    {
        self::$model = new usersModel();
    }

    public function index()
    {
        echo json_encode(self::$model->showData());
        die();
    }

    public function addData()
    {
        $insert = array(
            'username' => "arya",
            'password' => password_hash("cashier", PASSWORD_DEFAULT),
            'fullname' => "ARYA TIO WASESA",
            'avatar' => "avatar2.jpg",
            'contact' => "0987654321",
            'email' => "arya@gmail.com",
            'user_category_id' => 1,
            'status' => '1'
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
            'user_id' => 1,
            'username' => "dina",
            'password' => password_hash("cashier", PASSWORD_DEFAULT),
            'fullname' => "DWI TIA AUDINA",
            'avatar' => "avatar1.jpg",
            'contact' => "0987654321",
            'email' => "tia@gmail.com",
            'user_category_id' => 1,
            'status' => '1'
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