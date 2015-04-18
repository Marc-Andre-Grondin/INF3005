<?php

if(!isset($db)){
	$db = mysqli_connect("localhost", 'root', 'bofetkoi', 'test');
}

if(!isset($_SESSION)){
	session_start();
}

if(isset($_GET['rid']) && $_GET['rid']){
	mysqli_query($db, "INSERT INTO user_relations VALUES('', ".(int)$_SESSION['uid'].", ".(int)$_GET['rid'].")");
	header('Location: index.php');
	exit;

}

$sql = "SELECT u.u_id, u.nom, u.prenom, u.photo, u.interets FROM user u WHERE u.is_public = 1 AND u.u_id <> ".(int)$_SESSION['uid'];

$result = mysqli_query($db, $sql);
$nbCon = 0;

if($result){
	while($tempResult = mysqli_fetch_assoc($result)){
		if(hasCommonInterests($_SESSION['uid'], $tempResult['u_id']) && !isARelation($_SESSION['uid'], $tempResult['u_id'])){
			echo "<div id='div".$tempResult['u_id']."'>
					<img src='".$tempResult['photo']."' alt='Sans image' style='width: 100px; height: 100px; min-width: 100px; min-height: 100px;'/><br>
					<p>".$tempResult['nom'].", ".$tempResult['prenom']."</p>
					<button onclick='ajouter(".$tempResult['u_id'].")'>Ajouter</button><br><br>
					</div>";
			++$nbCon;
		}
	}
}

if(!$nbCon){
	echo "<p>Aucun connivents ne correspondent à vos intérêts.</p>";
}

function hasCommonInterests($user, $rel){
	global $db;

	$userInterests = mysqli_fetch_assoc(mysqli_query($db, "SELECT interets FROM user WHERE u_id = ".(int)$user));
	$userInterests = explode(',', $userInterests['interets']);
	$relInterests = mysqli_fetch_assoc(mysqli_query($db, "SELECT interets FROM user WHERE u_id = ".(int)$rel));
	$relInterests = explode(',', $relInterests['interets']);

	foreach($relInterests as $interet){
		if(in_array($interet, $userInterests)){
			return true;
		}
	}

	return false;
}

function isARelation($user, $rel){
	global $db;

	$nb = mysqli_query($db, "SELECT count(*) AS nb FROM user_relations WHERE u_id = ".$user." AND r_id = ".$rel);
	
	if(is_object($nb)){
		$nb = mysqli_fetch_assoc($nb);

		return $nb['nb'] <> 0;
	}

	return false;
}
?>