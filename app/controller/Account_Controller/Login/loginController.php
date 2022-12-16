<?php

namespace staditek\TugasAkhir\App\controller\Account_Controller\Login;

use staditek\TugasAkhir\App\core\router;
use staditek\TugasAkhir\App\core\view;
use staditek\TugasAkhir\App\model\Customer\customerModel;
use staditek\TugasAkhir\App\model\Users\usersModel;


class loginController
{
    public static $model_customer;
    public static $model_user;

    public function __construct()
    {
        self::$model_customer = new customerModel();
        self::$model_user = new usersModel();
    }

    public function login()
    {
        $data['title'] = "Sign In";
        $data['for'] = 'sign_in';
        view::View('Sign/sign', $data);
    } 

    public function LoginPost()
    {
        if ($user = self::$model_customer->findByEmail($_POST['email']) == true) {
            $users = self::$model_customer->findByEmail($_POST['email']);
            if ($users && password_verify($_POST['password'], $users->password)) {
                $_SESSION['auth'] = $users;
                echo "<script>alert('LOGIN BERHASIL');
            window.location.href = '" . router::url('/home') . "';
            </script>";
            } else {
                echo "<script>alert('LOGIN GAGAL!!EMAIL ATAU PASSWORD SALAH!');
            window.location.href = '" . router::url('/login') . "';
            </script>";
            }
        } else {
            $users = self::$model_user->findByEmail($_POST['email']);
            if ($users && password_verify($_POST['password'], $users->password)) {
                $_SESSION['auth'] = $users;
                echo "<script>alert('LOGIN BERHASIL');
            window.location.href = '" . router::url('/dashboard') . "';
            </script>";
            } else {
                echo "<script>alert('LOGIN GAGAL!!EMAIL ATAU PASSWORD SALAH!');
            window.location.href = '" . router::url('/login') . "';
            </script>";
            }

        }
    }

    public function logout()
    {
        session_destroy();
        echo "<script>alert('LOGOUT BERHASIL');</script>";
        header("location: " . router::url('/login'));
    }
}