<?php include('fonctions/connexion_bdd.php');include('classes/modele.class.php'); ?> 
<h1>les 10 derneir norme valide</h1>
<?php  

				$nor = new modele ('publication');
				$result1= $nor->find(array("fields"=>"id,reference,objet,norme_cetim,norme_online,type_norme,chemain_pdf,statu,type_veille,date_ajout",
				"conditions"=>"type_veille = 'publication_normative' and statu = 1  ",
				"limit"=>"10"
					));




?>

		 <div class="affiche_ajou_velleur">
            <table class='tab_pub_veilleur'>
            <tr>
                <th>Réference</th>
                <th>Objet</th>
                <th>Norme du CETIM</th>
                <th>Norme en linge</th>
                <th>PDF</th>
                <th>Date d'ajout</th>
            </tr>
          

		<?php foreach($result1 as $result){

			

			
			 echo"<tr>";
			echo "<td>".$result['reference']."</td>";
			echo "<td>".$result['objet']."</td>";
			echo "<td>".$result['norme_cetim']."</td>";
			echo "<td>".$result['norme_online']."</td>";
			echo "<td>".$result['chemain_pdf']."</td>";
			echo "<td>".$result['date_ajout']."</td>";
			
			 echo"</tr>";
		}?>
		 </table>
       </div>



