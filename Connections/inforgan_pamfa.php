<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_pamfa = "localhost";
$database_pamfa = "iotechda_pamfa";
$username_pamfa = "iotechda_pamfa";
$password_pamfa = "049msE8jcW";
$inforgan_pamfa = mysql_pconnect($hostname_pamfa, $username_pamfa, $password_pamfa) or trigger_error(mysql_error(),E_USER_ERROR); 
?>