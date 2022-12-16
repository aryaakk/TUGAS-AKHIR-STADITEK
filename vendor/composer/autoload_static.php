<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteac6617baaad5964b1317ccb98e1d0dd
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'staditek\\TugasAkhir\\App\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'staditek\\TugasAkhir\\App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'staditek\\TugasAkhir\\App\\config\\database' => __DIR__ . '/../..' . '/app/config/database.php',
        'staditek\\TugasAkhir\\App\\controller\\Account_Controller\\Customer\\customerController' => __DIR__ . '/../..' . '/app/controller/Account_Controller/Customer/customerController.php',
        'staditek\\TugasAkhir\\App\\controller\\Account_Controller\\Users\\userController' => __DIR__ . '/../..' . '/app/controller/Account_Controller/Users/userController.php',
        'staditek\\TugasAkhir\\App\\controller\\Account_Controller\\Users_Group\\userGroupController' => __DIR__ . '/../..' . '/app/controller/Account_Controller/Users_Group/userGroupController.php',
        'staditek\\TugasAkhir\\App\\controller\\Order\\orderController' => __DIR__ . '/../..' . '/app/controller/Order/orderController.php',
        'staditek\\TugasAkhir\\App\\controller\\Order_Detail\\orderDetailController' => __DIR__ . '/../..' . '/app/controller/Order_Detail/orderDetailController.php',
        'staditek\\TugasAkhir\\App\\controller\\Pages\\homeController' => __DIR__ . '/../..' . '/app/controller/Pages/homeController.php',
        'staditek\\TugasAkhir\\App\\controller\\Pages\\shopController' => __DIR__ . '/../..' . '/app/controller/Pages/shopController.php',
        'staditek\\TugasAkhir\\App\\controller\\Payment\\paymentController' => __DIR__ . '/../..' . '/app/controller/Payment/paymentController.php',
        'staditek\\TugasAkhir\\App\\controller\\Pet\\petController' => __DIR__ . '/../..' . '/app/controller/Pet/petController.php',
        'staditek\\TugasAkhir\\App\\controller\\Pet_Category\\petCategoryController' => __DIR__ . '/../..' . '/app/controller/Pet_Category/petCategoryController.php',
        'staditek\\TugasAkhir\\App\\controller\\Pet_Product\\petProductController' => __DIR__ . '/../..' . '/app/controller/Pet_Product/petProductController.php',
        'staditek\\TugasAkhir\\App\\controller\\Pet_Product_Categories\\productCategoriesController' => __DIR__ . '/../..' . '/app/controller/Pet_Product_Categories/productCategoriesController.php',
        'staditek\\TugasAkhir\\App\\controller\\Service\\serviceController' => __DIR__ . '/../..' . '/app/controller/Service/serviceController.php',
        'staditek\\TugasAkhir\\App\\controller\\Service_Order\\serviceOrderController' => __DIR__ . '/../..' . '/app/controller/Service_Order/serviceOrderController.php',
        'staditek\\TugasAkhir\\App\\controller\\Vendor\\vendorController' => __DIR__ . '/../..' . '/app/controller/Vendor/vendorController.php',
        'staditek\\TugasAkhir\\App\\core\\router' => __DIR__ . '/../..' . '/app/core/router.php',
        'staditek\\TugasAkhir\\App\\core\\view' => __DIR__ . '/../..' . '/app/core/view.php',
        'staditek\\TugasAkhir\\App\\model\\Customer\\customerModel' => __DIR__ . '/../..' . '/app/model/Customer/customerModel.php',
        'staditek\\TugasAkhir\\App\\model\\Order\\orderModel' => __DIR__ . '/../..' . '/app/model/Order/orderModel.php',
        'staditek\\TugasAkhir\\App\\model\\Order_Detail\\orderDetailModel' => __DIR__ . '/../..' . '/app/model/Order_Detail/orderDetailModel.php',
        'staditek\\TugasAkhir\\App\\model\\Pages\\homeModel' => __DIR__ . '/../..' . '/app/model/Pages/homeModel.php',
        'staditek\\TugasAkhir\\App\\model\\Payment\\paymentModel' => __DIR__ . '/../..' . '/app/model/Payment/paymentModel.php',
        'staditek\\TugasAkhir\\App\\model\\Pet\\petModel' => __DIR__ . '/../..' . '/app/model/Pet/petModel.php',
        'staditek\\TugasAkhir\\App\\model\\Pet_Category\\petCategoryModel' => __DIR__ . '/../..' . '/app/model/Pet_Category/petCategoryModel.php',
        'staditek\\TugasAkhir\\App\\model\\Pet_Product\\petProductModel' => __DIR__ . '/../..' . '/app/model/Pet_Product/petProductModel.php',
        'staditek\\TugasAkhir\\App\\model\\Pet_Product_Categories\\productCategoriesModel' => __DIR__ . '/../..' . '/app/model/Pet_Product_Categories/productCategoriesModel.php',
        'staditek\\TugasAkhir\\App\\model\\Service\\serviceModel' => __DIR__ . '/../..' . '/app/model/Service/serviceModel.php',
        'staditek\\TugasAkhir\\App\\model\\Service_Order\\serviceOrderModel' => __DIR__ . '/../..' . '/app/model/Service_Order/serviceOrderModel.php',
        'staditek\\TugasAkhir\\App\\model\\Users\\usersModel' => __DIR__ . '/../..' . '/app/model/Users/usersModel.php',
        'staditek\\TugasAkhir\\App\\model\\Users_Group\\usersGroupModel' => __DIR__ . '/../..' . '/app/model/Users_Group/usersGroupModel.php',
        'staditek\\TugasAkhir\\App\\model\\Vendor\\vendorModel' => __DIR__ . '/../..' . '/app/model/Vendor/vendorModel.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteac6617baaad5964b1317ccb98e1d0dd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteac6617baaad5964b1317ccb98e1d0dd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticIniteac6617baaad5964b1317ccb98e1d0dd::$classMap;

        }, null, ClassLoader::class);
    }
}
