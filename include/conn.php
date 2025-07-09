<?php
	$host = 'db';
	$main_db_name ='boostrap';
	$main_db_username ='user1';
	$main_db_password ='user1.pa55';  

	$dbconn = new PDO('mysql:host='.$host.';dbname='.$main_db_name.'',$main_db_username,$main_db_password);
	$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>