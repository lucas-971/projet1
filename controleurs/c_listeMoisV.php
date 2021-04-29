<?php
extract($_POST);
include("vues/v_sommaireC.php");

$idVisiteur = $_SESSION['idVisiteur'];
$mois = getMois(date("d/m/Y"));
$numAnnee = substr($mois, 0, 4);
$numMois = substr($mois, 4, 2);
$action = $_REQUEST['action'];

switch($action){
	
    
	case 'listeMoisV':{
	

           $lesVisiteurs = $pdo->getLesVisiteurs();
            $lesCles = array_keys($lesVisiteurs);
            $VisiteurASelectionner = $lesCles[0];
            $SixMois = getLesSixDerniersMois();
            $idVisiteur = isset($_REQUEST['lstVisiteurs']) ? $_REQUEST['lstVisiteurs'] : null;
            $Mois = isset($_REQUEST['lstMois']) ? $_REQUEST['lstMois'] : null;
            if ($idVisiteur && $Mois) {
                $_SESSION['idVisiteur'] = $idVisiteur;
                $_SESSION['lstMois'] = $Mois;
                $idVisiteur = $_SESSION['idVisiteur'];
                $Mois = $_SESSION['lstMois'];
            }
            $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
            include("vues/v_listeVisiteur.php");
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $Mois);
            $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $Mois);
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $Mois);
            $numAnnee = substr($Mois, 0, 4);
            $numMois = substr($Mois, 4, 2);
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif = $lesInfosFicheFrais['dateModif'];
            $dateModif = dateAnglaisVersFrancais($dateModif);
            include("vues/v_listefiche.php");
            break;
        }
		case 'supprimerFrais':{
		$idFrais = $_REQUEST['idFrais'];
	    $pdo->supprimerFraisHorsForfait($idFrais);
		break;
	}

}




 
?>