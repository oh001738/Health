<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_food = "localhost";
$database_food = "food";
$username_food = "root";
$password_food = "35900";
$food = mysql_pconnect($hostname_food, $username_food, $password_food) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names utf8");
?>