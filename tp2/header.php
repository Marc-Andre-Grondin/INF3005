<?php

echo 	"<!DOCTYPE html>
		<html>
			<head>
				<meta charset='UTF-8'>
				<title>TP2 - INF3005</title>
				<style>
					html, body {
					   margin:0;
					   padding:0;
					   height:100%;
					}

					table {
						margin: 0;
						padding: 0;
						border-collapse: collapse;
					}
				</style>
			</head>
			<body style='width: 100%;'>
				<div style='width: 100%; height: 100%;'>
				<table style='width: 100%; height:100%; border-collapse: collapse;'>
					<tr style='background-color: #97ABBF'>
						<th><a href='index.php?action=homepage'><button>Acceuil</button></a></th>";

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){				
	echo "						<th><a href='index.php?action=profile'><button>Profile</button></a></th>
								<th><a href='index.php?action=logout'><button>Logout</button></a></th>";
}else{
	echo "						<th colspan='2'><a href='index.php?action=login'><button>Login</button></a></th>";
}

echo "				</tr>
					<tr style='height: 10px; background-image: url(\"image/bg_sep.jpg\")'><td colspan='3'></td></tr>
					<tr>
						<td colspan='3' style='text-align: center; vertical-align: center;'>
	 	";

?>