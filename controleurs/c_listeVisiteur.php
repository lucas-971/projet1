<?php
include("vues/v_sommaireC.php");


$idComptable = $_SESSION['idComptable'];

$action = $_REQUEST['action'];

switch($action){
	case 'listeVisiteur':{
		$lesVisiteurs = $pdo->getLesVisiteurs($idComptable);
		// Afin de s�lectionner par d�faut le dernier mois dans la zone de liste
		// on demande toutes les cl�s, et on prend la premi�re,
		// les mois �tant tri�s d�croissants
		$lesCles = array_keys( $lesVisiteurs );
		$VisiteurASelectionner = $lesCles[0];
		include("vues/v_listeVisiteur.php");
		break;
	}
	  	case 'selectionnerMois':{
	$lesVisiteurs = $_REQUEST['lstVisiteurs'];
	$lesMois=$pdo->getLesMoisDisponibles($lesVisiteurs);
		$lesCles = array_keys ($lesMois);
		if($lesCles!=null)
		{
		$moisASelectionner = $lesCles[0];
		include("vues/v_listeMoisV.php");
		break;
		
		}
	
	
	
	}
}
/*public function visiteur(){
$req = $bdd->query('SELECT *
					FROM visiteur
					WHERE idComptable=\''.$_GET['idComptable'].'\'');
}
include("vues/v_listeVisiteur.php");*/








 
?>