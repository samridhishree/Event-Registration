<?php
$user_name = 'rohit' ;
$password = 'reg' ;
if(!isset($_SERVER['PHP_AUTH_PW']) || !isset($_SERVER['PHP_AUTH_USER']) || ($_SERVER['PHP_AUTH_USER'] != $user_name) || ($_SERVER['PHP_AUTH_PW'] != $password))
{
	header('HTTP/1.1 401 Unauthorized') ;
	header('WWW-Authenticate:Basic Realm= "Gravitas" ') ;
	exit ('<h2>You don\'t have permission to access this page</h2>');
}
?>