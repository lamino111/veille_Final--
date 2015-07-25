<?php include('fonctions/connexion_bdd.php') ;include('classes/modele.class.php');?> 
<h1>  Liste de 10 dernier Lois validé </h1>
<?php  


		$pub = new modele('publication');
				$result1= $pub->find(array(
	
					"fields"=>"id,nature_text ,reference, numero_journale ,objet, point_essentiel ,chemain_pdf, type_veille,statu,date_ajout",
					"conditions"=>"type_veille='publication_juridique' and statu = 1  ",
					"limit" =>"10"
					)); ?>

		 <div class="affiche_ajou_velleur">
                      <table class='tab_pub_veilleur'>
                           <tr>
                            <th>Réference</th>
                           <th>objet</th>
                           <th>Nature du text</th>
                           <th>numero de journale</th>
                           <th>point essentiel</th>
                           <th>PDF</th>
                           <th>Date d'ajout</th>
                           
                       </tr>
           

		<?php  foreach ( $result1 as $result) {
			
			 echo"<tr>";
			echo "<td>".$result['reference']."</td>";
			echo "<td>".$result['objet']."</td>";
			echo "<td>".$result['nature_text']."</td>";
			echo "<td>".$result['numero_journale']."</td>";
			echo "<td>".$result['point_essentiel']."</td>";
			echo "<td>".$result['chemain_pdf']."</td>";
			echo "<td>".$result['date_ajout']."</td>";
			
			 echo"</tr>";
		}?>
		 </table>
       </div>








