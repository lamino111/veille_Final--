<?php include_once('fonctions/connexion_bdd.php') ;
include('classes/modele.class.php') ;?>
<h1> Afficher les Directions  </h1>

<?php  
if(isset($_GET['supprime'])){
	
			$sql="DELETE FROM direction WHERE id =".$_GET['supprime'];
			$req=$bdd->exec($sql);
			}
				/*$dir = new modele('direction');
				$nombre_dir = $dir->find(array(
					"fields"=>"id ,matricule_dir,nom_direction ",
					"order"=>"  nom_direction ASC "
					));*/?>
   <div class="affiche_util">
         <table>
            <tr>
            	<th>Nom de la direction</th>
                <th>Acronyme</th>
                 <th>Supprimer</th>
            </tr>
           

<?php
 /*$query= $bdd->prepare("SELECT count(Id) as NbArt FROM direction");
                    $query->execute();
                    $data=$query->fetch();

                    $NbArt = $data['NbArt'];
                    var_dump($NbArt);*/



                   $sql="SELECT * FROM direction ORDER BY  nom_direction ASC";
                   $data=$bdd->query($sql);

				
			/*$n=$dir->conte();
			echo "vous avez    ".$n."  direction";*/
				
 				while($o = $data->fetch()){
				 //foreach ($nombre_dir as $o){
				 	
					echo "<tr>";
				 	echo"<td>".$o['nom_direction']."</td>";
				 	echo"<td>".$o['matricule_dir']."</td><td><a href='admin.php?page=7&supprime=".$o['id']."'>supprimé</a></td>";
				 	echo "</tr>";
		}


	
	?>
</table></div>