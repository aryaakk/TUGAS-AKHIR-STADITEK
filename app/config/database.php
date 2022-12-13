<?php

namespace staditek\TugasAkhir\App\config;


class database
{
    protected static $hostname = "localhost";
    protected static $username = "root";
    protected static $password = "";
    protected static $database = "db_anipets";

    public static $conn = null;

    public function __construct()
    {
        database::setConnection();
    }

    public static function setConnection()
    {
        self::$conn = new \PDO(
            "mysql:host=" . self::$hostname . ";dbname=" . self::$database,
                self::$username,
                self::$password
        );
        self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}