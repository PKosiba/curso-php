<?php 
	session_start();
	if(!isset($_SESSION['ID']))
	{ //Caso a Session seja estartado
		header("location:index.php");
		exit;
	}
 ?>

 Seja bem vindom!!