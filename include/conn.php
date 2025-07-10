<?php
	$host = 'db';
	$main_db_name ='database';
	$main_db_username ='user';
	$main_db_password ='pass';  

	$dbconn = new PDO('mysql:host='.$host.';dbname='.$main_db_name.'',$main_db_username,$main_db_password);
	$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>