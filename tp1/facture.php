<?php 

if(isset($_POST['optionPaiement'])){
	$membre = array();

	$sql = "SELECT * FROM test.user WHERE id=".(int)$_GET['uid'];

	$result = mysqli_query($db, $sql);

	$membre = $result->fetch_assoc();

	$to = $membre['courriel'];
	$from = 'From: emdc@emdc.com';
	$sujet = "Confirmation de votre commande";
	$body = "Merci pour votre achat chez nous!\n\nVoici les informations concernant votre commande :\n\n".var_dump($_POST)." et voici l'apperçu de votre cadre :\n\n".$_POST['data'] ;

	mail($to, $sujet, $body, $from);
	
	header('Location: index.php?uid='.$_GET['uid']);
}

echo "		<script>
				$(document).ready(function(){
				    chargerAppercu();
				});

				$('#btnSubmit').click(function(){
					$.ajax({
						type:'POST',
						url:'index.php?action=facture&uid=".$_GET['uid']."',
						data:{data:localStorage.appercu},
						success:function(){
							window.location.href = 'index.php?action=facture&uid=".$_GET['uid']."';
						}
					});
				});

				function chargerAppercu(){
					document.getElementById('limage').src = localStorage.appercu;
				}

				function valider(){
					alert('Tout est beau! Vous aller recevoir un courriel de confirmation sous peu avec les informations nécessaires concernant votre commande. Merci pour votre achat!');

					return true;
				}

				function maj(image){
					var m_haut = ".$_POST['marges_h']."*12+'px';
			    	var m_bas = ".$_POST['marges_b']."*12+'px';
			    	var m_gauche = ".$_POST['marges_g']."*12+'px';
			    	var m_droite = ".$_POST['marges_d']."*12+'px';

					image.style.borderTop = m_haut+' solid ".$_POST['couleur_h']."';
					image.style.borderLeft = m_gauche+' solid ".$_POST['couleur_g']."';
					image.style.borderRight = m_droite+' solid ".$_POST['couleur_d']."';
					image.style.borderBottom = m_bas+' solid ".$_POST['couleur_b']."';
				}
			</script>
			<tr style='min-height: 600px; height: 100%;'>
				<td colspan='4'>
					<form id='payment_form' name='payment_form' method='POST' onsubmit='return valider()' action='index.php?action=facture&uid=".$_GET['uid']."' enctype='multipart/form-data'>
						<table style='width: 100%;'>
							<tr>
								<td style='width: 50%;'>
                  			    	<p>Veuillez choisir le mode de paiement :</p>
                  			    	<select id='optionPaiement' name='optionPaiement'>
                  			    		<option value='Paypal'>Paypal</option>
                  			    		<option value='Wirecard'>Wirecard</option>
                  			    		<option value='Check'>Check</option>
                  			    	</select>
								</td>
								<td style='text-align: center; vertical-align: center;'>
									<div id='div_img'>
										<img id='limage' name='limage' src='#' alt='Votre image' onload='maj(this);' style='filter: grayscale(1);'/>
									</div>
								</td>
							</tr>
						</table>
						<input id='btnSubmit' name='btnSubmit' type='submit' value='Soumettre' />
	                </form>
	         	</td>
			</tr>
		</table>\n";
?>