<?php
require_once root . "/DB/db.php";

class indexController
{
    public function index()
    {
        require_once root . "/Views/index.php";
    }

    public function logIn()
    {
        require_once root . "/Views/login.php";
    }
}
