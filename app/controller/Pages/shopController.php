<?php

namespace staditek\TugasAkhir\App\controller\Pages;

use staditek\TugasAkhir\App\core\view;
use staditek\TugasAkhir\App\model\Pages\homeModel;
use staditek\TugasAkhir\App\model\Pet_Product\petProductModel;
use staditek\TugasAkhir\App\model\Pet_Product_Categories\productCategoriesModel;
use staditek\TugasAkhir\App\model\Vendor\vendorModel;

class shopController
{
    public static $model = null;
    public static $modelProduct = null;

    public static $modelProductCategory = null;

    public function __construct()
    {
        self::$model = new homeModel();
        self::$modelProduct = new petProductModel();
        self::$modelProductCategory = new productCategoriesModel();
    }

    public function index()
    {
        $data['title'] = "Shop";
        $data['activeShop'] = "active";
        $data['activeService'] = "";
        $data['activeAdopt'] = "";
        $data['style'] = "Shop/shop";
        $data['totalProduct'] = self::$modelProduct->getNumRows();
        $data['showProduct'] = self::$modelProduct->showData();
        $data['display'] = "";
        $data['showCategories'] = self::$modelProductCategory->showData();
        view::View('template/header', $data);
        view::View('body/Shop/shop', $data);
        view::View('template/footer', $data);
    }

    public function detailProduct($id)
    {
        $data['title'] = "Detail Product";
        $data['activeShop'] = "";
        $data['activeService'] = "";
        $data['activeAdopt'] = "";
        $data['style'] = "Shop/detail";
        $data['totalProduct'] = self::$modelProduct->getNumByID($id);
        $data['showProduct'] = self::$modelProduct->showDataID($id);
        $data['display'] = "";
        $data['showCategories'] = self::$modelProductCategory->showData();
        view::View('template/header', $data);
        view::View('body/Shop/detail', $data);
        view::View('template/footer', $data);
    }

    public function getByCategory($category)
    {
        $data['title'] = "Shop";
        $data['activeShop'] = "active";
        $data['activeService'] = "";
        $data['activeAdopt'] = "";
        $data['style'] = "Shop/shop";
        $data['totalProduct'] = self::$modelProduct->getNumRowsSpes($category);
        $data['showProduct'] = self::$modelProduct->showDataCategory($category);
        $data['display'] = "";
        $data['showCategories'] = self::$modelProductCategory->showData();
        view::View('template/header', $data);
        view::View('body/Shop/shop', $data);
        view::View('template/footer', $data);
    }
}