<?php

echo "  <!DOCTYPE>
        <html>
        	<head>
         		<title>Tp1 - Ex2</title>
        		<meta charset='UTF-8'>
                <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
        	</head>
         	<body style='height: 100%;'>
                <table style='background-repeat: repeat-x; background-image: url(\"images/logo-bg.png\"); width: 100%; height: 200px;'>
                  <tr>
                      <td>
                          <h1>Encadre-moi donc ça!</h1>
                      </td>
                      <td>
         			<a href='index.php' style='width: 100%;'><img src='images/logo.png' alt='logo' style='float: right; zorder: 1; display: inline; margin-top: -3px;'/></a>
                      </td>
                  </tr>
                </table>
        		<table style='width: 100%; height: 100%; background-color: #FFEBCD; border-color: white;'>
                    <tr style='text-align: center;'>
                        <th style='width:20%;'>
                            <a href='index.php'><p style='font-size: 1.2em;'>Acceuil</p></a>
                        </th>\n";

if(isset($_GET['uid']) && $_GET['uid'] != 0){
    echo "              <th style='width:20%;'>
                            <a href='index.php?action=profile&uid=".$_GET['uid']."'><p style='font-size: 1.2em;'>Profile</p></a>
                        </th>
                        <th style='width:20%;'>
                            <a href='index.php?action=commande&uid=".$_GET['uid']."'><p style='font-size: 1.2em;'>Commander</p></a>
                        </th>
                        <th style='width:20%;'>
                            <a href='index.php?action=deconnection'><p style='font-size: 1.2em;'>Déconnection</p></a>
                        </th>\n";
}else{
    echo "              <th style='width:20%;'>
                            <a href='index.php?action=connection'><p style='font-size: 1.2em;'>Connection</p></a>
                        </th>\n";
}

echo "              </tr>\n";

?>