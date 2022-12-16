<?php

namespace staditek\TugasAkhir\App\controller\Pet;

use staditek\TugasAkhir\App\model\Pet\petModel;

class petController
{
    public static $model = null;

    public function __construct()
    {
        self::$model = new petModel();
    }

    public function index()
    {
        echo json_encode(self::$model->showData());
        die();
    }

    public function addData()
    {
        $insert = array(
            'pet_name' => "Siamese Cat",
            'pet_description' => "The Siamese cat is one of the oldest recorded cat breeds. They are descended from the Felidae cat family. Several other types of cats are derived from Siamese cats, namely Balinese cats, Javanese cats, and Bengal cats.",
            'pet_category_id' => 4,
            'vendor_id' => null,
            'pet_images' => "siamese.jpg",
            'pet_status' => 1,
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
            'pet_id' => 1,
            'pet_name' => "Siamese Cat",
            'pet_description' => "The Siamese cat is one of the oldest recorded cat breeds. They are descended from the Felidae cat family. Several other types of cats are derived from Siamese cats, namely Balinese cats, Javanese cats, and Bengal cats.",
            'pet_category_id' => 4,
            'vendor_id' => 1,
            'pet_images' => "siamese.jpg",
            'pet_status' => 1,
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