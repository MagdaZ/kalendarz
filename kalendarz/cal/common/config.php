<?php

	require_once('../codebase/connector/db_sqlite3.php');
	
	// SQLite
	$dbtype = "SQLite3";
    $res = new SQLite3(dirname(__FILE__)."/database.sqlite");
	//$res = new SQLite3(dirname(__FILE__)."/calendar.sqlite");

	// Mysql
	// $dbtype = "MySQL";
	// $res=mysql_connect("192.168.1.251", "scheduler", "scheduler");
	// mysql_select_db("schedulertest");


?>