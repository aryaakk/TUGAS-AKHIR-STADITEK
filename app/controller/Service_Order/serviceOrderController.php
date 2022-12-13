<?php

namespace staditek\TugasAkhir\App\controller\Service_Order;

use staditek\TugasAkhir\App\model\Service_Order\serviceOrderModel;

class serviceOrderController
{
    public static $model = null;

    public function __construct()
    {
        self::$model = new serviceOrderModel();
    }

    public function index()
    {
        echo json_encode(self::$model->showData());
        die();
    }

    public function addData()
    {
        $insert = array(
            'reference_no' => "so01",
            'service_id' => 1,
            'customer_id' => 1,
            'service_date' => null,
            'service_status' => "partial",
            'total_amount' => 120000,
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
        $update = array(
            'order_service_id' => 3,
            'reference_no' => "so01",
            'service_id' => 1,
            'customer_id' => 1,
            'service_date' => null,
            'service_status' => "fully paid",
            'total_amount' => 120000,
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