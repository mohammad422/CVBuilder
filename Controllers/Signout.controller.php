<?php
require "../Models/Login.model.php";

session_start();
logOut();

header("location:../index.php");
exit();