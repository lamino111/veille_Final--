<?php include('fonctions/connexion_bdd.php') ;include('classes/modele.class.php');?> 
<h1>les 10 dernier technologier valide</h1>
<?php  


$dir = new modele('publication');
				$result1= $dir->find(array(
					"fields"=>"id,reference,objet,chemain_pdf,statu,type_veille,date_ajout"
					,"conditions"=>"type_veille = 'publication_technologique' and statu = 1  ",
					"limit"=>"10"
				
				));

?>

		 <div class="affiche_ajou_velleur">
         
           

		<?php foreach($result1 as $result){
			echo"<table class='tab_pub_veilleur'>
            <tr>
                <th>Réference</th>
                <th>Objet</th>
                <th>PDF</th>
                <th>Date d'ajout</th>
                
            </tr>";

			
			 echo"<tr>";
			echo "<td>".$result['reference']."</td>";
			echo "<td>".$result['objet']."</td>";
			echo "<td>".$result['chemain_pdf']."</td>";
			echo "<td>".$result['date_ajout']."</td>";
			 echo"</tr>";
		}?>
		 </table>
       </div>








