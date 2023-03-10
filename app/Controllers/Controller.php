<?php

namespace App\Controllers;

abstract class Controller
{
    protected $request;

    public function __construct()
    {
        $this->request = $_REQUEST;
    }

    public function render($view, $data = [])
    {
        extract($data);

        include APP_ROOT .  '/views/header.php';
        require_once APP_ROOT .  "/views/$view.php";
        include APP_ROOT .  '/views/footer.php';
    }
}
