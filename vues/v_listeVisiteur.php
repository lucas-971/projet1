 <div id="contenu">
      <h2>Mes listes de visiteurs</h2>
      <h3>visiteur à sélectionner : </h3>
      <form action="index.php?uc=listeMoisV&action=listeMoisV" method="post">
      <div class="corpsForm">
         
      <p>
	 
        <label for="lstVisiteurs" accesskey="n">Visiteurs : </label>
        <select id="lstVisiteurs" name="lstVisiteurs">
            <?php
			foreach ($lesVisiteurs as $unVisiteur)
			{
			    $idVisiteur= $unVisiteur['id'];
				
				$nom = $unVisiteur['nom'];
				$prenom =$unVisiteur['prenom'];

				if($Visiteur == $VisiteurASelectionner){
				?>
				<option selected value="<?php echo $idVisiteur ?>"><?php echo  $nom."/".$prenom ?> </option>
				<?php 
				}
				else{ ?>
				<option value="<?php echo $idVisiteur ?>"><?php echo  $nom."/".$prenom ?> </option>
				<?php 
				}
			
			}
           
		   ?>    
            
        </select>
      </p>
      <p>
                <label for="lstMois" accesskey="n">selectionner votre mois: </label>
                <select id="lstMois" name="lstMois">
                    <?php
                    $tableMois = $SixMois['id'];
                    $i = 0;
                    foreach ($tableMois as $mois) {
                        if ($mois == $unVisiteur['id']) {
                            
                        } else {
                            ?>
                            <option value="<?php echo $mois; ?>"><?php echo $SixMois['libelle'][$i]; ?></option> 
                            <?php
                        }
                        $i++;
                    }
                    ?>

                </select>
    
            </p>

            
            
        
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
        
      </form>
  