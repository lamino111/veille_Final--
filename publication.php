
<?php include_once('fonctions/connexion_bdd.php');
include('classes/modele.class.php');


if(isset($_GET['page']))
{



if($_GET['page']=='jur'){//..................................................publication  juridique 


echo '<h1>publication juridique </h1>'; 

if(isset($_GET['publier'])){

        $sql = "UPDATE  publication SET ";
          $sql .= " Statu = 1";
          $sql .= " WHERE id =".$_GET['publier']; 

          $quer= $bdd->prepare($sql);
          $quer->execute(); // excution de la requete
}
if(isset($_GET['depublier'])){

        $sql = "UPDATE  publication SET ";
          $sql .= " Statu = 0";
          $sql .= " WHERE id =".$_GET['depublier']; 

          $quer= $bdd->prepare($sql);
          $quer->execute(); // excution de la requete

}

if(isset($_GET['supprime'])){
			
			$sql="DELETE FROM publication WHERE id =".$_GET['supprime'];
			$req=$bdd->exec($sql);
				}

				$pub = new modele('publication');
				$pub_jur= $pub->find(array(
					"fields"=>"id,nature_text ,reference, numero_journale ,objet, point_essentiel ,chemain_pdf, type_veille,statu,date_ajout",
					"conditions"=>"type_veille='publication_juridique'"
					));

               echo'
                    <div class="affiche_util">
                       <table class="tab_publication">
                           <tr>
                            <th>Réference</th>
                           <th>objet</th>
                           <th>Nature du text</th>
                           <th>numero de journale</th>
                           <th>point essentiel</th>
                            <th>Date Ajout</th>
                           <th>DOCUMENT</th>
                            <th>Supprimer</th>
                            <th>Publier/Dépublier</th>
                           
                       </tr>
                  '; 
					

				
				 foreach ($pub_jur as $o){
			       echo'<tr>';
			        	echo "<td>".$o['reference']."</td>";
			        	echo"<td>".$o['objet']."</td>";
				 	    echo"<td>".$o['nature_text']."</td>";
				 	echo "<td>".$o['numero_journale']."</td>";
				 	 	echo"<td>" .$o['point_essentiel']."</td>";
				 	  echo"<td>".$o['date_ajout']."</td>";
				 	echo"<td><a href='".$o['chemain_pdf']."'> pdf</a></td><td><a href='admin.php?page=jur&supprime=".$o['id']."'>supprimé</a></td>" ;
				 	if($o['statu']==0){
				 	echo "<td><a href='admin.php?page=jur&publier=".$o['id']."'>publier</a></td>";
				 	
                           }else{

                    echo "<td><a href='admin.php?page=jur&depublier=".$o['id']."'>dépublier</a></td>";
                      

                           }
                   echo'</tr>';
                       }
				 		  
				 	echo '
                          </table>
                     </div>

				 	    ';
				 	

		








}elseif($_GET['page']=='norm'){


echo '<h1>publication normative </h1>';//................................................. publication normative 


if(isset($_GET['publier'])){

        $sql = "UPDATE  publication SET ";
          $sql .= " Statu = 1";
          $sql .= " WHERE id =".$_GET['publier']; 

          $quer= $bdd->prepare($sql);
          $quer->execute(); // excution de la requete

          
}
if(isset($_GET['depublier'])){

        $sql = "UPDATE  publication SET ";
          $sql .= " Statu = 0";
          $sql .= " WHERE id =".$_GET['depublier']; 

          $quer= $bdd->prepare($sql);
          $quer->execute(); // excution de la requete

}

if(isset($_GET['supprime'])){
			
			$sql="DELETE FROM publication WHERE id =".$_GET['supprime'];
			$req=$bdd->exec($sql);
				}
				
				

				$nor = new modele ('publication');
				$pub_nor= $nor->find(array("fields"=>"id,reference,objet,norme_cetim,norme_online,type_norme,chemain_pdf,statu,type_veille,date_ajout",
				"conditions"=>"type_veille = 'publication_normative' "

					));
				;

				   echo'
                    <div class="affiche_util">
                       <table class="tab_publication">
                           <tr>
                            <th>Réference</th>
                           <th>objet</th>
                           <th>Norme du CETIM</th>
                           <th>Norme en ligne</th>
                           <th>Type de Norme</th>
                           <th>Date Ajout</th>
                           <th>DOCUMENT</th>
                            <th>Supprimer</th>
                            <th>Publier/Dépublier</th>
                            
                       </tr>
                  '; 
					
				 foreach ($pub_nor as $o){
			
				 	echo"<tr>";
				 	echo"<td>".$o['reference']."</td>";
				 	echo"<td>".$o['objet']."</td>";
				 	echo"<td>".$o['norme_cetim']."</td>";
				 	echo"<td>".$o['norme_online']."</td>";
				 	echo"<td>".$o['type_norme']."</td>";
            echo"<td>".$o['date_ajout']."</td>";
				 	echo"<td><a href='".$o['chemain_pdf']."'> DOC</a><td><a href='admin.php?page=norm&supprime=".$o['id']."'>supprimé</a></td> ";
				 		if($o['statu']==0){
				 	echo "<td><a href='admin.php?page=norm&publier=".$o['id']."'>publier</a></td>";
				 	
                           }else{

                    echo "<td><a href='admin.php?page=norm&depublier=".$o['id']."'>dépublier</a></td>";
                           }
                           echo"</tr>";
                       }
				 		  
				 	echo '
                          </table>
                     </div>

				 	    ';
		

	


}elseif($_GET['page']=='tec'){
	echo " <h1>publication technologique </h1>";//  ....................................publication technologique
	if(isset($_GET['publier'])){

        $sql = "UPDATE  publication SET ";
          $sql .= " Statu = 1";
          $sql .= " WHERE id =".$_GET['publier']; 

          $quer= $bdd->prepare($sql);
          $quer->execute(); // excution de la requete
      


}
if(isset($_GET['depublier'])){

        $sql = "UPDATE  publication SET ";
          $sql .= " Statu = 0";
          $sql .= " WHERE id =".$_GET['depublier']; 

          $quer= $bdd->prepare($sql);
          $quer->execute(); // excution de la requete

}
if(isset($_GET['supprime'])){
			
			$sql="DELETE FROM publication WHERE id =".$_GET['supprime'] ;
			$req=$bdd->exec($sql);
				}
				
				$dir = new modele('publication');
				$pub_tec= $dir->find(array(

					"fields"=>"id,reference,objet,chemain_pdf,statu ,date_ajout"
					,"conditions"=>"type_veille = 'publication_techno' "
				));
					
			     echo'
                    <div class="affiche_util">
                       <table class="tab_publication">
                           <tr>
                            <th>Réference</th>
                           <th>objet</th>
                           <th>Date Ajout</th>
                           <th>DOCUMENT</th>
                            <th>Supprimer</th>
                            <th>Publier/Dépublier</th>
                           
                       </tr>
                  '; 
			
				 foreach ($pub_tec as $o){
				 	echo"<tr>";
				 	echo"<td>".$o['reference']."</td>";
				 	echo"<td>".$o['objet']."</td>";
          echo"<td>".$o['date_ajout']."</td>";
				 	echo"<td><a href='".$o['chemain_pdf']."'>PDF</a></td><td><a href='admin.php?page=tec&supprime=".$o['id']."'>supprimé</a></td>";
				 	if($o['statu']==0){
				 	echo "<td><a href='admin.php?page=tec&publier=".$o['id']."'>publier</a></td>";
				 	
                           }else{

                    echo "<td><a href='admin.php?page=tec&depublier=".$o['id']."'>dépublier</a></td>";
                           }
                           echo"</tr>";
                       }
				 		  
                    	echo '
                          </table>
                     </div>

				 	    ';
				 	
				 
				 	 

				 	

		}

}


?>