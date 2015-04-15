<?php 

echo "			<tr style='min-height: 600px; height: 100%;'>
					<td style='width: 10%;' colspan='4'>
						<div>\n";

if(!isset($_GET['uid']) || $_GET['uid'] == 0){
	echo "						<p style='font-size: 1.3em;'>Bienvenue sur notre site d'encadrement! Veuillez vous inscrire dans la section Connection et regardez nos vaste choix de sélection!</p>\n";
}else{
	echo "						<p style='font-size: 1.3em;'>Bienvenue sur notre site d'encadrement!</p><br />
								<p style='font-size: 1.3em;'>Vous pouvez accéder à la section Commander pour passer une commande!</p>\n";
}

echo "					</div>
					</td>
				</tr>
			</table>\n";
?>