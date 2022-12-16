<?php

namespace staditek\TugasAkhir\App\core;

class view
{
    public static function View(string $view = "", $data = [])
    {
        require_once __DIR__ . '/../view/' . $view . '.php';
    }
}