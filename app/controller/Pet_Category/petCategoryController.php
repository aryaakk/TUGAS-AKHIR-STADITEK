<?php

namespace staditek\TugasAkhir\App\controller\Pet_Category;

use staditek\TugasAkhir\App\model\Pet_Category\petCategoryModel;

class petCategoryController
{
    public static $model = null;

    public function __construct()
    {
        self::$model = new petCategoryModel();
    }

    public function index()
    {
        echo json_encode(self::$model->showData());
        die();
    }

    public function addData()
    {
        $insert = array(
            'pet_category_name' => "fishy",
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
            'pet_category_id' => 5,
            'pet_category_name' => "fish",
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