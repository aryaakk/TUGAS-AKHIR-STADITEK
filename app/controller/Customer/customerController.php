<?php

namespace staditek\TugasAkhir\App\controller\Customer;

use staditek\TugasAkhir\App\model\Customer\customerModel;

class customerController
{
    public static $model = null;

    public function __construct()
    {
        self::$model = new customerModel();
    }

    public function index()
    {
        echo json_encode(self::$model->showData());
        die();
    }

    public function addData()
    {
        $insert = array(
            'customer_code' => "cust02",
            'customer_name' => "ARYA TIO WASESA",
            'email_address' => "arya@example.com",
            'contact_number' => "0987654321",
            'complete_address' => "BOYOLALI",
            'avatar' => "customer2.jpg",
            'username' => "tio",
            'password' => password_hash("customer", PASSWORD_DEFAULT),
            'status' => "1",
            'user_id' => 1
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
            'customer_id' => 2,
            'customer_code' => "cust02",
            'customer_name' => "ARYA TIO WASESA",
            'email_address' => "arya@example.com",
            'contact_number' => "0987654321",
            'complete_address' => "BOYOLALI",
            'avatar' => "customer2.jpg",
            'username' => "tio",
            'password' => password_hash("customer", PASSWORD_DEFAULT),
            'status' => "0",
            'user_id' => 1
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