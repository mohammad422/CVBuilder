<?php
require_once "Dbconnection.config.php";
$connection = mysqli_connect(DBHOST, DBUSER,DBPASS, DBNAME);
// check the health of the db connection
if (mysqli_connect_errno()) {
    die('can not connect to db');
}
