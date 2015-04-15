<?php 

if(isset($_POST['marges'])){
	$sql = "INSERT INTO `commandes` (user_id, dimension, materiel, modele, marges, couleur) 
			VALUES (
				".(int)$_GET['uid'].",
				'".$_POST['dimension']."',
				'".$_POST['materiel']."',
				'".$_POST['modele']."',
				'".$_POST['marges']."',
				'".$_POST['couleur']."'
			)";

	mysqli_query($db, $sql);
	header('Location: index.php?action=facture&uid='.$_GET['uid']);
}

echo "		<script>
				$(document).ready(function(){
				    updateSelect();
				    updateModele();
				}); 

				function appercu(input){
					if (input.files && input.files[0]){
			       		var reader = new FileReader();
			       		reader.onload = function(e) {
			           		$('#limage').attr('src', e.target.result);
			       		}

			       		reader.readAsDataURL(input.files[0]);
			       }
			    }

			    function updateMarges(){
			    	var m_haut = document.getElementById('marges_h').value*12+'px';
			    	var m_bas = document.getElementById('marges_b').value*12+'px';
			    	var m_gauche = document.getElementById('marges_g').value*12+'px';
			    	var m_droite = document.getElementById('marges_d').value*12+'px';
			    	var c_haut = document.getElementById('couleur_h').value;
			    	var c_bas = document.getElementById('couleur_b').value;
			    	var c_gauche = document.getElementById('couleur_g').value;
			    	var c_droite = document.getElementById('couleur_d').value;
			    	var long = document.getElementById('longueur').value;
			    	var larg = document.getElementById('largeur').value;

			    	document.getElementById('limage').style.borderTop = m_haut+' solid '+c_haut;
			    	document.getElementById('limage').style.borderBottom = m_bas+' solid '+c_bas;
			    	document.getElementById('limage').style.borderLeft = m_gauche+' solid '+c_gauche;
			    	document.getElementById('limage').style.borderRight = m_droite+' solid '+c_droite;

			    	document.getElementById('marges').value = m_haut+' '+m_droite+' '+m_bas+' '+m_gauche+'';
			    	document.getElementById('dimension').value = long+' x '+larg;
			    	document.getElementById('couleur').value = c_haut+' '+c_droite+' '+c_bas+' '+c_gauche+'';
			    }

			    //aurait pu être plus beau...
			    function updateSelect(){
			    	var opt_h = document.createElement('option');
			    	var opt_b = document.createElement('option');
			    	var opt_g = document.createElement('option');
			    	var opt_d = document.createElement('option');

		    		opt_h.value = 'brown';
		    		opt_h.innerHTML = 'Brun';
		    		opt_b.value = 'brown';
		    		opt_b.innerHTML = 'Brun';
		    		opt_g.value = 'brown';
		    		opt_g.innerHTML = 'Brun';
		    		opt_d.value = 'brown';
		    		opt_d.innerHTML = 'Brun';

		    		couleur_h.appendChild(opt_h);
					couleur_b.appendChild(opt_b);
					couleur_g.appendChild(opt_g);
					couleur_d.appendChild(opt_d);

					opt_h = document.createElement('option');
					opt_b = document.createElement('option');
					opt_g = document.createElement('option');
					opt_d = document.createElement('option');

					opt_h.value = 'black';
		    		opt_h.innerHTML = 'Noir';
		    		opt_b.value = 'black';
		    		opt_b.innerHTML = 'Noir';
		    		opt_g.value = 'black';
		    		opt_g.innerHTML = 'Noir';
		    		opt_d.value = 'black';
		    		opt_d.innerHTML = 'Noir';

		    		couleur_h.appendChild(opt_h);
					couleur_b.appendChild(opt_b);
					couleur_g.appendChild(opt_g);
					couleur_d.appendChild(opt_d);

					opt_h = document.createElement('option');
					opt_b = document.createElement('option');
					opt_g = document.createElement('option');
					opt_d = document.createElement('option');

					opt_h.value = 'gray';
		    		opt_h.innerHTML = 'Gris';
		    		opt_b.value = 'gray';
		    		opt_b.innerHTML = 'Gris';
		    		opt_g.value = 'gray';
		    		opt_g.innerHTML = 'Gris';
		    		opt_d.value = 'gray';
		    		opt_d.innerHTML = 'Gris';

		    		couleur_h.appendChild(opt_h);
					couleur_b.appendChild(opt_b);
					couleur_g.appendChild(opt_g);
					couleur_d.appendChild(opt_d);

					opt_h = document.createElement('option');
					opt_b = document.createElement('option');
					opt_g = document.createElement('option');
					opt_d = document.createElement('option');

					opt_h.value = 'green';
		    		opt_h.innerHTML = 'Vert';
		    		opt_b.value = 'green';
		    		opt_b.innerHTML = 'Vert';
		    		opt_g.value = 'green';
		    		opt_g.innerHTML = 'Vert';
		    		opt_d.value = 'green';
		    		opt_d.innerHTML = 'Vert';

		    		couleur_h.appendChild(opt_h);
					couleur_b.appendChild(opt_b);
					couleur_g.appendChild(opt_g);
					couleur_d.appendChild(opt_d);

		    		opt_h.value = 'white';
		    		opt_h.innerHTML = 'Blanc';
		    		opt_b.value = 'white';
		    		opt_b.innerHTML = 'Blanc';
		    		opt_g.value = 'white';
		    		opt_g.innerHTML = 'Blanc';
		    		opt_d.value = 'white';
		    		opt_d.innerHTML = 'Blanc';

		    		couleur_h.appendChild(opt_h);
					couleur_b.appendChild(opt_b);
					couleur_g.appendChild(opt_g);
					couleur_d.appendChild(opt_d);

					opt_h = document.createElement('option');
					opt_b = document.createElement('option');
					opt_g = document.createElement('option');
					opt_d = document.createElement('option');

					opt_h.value = 'blue';
		    		opt_h.innerHTML = 'Bleu';
		    		opt_b.value = 'blue';
		    		opt_b.innerHTML = 'Bleu';
		    		opt_g.value = 'blue';
		    		opt_g.innerHTML = 'Bleu';
		    		opt_d.value = 'blue';
		    		opt_d.innerHTML = 'Bleu';

		    		couleur_h.appendChild(opt_h);
					couleur_b.appendChild(opt_b);
					couleur_g.appendChild(opt_g);
					couleur_d.appendChild(opt_d);

					opt_h = document.createElement('option');
					opt_b = document.createElement('option');
					opt_g = document.createElement('option');
					opt_d = document.createElement('option');

					opt_h.value = 'green';
		    		opt_h.innerHTML = 'Vert';
		    		opt_b.value = 'green';
		    		opt_b.innerHTML = 'Vert';
		    		opt_g.value = 'green';
		    		opt_g.innerHTML = 'Vert';
		    		opt_d.value = 'green';
		    		opt_d.innerHTML = 'Vert';

		    		couleur_h.appendChild(opt_h);
					couleur_b.appendChild(opt_b);
					couleur_g.appendChild(opt_g);
					couleur_d.appendChild(opt_d);

					opt_h = document.createElement('option');
					opt_b = document.createElement('option');
					opt_g = document.createElement('option');
					opt_d = document.createElement('option');

					opt_h.value = 'red';
		    		opt_h.innerHTML = 'Rouge';
		    		opt_b.value = 'red';
		    		opt_b.innerHTML = 'Rouge';
		    		opt_g.value = 'red';
		    		opt_g.innerHTML = 'Rouge';
		    		opt_d.value = 'red';
		    		opt_d.innerHTML = 'Rouge';
		    		
		    		couleur_h.appendChild(opt_h);
					couleur_b.appendChild(opt_b);
					couleur_g.appendChild(opt_g);
					couleur_d.appendChild(opt_d);
			    }

				function updateModele(){
					var cha;
					var valeur = document.getElementById('couleur_h').value.charAt(0) + document.getElementById('couleur_b').value.charAt(0) + document.getElementById('couleur_g').value.charAt(0) + document.getElementById('couleur_d').value.charAt(0);

					if(document.getElementById('materiel_b').checked){
						cha = 'B';
					}else{
						cha = 'M';
					}

					document.getElementById('modele').value = cha+valeur;
				}

				function enrAppercu(){
					localStorage.setItem('appercu', document.getElementById('limage').src);
				}
			</script>
			<tr style='min-height: 600px; height: 100%;'>
				<td colspan='4'>
					<table style='width: 100%;' onchange='updateModele()'>
						<tr>
							<td style='width: 50%;'>
								<form id='commande_form' name='commande_form' method='POST' onsubmit='enrAppercu()' action='index.php?action=commande&uid=".$_GET['uid']."'>
	                  			    <input type='hidden' name='uid' id='uid' value='".$_GET['uid']."' />
	                  			    <p>Dimension (longueur x largeur en pouces) : </p><input id='dimension' name='dimension' type='hidden' /><br />
	                  			    <input id='longueur' name='longueur' type='text' style='width: 50px;' required/> x 
	                  			    <input id='largeur' name='largeur' type='text' style='width: 50px;' required/><br /><br />
	                  			    <label for='materiel'>Matériel : </label><br />
	                  			    <input id='materiel_b' name='materiel' type='radio' value='Bois' onchange='updateModele()' /> Bois 
	                  			    <input id='materiel_m' name='materiel' type='radio' value='Métal' onchange='updateModele()' /> Métal<br /><br />
	                    			<label for='modele'>Modèle : </label><br /><input id='modele' name='modele' type='text' readonly='readonly'/><br /><br />
	                      			<p>Marges (en pouces) : </p><input id='marges' name='marges' type='hidden' />
	                      			Haut : <input id='marges_h' name='marges_h' type='text' style='width: 50px;' onchange='updateMarges()' value='0' required/>
	                      			Bas : <input id='marges_b' name='marges_b' type='text' style='width: 50px;' onchange='updateMarges()' value='0' required/>
	                      			Gauche : <input id='marges_g' name='marges_g' type='text' style='width: 50px;' onchange='updateMarges()' value='0' required/>
	                      			Droite : <input id='marges_d' name='marges_d' type='text' style='width: 50px;' onchange='updateMarges()' value='0' required/><br /><br />
	                      			<p>Couleur : </p><input id='couleur' name='couleur' type='hidden' /><br />
	                      			Haut : <select id='couleur_h' name='couleur_h' type='text' onchange='updateMarges()' required></select>
	                      			Bas : <select id='couleur_b' name='couleur_b' type='text' onchange='updateMarges()' required></select>
	                      			Gauche : <select id='couleur_g' name='couleur_g' type='text' onchange='updateMarges()' required></select>
	                      			Droite : <select id='couleur_d' name='couleur_d' type='text' onchange='updateMarges()' required></select>
	                      			<br /><br />
	                      			<label for='fichier'>Votre image : </label><br /><input id='fichier' name='fichier' type='file' onchange='appercu(this);updateMarges();' required/><br /><br />
	                      			<input type='submit' value='Soumettre' />
	                  			</form>
							</td>
							<td style='text-align: center; vertical-align: center;'>
								<div id='div_img'>
									<img id='limage' name='limage' src='#' alt='Votre image' style='border: 1px solid black'/>
								</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>\n";
?>