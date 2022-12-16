<?php

namespace staditek\TugasAkhir\App\controller\Pages;

use staditek\TugasAkhir\App\core\view;
use staditek\TugasAkhir\App\model\Pet_Category\petCategoryModel;
use staditek\TugasAkhir\App\model\Service\serviceModel;

class serviceController
{
    public static $model = null;
    public static $modelPet = null;

    public function __construct()
    {
        self::$model = new serviceModel();
        self::$modelPet = new petCategoryModel();
    }

    public function index()
    {
        $data['title'] = "Service";
        $data['activeShop'] = "";
        $data['activeService'] = "active";
        $data['activeAdopt'] = "";
        $data['style'] = "Service/service";
        $data['showData'] = self::$model->showData();
        $data['showPetCategories'] = self::$modelPet->showData();
        view::View('template/header', $data);
        view::View('body/Service/service', $data);
        view::View('template/footer', $data);
    }

    public function addService(){
        $data = array(
            'reference_no' => "so".substr(uniqid(), 0, 3),
            'service_id' => $_POST['service_name'],
            'customer_id' => 1, 
            'reserve_date' => $_POST['date_reserved'],
            'total_amount' 
        );
    }
}
 