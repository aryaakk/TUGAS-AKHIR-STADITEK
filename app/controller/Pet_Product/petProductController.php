<?php

namespace staditek\TugasAkhir\App\controller\Pet_Product;

use staditek\TugasAkhir\App\model\Pet_Product\petProductModel;

class petProductController
{
    public static $model = null;

    public function __construct()
    {
        self::$model = new petProductModel();
    }

    public function index()
    {
        echo json_encode(self::$model->showData());
        die();
    }

    public function addData()
    {
        $insert = array(
            'product_code' => "df02",
            'product_image' => "https://cdn.onemars.net/sites/whiskas_id_xGoUJ_mwh5/image/large_new-pack-whk_hairball_1652272467429.png",
            'product_name' => "WHISKAS® DRY ADULT 1+ SKIN & COAT",
            'product_detail' => "Bulu dan kulit yang indah adalah ciri khas kucing yang dirawat dengan baik dan sehat. Banyak faktor yang bisa menyebabkan kesehatan kulit & bulu yang jelek, seperti nutrisi yang buruk, berat badan yang berlebihan (yang mempersulit kucing Anda merawat tubuh mereka sendiri), usia tua dan bahkan terlalu sering dimandikan (yang bisa menghilangkan minyak alami dan menyebabkan iritasi kulit).",
            'product_category_id' => 7,
            'quantity_on_hand' => 10,
            'vendor_price' => 200000,
            'retail_price' => 220000,
            'discount' => 0,
            'vendor_id' => 1,
            'status' => 1,
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
            'pet_product_id' => 2,
            'product_code' => "df02",
            'product_image' => "https://cdn.onemars.net/sites/whiskas_id_xGoUJ_mwh5/image/large_new-pack-whk_hairball_1652272467429.png",
            'product_name' => "WHISKAS® DRY ADULT 1+ SKIN & COAT",
            'product_detail' => "Bulu dan kulit yang indah adalah ciri khas kucing yang dirawat dengan baik dan sehat. Banyak faktor yang bisa menyebabkan kesehatan kulit & bulu yang jelek, seperti nutrisi yang buruk, berat badan yang berlebihan (yang mempersulit kucing Anda merawat tubuh mereka sendiri), usia tua dan bahkan terlalu sering dimandikan (yang bisa menghilangkan minyak alami dan menyebabkan iritasi kulit).",
            'product_category_id' => 7,
            'quantity_on_hand' => 10,
            'vendor_price' => 200000,
            'retail_price' => 250000,
            'discount' => 0,
            'vendor_id' => 1,
            'status' => 1,
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