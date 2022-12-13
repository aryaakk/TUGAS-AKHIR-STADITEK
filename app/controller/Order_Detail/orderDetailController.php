<?php

namespace staditek\TugasAkhir\App\controller\Order_Detail;

use staditek\TugasAkhir\App\model\Order_Detail\orderDetailModel;

class orderDetailController
{
    public static $model = null;

    public function __construct()
    {
        self::$model = new orderDetailModel();
    }

    public function index()
    {
        echo json_encode(self::$model->showData());
        die();
    }

    public function addData()
    {
        $insert = array(
            'order_id' => 5,
            'pet_product_id' => 1,
            'quantity' => 1,
            'quantity_price' => 200000,
            'status' => "on delivery",
            'vendor_id' => 1
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
            'order_detail_id' => 1,
            'order_id' => 5,
            'pet_product_id' => 1,
            'quantity' => 1,
            'quantity_price' => 200000,
            'status' => "completed",
            'vendor_id' => 1
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