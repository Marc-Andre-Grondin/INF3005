<?php 

$membre = array();

$sql = "SELECT * FROM test.user;";

$result = mysqli_query($db, $sql);

$membre = $result->fetch_assoc();

if(!isset($_POST['update']) || !$_POST['update']){
    echo "			<script>\n";
    echo "				function valider(form){\n";
    echo "					var ok = true;\n";
    echo "					if(form.username.value.length <6 || form.username.value.length > 25){\n";
    echo "						ok = false;\n";
    echo "						alert('Le nom d\'usager n\'est pas valide. Veuillez entrer de 6 à 25 caractères.');\n";
    echo "					}else if(form.password.value.length != 10){\n";
    echo "						ok = false;\n";
    echo "						alert('Le mot de passe doit être de 10 caractères.');\n";
    echo "					}else if(form.email.value.length != 0){\n";
    echo "						ok = false;\n";
    echo "						alert('Veuillez entrer votre adresse courriel.');\n";
    echo "					}else if(form.adresse.value.length != 0){\n";
    echo "						ok = false;\n";
    echo "						alert('Veuillez entrer une adresse.');\n";
    echo "					}else if(form.telephone.value.length != 12){\n";
    echo "						ok = false;\n";
    echo "						alert('Le numéro de téléphone doit être de 8 caractères (ex : 456-7890).');\n";
    echo "					}\n";
    echo "                  if(ok){ document.getElementById('update').value = true;}\n";
    echo "					return ok;\n";
    echo "				}\n";
    echo "			</script>\n";
    echo "			<tr style='min-height: 600px; height: 100%;'>\n";
    echo "				<td colspan='4'>\n";
    echo "					<form id='profile_form' name='profile_form' onsubmit='valider(this)' method='post' action='index.php?action=profile&uid=".$_GET['uid']."'>\n";
    echo "                      <input id='update' name='update' value='".$membre['id']."' type='hidden'/>\n";
    echo "                      <label for='username'>Nom d'usager : </label><input id='username' name='username' type='text' value='".$membre['username']."' /><br />\n";
    echo "                      <label for='pass'>Mot de passe : </label><input id='pass' name='pass' type='password' value='".$membre['password']."' /><br />\n";
    echo "                      <label for='email'>Courriel : </label><input id='email' name='email' type='email' value='".$membre['courriel']."' /><br />\n";
    echo "                      <label for='adresse'>Adresse : </label><input id='adresse' name='adresse' type='text' value='".$membre['adresse']."' /><br />\n";
    echo "                      <label for='tel'>Téléphone : </label><input id='tel' name='tel' type='text' value='".$membre['telephone']."' /><br /><br />\n";
    echo "                      <input type='submit' value='Soumettre'/>\n";
    echo "                  </form>\n";
    echo "				</td>\n";
    echo "			</tr>\n";
    echo "		</table>\n";
} else{
    update();
}

function update(){
    global $db;

    $sql = "UPDATE `user` 
            SET 
                username='".$_POST['username']."', 
                password='".$_POST['pass']."', 
                courriel='".$_POST['email']."', 
                adresse='".$_POST['adresse']."', 
                telephone='".$_POST['tel']."' 
            WHERE id = ".$_GET['uid'];

    mysqli_query($db, $sql);
    header('Location: index.php?uid='.$_GET['uid']);
}
?>