<?php

if(!empty($_POST)){
	$user = $_POST['username'];
	$pass = $_POST['password'];

	$sql = "SELECT count(*) as nb, u_id FROM user WHERE username = '$user' AND password = '$pass'";

	$result = mysqli_query($db, $sql);
	$result = mysqli_fetch_assoc($result);

	if($result['nb'] == 1){
		session_start();
		$_SESSION['logged_in'] = 1;
		$_SESSION['uid'] = $result['u_id'];

		header('Location: index.php');
		exit;
	}
}

echo 	"<script>
			function valider(form){
				var ok = true;

				if(!form.username.value || form.username.length === 0){
					ok = false;
					alert('Veuillez entrer un nom d\'usager sous forme de courriel.');
				} else if(!form.password.value || form.password.value.length < 6){
					ok = false;
					alert('Veuillez entrer un mot de passe d\'au moins 6 charactères.');
				}

				return ok;
			}
		</script>
		<br><br>
		<form method='POST' onsubmit='return valider(this);'>
			<table style='width: 100%;'>
				<tr>
					<td>Nom d'usager : </td>
					<td><input type='email' id='username' name='username' /></td>
				</tr>
				<tr>
					<td>Mot de passe : </td>
					<td><input type='password' id='password' name='password' /></td>
				</tr>
				<tr>
					<td colspan='2'><br><input type='submit' value='Soumettre' /></td>
				</tr>
			</table>
		</form>
		<br><br>
		<p>Pas un membre? <a href='index.php?action=register'>Enregistrez-vous!</a></p>";

?>