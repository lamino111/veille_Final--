<?php include('fonctions/connexion_bdd.php') ?> 
<h1>  Liste de tous les veilleur </h1>
<?php  
if(isset($_GET['supprime'])){
			
			$sql="DELETE FROM veilleur WHERE id =".$_GET['supprime'];
			$req=$bdd->exec($sql);
				}
$sql="SELECT * FROM veilleur";
		$data=$bdd->query($sql);?>

		 <div class="affiche_util">
         <table>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Type de veille</th>
                 <th>Supprimer</th>
            </tr>
           

		<?php while($result = $data->fetch()){

			
			 echo"<tr>";
			echo "<td>".$result['matricule']."</td>";
			
			echo "<td>".$result['nom']."</td>";
			echo "<td>".$result['prenom']."</td>";
			echo "<td>".$result['type_veille']."</td><td><a href='admin.php?page=2&supprime=".$result['id']."'>supprimé</a></td>";
			
			 echo"</tr>";
		}?>
		 </table>
       </div>








