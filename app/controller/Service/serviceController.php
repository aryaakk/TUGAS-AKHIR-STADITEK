<?php

namespace staditek\TugasAkhir\App\controller\Service;

use staditek\TugasAkhir\App\model\Service\serviceModel;

class serviceController
{
    public static $model = null;

    public function __construct()
    {
        self::$model = new serviceModel();
    }

    public function index()
    {
        echo json_encode(self::$model->showData());
        die();
    }

    public function addData()
    {
        $insert = array(
            'reference_no' => "svc02",
            'service_name' => "Animal Lodging",
            'service_detail' => "Animal lodging at our place is very reliable, because it will be guarded 24 hours",
            'service_fee' => 300000,
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
            'service_id' => 1,
            'reference_no' => "svc01",
            'service_name' => "gromming",
            'service_detail' => "Gromming at our place, safe and reliable. and we do it wholeheartedly without discriminating against the race of an animal",
            'service_fee' => 100000,
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