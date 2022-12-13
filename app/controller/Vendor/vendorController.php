<?php

namespace staditek\TugasAkhir\App\controller\Vendor;

use staditek\TugasAkhir\App\model\Vendor\vendorModel;

class vendorController
{
    public static $model = null;

    public function __construct()
    {
        self::$model = new vendorModel();
    }

    public function index()
    {
        echo json_encode(self::$model->showData());
        die();
    }

    public function addData()
    {
        $insert = array(
            'company_name' => "ROYAL CANIN",
            'company_contact_person' => "0987654321",
            'company_email' => "canin@example.com",
            'company_contact_number' => "0987654321",
            'company_website' => "https://www.royalcanin.com/id",
            'company_profile' => "royal_canin.jpg",
            'vendor_username' => "rc_indo",
            'vendor_password' => password_hash("mamkucing", PASSWORD_DEFAULT),
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
            'company_id' => 2,
            'company_name' => "ROYAL CANIN",
            'company_contact_person' => "0987654321",
            'company_email' => "canin@example.com",
            'company_contact_number' => "0987654321",
            'company_website' => "https://www.royalcanin.com/id",
            'company_profile' => "royal_canin.jpg",
            'vendor_username' => "royalcanin",
            'vendor_password' => password_hash("mamkucing", PASSWORD_DEFAULT),
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