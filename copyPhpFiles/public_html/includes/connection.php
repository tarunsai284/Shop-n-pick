<?php
define("DB_SERVER","mysql.hostinger.in");
define("DB_USER", "u611746397_user");
define("DB_PASS", "snpuser@pehu");
define("DB_NAME", "u611746397_snp");
// 1. Create a database connection
$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if (!$connection) {
	die("Database connection failed: " . mysql_error());
}
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>