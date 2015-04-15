<?php

if(!empty($_POST)){
	$user = mysqli_real_escape_string($db, $_POST['username']);
	$pass = mysqli_real_escape_string($db, $_POST['password']);
	$nom = mysqli_real_escape_string($db, $_POST['nom']);
	$prenom = mysqli_real_escape_string($db, $_POST['prenom']);
	$adresse = mysqli_real_escape_string($db, $_POST['adresse']);
	$photo = mysqli_real_escape_string($db, $_POST['photo']);
	$formation = mysqli_real_escape_string($db, $_POST['formation']);
	$interets = mysqli_real_escape_string($db, $_POST['interets']);
	$public = mysqli_real_escape_string($db, $_POST['isPublic']);

	$sql = "INSERT INTO user 
			VALUES(
				'',
				'$user',
				'$pass',
				'$adresse',
				'$nom',
				'$prenom',
				'$photo',
				'$formation',
				'$interets',
				'$public'
			)";

	$result = mysqli_query($db, $sql);
	
	if($result){
		session_start();
		$_SESSION['logged_in'] = 1;

		header('Location: index.php');
	}
}

echo 	"<script>
			function valider(form){
				var ok = true;

				if(!form.username.value || form.username.value.length === 0){
					ok = false;
					alert('Veuillez entrer un nom d\'usager sous forme de courriel.');
				} else if(!form.password.value || form.password.value.length < 6){
					ok = false;
					alert('Veuillez entrer un mot de passe d\'au moins 6 charactères.');
				} else if(!form.confPassword.value || form.confPassword.value != form.password.value){
					ok = false;
					alert('Vos mots de passe ne sont pas pareil. Veuillez réinscrire vos mots de passe.');
				} else if(!form.nom.value || form.nom.value.length === 0){
					ok = false;
					alert('Veuillez entrer votre nom.');
				} else if(!form.prenom.value || form.prenom.value.length === 0){
					ok = false;
					alert('Veuillez entrer votre prénom.');
				} else if(!form.adresse.value || form.adresse.value.length === 0){
					ok = false;
					alert('Veuillez entrer votre adresse.');
				} else if(!form.formation.value || form.formation.value.length === 0){
					ok = false;
					alert('Veuillez entrer vos formations.');
				} else if(!form.interets.value || form.interets.value.length === 0){
					ok = false;
					alert('Veuillez entrer vos intérêts.');
				}

				return ok;
			}
		</script>
		<br><br>
		<p style='font-size: large;'>Formulaire d'inscription pour nouveau membre</p>
		<form name='registerForm' id='registerForm' method='POST' onsubmit='return valider(this);'>
			<table style='width: 100%;'>
				<tr>
					<td style='width: 50%;'>Nom d'usager : </td>
					<td><input type='email' id='username' name='username' style='width: 100%;'></td>
				</tr>
				<tr>
					<td>Mot de passe : </td>
					<td><input type='password' id='password' name='password' style='width: 100%;'></td>
				</tr>
				<tr>
					<td>Confirmer mot de passe : </td>
					<td><input type='password' id='confPassword' name='confPassword' style='width: 100%;'></td>
				</tr>
				<tr>
					<td>Nom : </td>
					<td><input type='text' id='nom' name='nom' style='width: 100%;'></td>
				</tr>
				<tr>
					<td>Prénom : </td>
					<td><input type='text' id='prenom' name='prenom' style='width: 100%;'></td>
				</tr>
				<tr>
					<td>Adresse : </td>
					<td><textarea id='adresse' name='adresse' style='width: 100%;' value=''></textarea></td>
				</tr>
				<tr>
					<td>Photo : </td>
					<td><input type='file' id='photo' name='photo' style='width: 100%;'></td>
				</tr>
				<tr>
					<td>Formations : </td>
					<td><textarea id='formation' name='formation' value='' style='width: 100%;'></textarea></td>
				</tr>
				<tr>
					<td>Champs d'intérêts : </td>
					<td><input type='text' id='interets' name='interets' style='width: 100%;'></td>
				</tr>
				<tr>
					<td>Est-ce que vos informations peuvent être divulguées à tous? </td>
					<td>
						<input type='radio' id='isPublic' name='isPublic' value='Y' checked>Oui&nbsp;&nbsp;&nbsp;
						<input type='radio' id='isPublic' name='isPublic' value='N'>Non
					</td>
				</tr>
				<tr>
					<td colspan='2'><br><input type='submit' value='Soumettre' style='font-size: larger;'></td>
				</tr>
			</table>
		</form>";

?>
