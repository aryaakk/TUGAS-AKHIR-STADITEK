<?php

namespace staditek\TugasAkhir\App\controller\Payment;

use staditek\TugasAkhir\App\model\Payment\paymentModel;

class paymentController
{
    public static $model = null;

    public function __construct()
    {
        self::$model = new paymentModel();
    }

    public function index()
    {
        echo json_encode(self::$model->showData());
        die();
    }

    public function addData()
    {
        $insert = array(
            'reference_no' => "pay01",
            'payment_for' => "service",
            'amount_paid' => 100000,
            'payment_status' => "partial",
            'paid_by' => 'DWI TIA AUDINA',
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
            'payment_id' => 7,
            'reference_no' => "pay01",
            'payment_for' => "order",
            'amount_paid' => 100000,
            'payment_status' => "fully paid",
            'paid_by' => 'DWI TIA AUDINA',
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