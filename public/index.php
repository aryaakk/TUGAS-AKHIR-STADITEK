<?php
session_start();

use staditek\TugasAkhir\App\controller\Customer\customerController;
use staditek\TugasAkhir\App\controller\Order\orderController;
use staditek\TugasAkhir\App\controller\Order_Detail\orderDetailController;
use staditek\TugasAkhir\App\controller\Payment\paymentController;
use staditek\TugasAkhir\App\controller\Service\serviceController;
use staditek\TugasAkhir\App\controller\Service_Order\serviceOrderController;
use staditek\TugasAkhir\App\controller\Users\userController;
use staditek\TugasAkhir\App\controller\Users_Group\userGroupController;
use staditek\TugasAkhir\App\controller\Vendor\vendorController;
use staditek\TugasAkhir\App\core\router;

require_once __DIR__ . "/../vendor/autoload.php";

//table user
router::addRoute('GET', '/users', userController::class, 'index', []);
router::addRoute('GET', '/addUsers', userController::class, 'addData', []);
router::addRoute('GET', '/editShowUsers/:id', userController::class, 'editShow', []);
router::addRoute('GET', '/editUsers', userController::class, 'editData', []);
router::addRoute('GET', '/deleteUsers/:id', userController::class, 'deleteData', []);

//table user_group
router::addRoute('GET', '/usersGroup', userGroupController::class, 'index', []);
router::addRoute('GET', '/addGroup', userGroupController::class, 'addData', []);
router::addRoute('GET', '/editShowGroup/:id', userGroupController::class, 'editShow', []);
router::addRoute('GET', '/editGroup', userGroupController::class, 'editData', []);
router::addRoute('GET', '/deleteGroup/:id', userGroupController::class, 'deleteData', []);

//table vendor
router::addRoute('GET', '/vendor', vendorController::class, 'index', []);
router::addRoute('GET', '/addVendor', vendorController::class, 'addData', []);
router::addRoute('GET', '/editShowVendor/:id', vendorController::class, 'editShow', []);
router::addRoute('GET', '/editVendor', vendorController::class, 'editData', []);
router::addRoute('GET', '/deleteVendor/:id', vendorController::class, 'deleteData', []);

//tbl payment 
router::addRoute('GET', '/payment', paymentController::class, 'index', []);
router::addRoute('GET', '/addPayment', paymentController::class, 'addData', []);
router::addRoute('GET', '/editShowPayment/:id', paymentController::class, 'editShow', []);
router::addRoute('GET', '/editPayment', paymentController::class, 'editData', []);
router::addRoute('GET', '/deletePayment/:id', paymentController::class, 'deleteData', []);

//tbl customers
router::addRoute('GET', '/customer', customerController::class, 'index', []);
router::addRoute('GET', '/addCustomer', customerController::class, 'addData', []);
router::addRoute('GET', '/editShowCustomer/:id', customerController::class, 'editShow', []);
router::addRoute('GET', '/editCustomer', customerController::class, 'editData', []);
router::addRoute('GET', '/deleteCustomer/:id', customerController::class, 'deleteData', []);

//tbl service
router::addRoute('GET', '/service', serviceController::class, 'index', []);
router::addRoute('GET', '/addService', serviceController::class, 'addData', []);
router::addRoute('GET', '/editShowService/:id', serviceController::class, 'editShow', []);
router::addRoute('GET', '/editService', serviceController::class, 'editData', []);
router::addRoute('GET', '/deleteService/:id', serviceController::class, 'deleteData', []);

//tbl service order
router::addRoute('GET', '/serviceOrder', serviceOrderController::class, 'index', []);
router::addRoute('GET', '/addServiceOrder', serviceOrderController::class, 'addData', []);
router::addRoute('GET', '/editShowServiceOrder/:id', serviceOrderController::class, 'editShow', []);
router::addRoute('GET', '/editServiceOrder', serviceOrderController::class, 'editData', []);
router::addRoute('GET', '/deleteServiceOrder/:id', serviceOrderController::class, 'deleteData', []);

//tbl order
router::addRoute('GET', '/order', orderController::class, 'index', []);
router::addRoute('GET', '/addOrder', orderController::class, 'addData', []);
router::addRoute('GET', '/editShowOrder/:id', orderController::class, 'editShow', []);
router::addRoute('GET', '/editOrder', orderController::class, 'editData', []);
router::addRoute('GET', '/deleteOrder/:id', orderController::class, 'deleteData', []);

//tbl order detail
router::addRoute('GET', '/orderDetail', orderDetailController::class, 'index', []);
router::addRoute('GET', '/addOrderDetail', orderDetailController::class, 'addData', []);
router::addRoute('GET', '/editShowOrderDetail/:id', orderDetailController::class, 'editShow', []);
router::addRoute('GET', '/editOrderDetail', orderDetailController::class, 'editData', []);
router::addRoute('GET', '/deleteOrderDetail/:id', orderDetailController::class, 'deleteData', []);


router::run();