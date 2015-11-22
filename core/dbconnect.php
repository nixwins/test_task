<?php

class DBConnect
{
	const _dbDriver			= 'mysql';
	const DB_HOST			= 'localhost';
	const DB_USER			= 'root';	
	const DB_PASS			= 'birone89';
	const DB_NAME			= 'test_task';
	private static  $_db	= null;
	
	
	private function __clone(){}
	private function __construct(){}
	
	public static function getInstance() {
	  if (self::$_db == null) { 
		try {
		  self::$_db = new PDO('mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME, self::DB_USER, self::DB_PASS);
		} catch (PDOException $e) {
		  die('<h1>Sorry. The Database connection is temporarily unavailable.</h1>');
		} 
		return self::$_db;
		
	  } else {
		return self::$_db;
	  } 
    }
}