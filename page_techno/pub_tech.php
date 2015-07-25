<?php include('fonctions/connexion_bdd.php') ?> 
<h1>  Liste de publication validé </h1>
<?php  
if(isset($_GET['supprime'])){
			
			$sql="DELETE FROM publication WHERE id =".$_GET['supprime'];
			$req=$bdd->exec($sql);
				}
$sql="SELECT * FROM publication WHERE type_veille='publication_techno' AND statu = '1'";
		$data=$bdd->query($sql);?>

		 <div class="affiche_ajou_velleur">
         <table class="tab_pub_veilleur">
            <tr>
                <th>Réference</th>
                <th>Objet</th>
                <th>PDF</th>
                <th>Date d'ajout</th>
            </tr>
           

		<?php while($result = $data->fetch()){

			
			 echo"<tr>";
			echo "<td>".$result['reference']."</td>";
			echo "<td>".$result['objet']."</td>";
			echo "<td>".$result['chemain_pdf']."</td>";
			echo "<td>".$result['date_ajout']."</td>";
			
			 echo"</tr>";
		}?>
		 </table>
       </div>








