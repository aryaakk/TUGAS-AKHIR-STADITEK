<?php

namespace staditek\TugasAkhir\App\controller\Order;

use staditek\TugasAkhir\App\model\Order\orderModel;

class orderController
{
    public static $model = null;

    public function __construct()
    {
        self::$model = new orderModel();
    }

    public function index()
    {
        echo json_encode(self::$model->showData());
        die();
    }

    public function addData()
    {
        $date = date_create(date('Y-m-d'));
        date_modify($date, "+5 days");

        $insert = array(
            'reference_no' => "order01",
            'customer_id' => 1,
            'order_date' => null,
            'order_status' => "accepted",
            'expected_delivery_date' => date_format($date, "Y-m-d"),
            'total_amount' => 200000,
            'number_of_items' => 1,
            'user_id' => 1,
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
        $date = date_create(date('Y-m-d'));
        date_modify($date, "+8 days");
        $update = array(
            'order_id' => 5,
            'reference_no' => "order01",
            'customer_id' => 1,
            'order_date' => null,
            'order_status' => "declined",
            'expected_delivery_date' => date_format($date, "Y-m-d"),
            'total_amount' => 200000,
            'number_of_items' => 1,
            'user_id' => 1,
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