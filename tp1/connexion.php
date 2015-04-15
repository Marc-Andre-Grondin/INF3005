<?php 

if(!(isset($_POST['username']) && isset($_POST['password']))){
	if(!isset($_GET['new'])){
		echo "			<script>\n";
		echo "				function valider(form){\n";
		echo "					var ok = true;\n";
		echo "					if(form.username.value.length <6 || form.username.value.length > 25){\n";
		echo "						ok = false;\n";
		echo "						alert('Le nom d\'usager n\'est pas valide. Veuillez entrer de 6 à 25 caractères.');\n";
		echo "					}else if(form.password.value.length != 10){\n";
		echo "						ok = false;\n";
		echo "						alert('Le mot de passe doit être de 10 caractères.');\n";
		echo "					}\n";
		echo "					return ok;\n";
		echo "				}\n";
		echo "			</script>\n";
		echo "			<tr style='height: 100%; text-align: center'>\n";
		echo "				<td colspan='3'>\n";
		echo "					<p>Veuillez entrer votre nom d'usager et votre mot de passe</p>\n";
		echo " 					<form id='login_form' name='login_form' method='POST' onsubmit='valider(this)' action='index.php?action=connection&uid=".$_GET['uid']."'>\n";
		echo "						<label for='username'>Nom d'usager : </label><input id='username' name='username' type='text' value='' /><br /><br />\n";
		echo "						<label for='password'>Mot de passe : </label><input id='password' name='password' type='password' value='' /><br /><br />\n";
		echo "						<input type='submit' value='Soumettre' />\n";
		echo "					</form>\n";
		echo "				</td>\n";
		echo "			</tr>\n";
		echo "		</table>\n";
	}else{
		echo "			<tr style='min-height: 600px; height: 100%;'>\n";
		echo "				<td style='width: 10%;'>\n";
		echo "					<p>Veuillez entrer votre nom d\'usager et votre mot de passe</p>\n";
		echo "				</td>\n";
		echo "			</tr>\n";
		echo "			<tr>\n";
		echo "				<td colspan='3' style='text-align: center; height: 100px;'>\n";
		echo " 					&nbsp;\n";
		echo "				</td>\n";
		echo "			</tr>\n";
		echo "		</table>\n";
	}
}else {
	$result = mysqli_query($db, "SELECT count(*) as nb FROM test.user WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'");
	$nb = $result->fetch_row();

	if($nb[0] != 0){
		$result = mysqli_query($db, "SELECT * FROM test.user WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'");
		$membre = $result->fetch_row();

		$_GET['uid'] = $membre[0];

		$result->close();
	}else{
		session_destroy();
		$_POST['ok'] = false;
		unset($_POST['username']);
		unset($_POST['password']);
		header('Location: index.php?action=connection');
	}

	header('Location: index.php?uid='.$_GET['uid']);
}
?>