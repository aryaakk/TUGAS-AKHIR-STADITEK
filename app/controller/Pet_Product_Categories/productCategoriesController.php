<?php

namespace staditek\TugasAkhir\App\controller\Pet_Product_Categories;

use staditek\TugasAkhir\App\model\Pet_Product_Categories\productCategoriesModel;

class productCategoriesController
{
    public static $model = null;

    public function __construct()
    {
        self::$model = new productCategoriesModel();
    }

    public function index()
    {
        echo json_encode(self::$model->showData());
        die();
    }

    public function addData()
    {
        $insert = array(
            'category_name' => "mainan",
            'description' => "toys are also necessary for children, as a boredom buster for children or for their employers.",
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
            'product_category_id' => 10,
            'category_name' => "mainan",
            'description' => "toys are also necessary for children, as a boredom buster for children or for their employers.",
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