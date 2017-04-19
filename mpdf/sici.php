<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_sici = "localhost";
$database_sici = "k8w45fac_sici";
$username_sici = "k8w45fac_sici";
$password_sici = "Qwerty123";
$sici = mysql_connect($hostname_sici, $username_sici, $password_sici) or trigger_error(mysql_error(),E_USER_ERROR); 
?>