<?php include('fonctions/connexion_bdd.php') ?> 
<h1>  Liste de tous les Employés </h1>
<?php  
if(isset($_GET['supprime'])){
			
			$sql="DELETE FROM employer WHERE id =".$_GET['supprime'];
			$req=$bdd->exec($sql);
				}
$sql="SELECT * FROM employer";
		$data=$bdd->query($sql);?>
        <div class="affiche_util">
         <table>
            <tr>
                <th>Matricule</th>
                
                <th>Nom</th>
                <th>Prénom</th>
                <th>Nom de la direction</th>
                <th>Supprimer</th>
            </tr>
             

		<?php while($result = $data->fetch()){
			echo "<tr>";
		    echo  "<td>".$result['matricule']."</td>";
			
			echo  "<td>".$result['nom']."</td>";
			echo  "<td>".$result['prenom']."</td>";
			echo "<td>".$result['nom_direction']."</td><td><a href='admin.php?page=1&supprime=".$result['id']."'>supprimé</a></td>";
		   echo "</tr>";
		}

		
		

	?>
    </table>
   </div>