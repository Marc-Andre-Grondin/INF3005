<?php

if(!empty($_POST)){
	$user = mysqli_real_escape_string($db, $_POST['username']);
	$pass = mysqli_real_escape_string($db, $_POST['password']);
	$nom = mysqli_real_escape_string($db, $_POST['nom']);
	$prenom = mysqli_real_escape_string($db, $_POST['prenom']);
	$adresse = mysqli_real_escape_string($db, $_POST['adresse']);
	$photo = mysqli_real_escape_string($db, $_POST['photo']);
	$formation = mysqli_real_escape_string($db, $_POST['formations']);
	$interets = mysqli_real_escape_string($db, $_POST['interets']);
	$public = (int)$_POST['is_public'];

	$sql = "UPDATE user 
			SET
				username = '$user',
				password = '$pass',
				adresse = '$adresse',
				nom = '$nom',
				prenom = '$prenom',
				photo = '$photo',
				formations = '$formation',
				interets = '$interets',
				is_public = '$public'
			WHERE u_id = ".(int)$_SESSION['uid'];

	$result = mysqli_query($db, $sql);
	
	header('Location: index.php');
	exit;
}

$sql = "SELECT * FROM user WHERE u_id = ". (int)$_SESSION['uid'];

$userDetails = mysqli_query($db, $sql);
$userDetails = mysqli_fetch_assoc($userDetails);
$userDetails['interets'] = explode(',',$userDetails['interets']);

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
				} else if(!form.photo.value || form.photo.value.length === 0){
					ok = false;
					alert('Veuillez entrer le lien vers votre photo.');
				} else if(!form.adresse.value || form.adresse.value.length === 0){
					ok = false;
					alert('Veuillez entrer votre adresse.');
				} else if(!form.formations.value || form.formations.value.length === 0){
					ok = false;
					alert('Veuillez entrer vos formations.');
				} else if(!form.interet1.value || form.interet1.value.length === 0){
					ok = false;
					alert('Veuillez entrer votre premier intérêt.');
				} else if(!form.interet2.value || form.interet2.value.length === 0){
					ok = false;
					alert('Veuillez entrer votre deuxième intérêt.');
				} else if(!form.interet3.value || form.interet3.value.length === 0){
					ok = false;
					alert('Veuillez entrer votre troisième intérêt.');
				} else if(!form.interet4.value || form.interet4.value.length === 0){
					ok = false;
					alert('Veuillez entrer votre quatrième intérêt.');
				}else if(form.is_public.value.length === 0){
					ok = false;
					alert('Veuillez choisir si vos informations sont publiques ou privées.');
				}

				if(ok){
					document.getElementById('interets').value = document.getElementById('interet1').value+','+document.getElementById('interet2').value+','+document.getElementById('interet3').value+','+document.getElementById('interet4').value;
				}

				return ok;
			}
		</script>
		<br><br>
		<p style='font-size: large;'>Formulaire d'inscription pour nouveau membre</p>
		<form name='profileForm' id='profileForm' method='POST' onsubmit='return valider(this);' novalidate='novalidate'>
			<input type='hidden' value='' name='interets' id='interets'>
			<table style='width: 100%;'>
				<tr>
					<td style='width: 25%;'>Nom d'usager : </td>
					<td><input type='email' id='username' name='username' style='width: 75%;' value='".$userDetails['username']."'></td>
				</tr>
				<tr>
					<td>Mot de passe : </td>
					<td><input type='password' id='password' name='password' style='width: 75%;' value='".$userDetails['password']."'></td>
				</tr>
				<tr>
					<td>Confirmer mot de passe : </td>
					<td><input type='password' id='confPassword' name='confPassword' style='width: 75%;' value='".$userDetails['password']."'></td>
				</tr>
				<tr>
					<td>Nom : </td>
					<td><input type='text' id='nom' name='nom' style='width: 75%;' value='".$userDetails['nom']."'></td>
				</tr>
				<tr>
					<td>Prénom : </td>
					<td><input type='text' id='prenom' name='prenom' style='width: 75%;' value='".$userDetails['prenom']."'></td>
				</tr>
				<tr>
					<td>Adresse : </td>
					<td><textarea id='adresse' name='adresse' style='width: 75%;'>".$userDetails['adresse']."</textarea></td>
				</tr>
				<tr>
					<td>Photo : </td>
					<td><input type='text' id='photo' name='photo' style='width: 75%;' value='".$userDetails['photo']."'></td>
				</tr>
				<tr>
					<td>Formations : </td>
					<td><textarea id='formations' name='formations' style='width: 75%;'>".$userDetails['formations']."</textarea></td>
				</tr>
				<tr>
					<td>Intérêts : </td>
					<td>
						#1 : <input type='text' id='interet1' name='interet1' value='".$userDetails['interets'][0]."' style='width: 75%;'><br>
						#2 : <input type='text' id='interet2' name='interet2' value='".$userDetails['interets'][1]."' style='width: 75%;'><br>
						#3 : <input type='text' id='interet3' name='interet3' value='".$userDetails['interets'][2]."' style='width: 75%;'><br>
						#4 : <input type='text' id='interet4' name='interet4' value='".$userDetails['interets'][3]."' style='width: 75%;'>
					</td>
				</tr>
				<tr>
					<td>Est-ce que vos informations peuvent être divulguées à tous? </td>
					<td>
						<input type='radio' id='is_public' name='is_public' value='1' ";

if($userDetails['is_public']){
	echo 'checked="checked"';
}

echo "																							>Oui&nbsp;&nbsp;&nbsp;
						<input type='radio' id='is_public' name='is_public' value='0' ";

if(!$userDetails['is_public']){
	echo 'checked="checked"';
}

echo 																							">Non
					</td>
				</tr>
				<tr>
					<td colspan='2'><br><input type='submit' value='Soumettre' style='font-size: larger;'></td>
				</tr>
			</table>
		</form>";
?>