<?php
	$host = 'db';
	$main_db_name ='dbname';
	$main_db_username ='dbuser';
	$main_db_password ='your_secure_password_here';  

	$dbconn = new PDO('mysql:host='.$host.';dbname='.$main_db_name.'',$main_db_username,$main_db_password);
	$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>