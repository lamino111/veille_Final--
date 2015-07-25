<?php include('fonctions/connexion_bdd.php') ?> 
<h1>  Liste de tous les Norme avant validation </h1>
<?php  
if(isset($_GET['supprime'])){
			
			$sql="DELETE FROM publication WHERE id =".$_GET['supprime'];
			$req=$bdd->exec($sql);
				}
$sql="SELECT * FROM publication WHERE type_veille='publication_normative' AND statu = '0'";
		$data=$bdd->query($sql);?>

		 <div class="affiche_ajou_velleur">
         <table class="tab_pub_veilleur">
            <tr>
                <th>Réference</th>
                <th>Objet</th>
                <th>Norme du CETIM</th>
                <th>Norme en linge</th>
                <th>PDF</th>
                <th>Date d'ajout</th>
                <th>Supprimer</th>
            </tr>
           

		<?php while($result = $data->fetch()){

			
			 echo"<tr>";
			echo "<td>".$result['reference']."</td>";
			echo "<td>".$result['objet']."</td>";
			echo "<td>".$result['norme_cetim']."</td>";
			echo "<td>".$result['norme_online']."</td>";
			echo "<td>".$result['chemain_pdf']."</td>";
			echo "<td>".$result['date_ajout']."</td><td><a href='admin_normative.php?page=4&supprime=".$result['id']."'>supprimé</a></td>";
			
			 echo"</tr>";
		}?>
		 </table>
       </div>








