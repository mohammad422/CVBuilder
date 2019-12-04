<?php
require_once "Config/Config.php";
session_start();

if (isset($_SESSION["user_id"])){
    header("location:Controllers/Dashboard.controller.php");
}

require_once "Views/Index.view.php";
//first
//second