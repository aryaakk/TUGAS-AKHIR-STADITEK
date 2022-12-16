<?php

namespace staditek\TugasAkhir\App\controller\Pages;

use staditek\TugasAkhir\App\core\view;
use staditek\TugasAkhir\App\model\Pages\homeModel;
use staditek\TugasAkhir\App\model\Pet_Product\petProductModel;
use staditek\TugasAkhir\App\model\Pet_Product_Categories\productCategoriesModel;
use staditek\TugasAkhir\App\model\Vendor\vendorModel;

class homeController
{
    public static $model = null;
    public static $modelBrand = null;
    public static $modelProduct = null;
    public static $modelCategoryProduct = null;


    public function __construct()
    {
        self::$model = new homeModel();
        self::$modelBrand = new vendorModel();
        self::$modelProduct = new petProductModel();
        self::$modelCategoryProduct = new productCategoriesModel();
    }

    public function index()
    {
        $data['title'] = "Home";
        $data['activeShop'] = "";
        $data['activeService'] = "";
        $data['activeAdopt'] = "";
        $data['style'] = "Home/home";
        $data['showBrands'] = self::$modelBrand->showData();
        view::View('template/header', $data);
        view::View('body/Home/home', $data);
        view::View('template/footer', $data);
    }

    public function showProduct($brand)
    {
        $data['title'] = "Shop";
        $data['activeShop'] = "";
        $data['activeService'] = "";
        $data['activeAdopt'] = "";
        $data['style'] = "Shop/shop";
        $data['display'] = "";
        $data['totalProduct'] = self::$modelProduct->getNumRowsName($brand);
        $data['showProduct'] = self::$modelProduct->showDataName($brand);
        $data['showCategories'] = self::$modelCategoryProduct->showData();
        view::View('template/header', $data);
        view::View('body/Shop/shop', $data);
        view::View('template/footer', $data);
    }
}