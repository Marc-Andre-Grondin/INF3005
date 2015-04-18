<?php

echo "<table style='width: 100%; height: 100%;'>
		<tr>
			<td style='width: 70%; background-color: #D2D9E1; vertical-align:top;'>
				<br><br><p>Bienvenue sur votre page principale!</p>
			</td>
			<td style='background-image: url(\"image/bg_sep.jpg\"); width: 10px;'></td>
			<td style='vertical-align: top; background-color: #CACACA'>
				<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
				<script>
					function ajouter(id){
						ok = confirm('Êtes-vous certain de vouloir ajouter cette personne?');

						if(ok){
							window.location.href = 'index.php?rid='+id;
						}
					}

					$(function(){
					    setInterval(function(){
					        $('div#right_side').load('right_panel.php');
					    },1000);
					});
				</script>
				<h3>Liste des connivents : </h3>
				<div id='right_side' name='right_side'>";
require_once("right_panel.php");

echo "			</div>
			</td>
		</tr>
	</table>";

?>