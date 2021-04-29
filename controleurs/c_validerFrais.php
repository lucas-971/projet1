<?php
include("vues/v_sommaireC.php");


$action = $_REQUEST['action'];


switch($action){

	
	case 'validerFrais':{


	$lesMois=$pdo->getLesMoisDisponibles( $_REQUEST['lstVisiteurs']);

	var_dump($lesMois) ;
		$lesCles = array_keys ($lesMois);
		if($lesCles!=null)
		{
		$moisASelectionner = $lesCles[0];
		include("vues/v_listeMoisV.php");
		break;
		
		}


	}

}
