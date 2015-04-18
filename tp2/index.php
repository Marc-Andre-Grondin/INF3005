<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors','on');

$db = mysqli_connect("localhost", 'root', 'bofetkoi', 'test');

require_once('header.php');
$action = (isset($_GET['action']) ? $_GET['action'] : '');

if(!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
	switch($action){
		case 'register' : 	require_once('register.php');
							break;
		default			:	require_once('login.php');
							break;
	}
} else {
	switch($action){
		case 'logout'	:	require_once('logout.php');
							break;
		case 'profile'	:	require_once('profile.php');
							break;
		default			:	require_once('homepage.php');
							break;
	}
}

require_once('footer.php');

mysqli_close($db);

?>