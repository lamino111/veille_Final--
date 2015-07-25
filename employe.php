<?php 
include_once('fonctions/connexion_bdd.php');
include('classes/modele.class.php');

session_start(); 


 ?>

<html>
<head>
	<title>dicideure:<?php echo $_SESSION['nom']  ?></title>
	 <meta charset="utf-8">
	 <link rel="stylesheet" href="style.css">
</head>


<body>
	<?php
		$date=date('Y-n-j');
		
	if(isset($_SESSION['nom']))
	{ 
			if(isset($_GET['submit'])){ 
							if(isset($_GET['commentaire']) && $_GET['id_pub'] && $_GET['prop']){

								$commentaire=$_GET['commentaire'];
								$id=$_GET['id_pub'];
								$prop=$_GET['prop'];
								$date_ajout=$_GET['date_ajout'];

								$subject=$_GET['commentaire'];
								// Sécurité pour éviter les caractères spéciaux

								if(preg_match('#(^[a-zA-Z0-9éèêëáàâäúùûüñõãîìíÿ£ç.,:;!?¿ _-]+)$#', $subject))
								{


							$req=" INSERT INTO commentaire (objet ,id_pub,mat_p,date_ajout) VALUES ( '$commentaire', '$id', '$prop','$date_ajout')";
						$result=$bdd->exec($req);
							}else{ echo "Les caractères spéciaux ne sont pas accepté";  }



							
							}

						}

				if(isset($_GET['supprime'])){
	
			$sql="DELETE FROM commentaire WHERE id =".$_GET['supprime'];
			$req=$bdd->exec($sql);
			}

						

			


			?>

	<header>
		<div class='bbody'>	
        <?php
		 echo"<div class='bienvenue'><a href='employe.php?page=gere'>Bienvenue <br /> ".$_SESSION['nom']." <span>Pour modifier votre compte cliquez ici...!</span> </a></div>" ;?>
	 <?php   include ('include/menu_employe.php')       ?>      


	 </header>
		<section id='secutil' > 
			


			<?php  



			if(isset($_GET['page']))
{




			if($_GET['page']=='jur'){//..................................................publication  juridique 


				echo "<h1 class='publication'>publication juridique </h1>"; 

                   echo"<div class='divpublication'>";

				$pub = new modele('publication');
				$pub_jur= $pub->find(array(
	
					"fields"=>"id,nature_text ,reference, numero_journale ,objet, point_essentiel ,chemain_pdf, type_veille,statu",
					"conditions"=>"type_veille='publication_juridique' and statu = 1  "
					
					));
					
					
				;
				
			
				 foreach ($pub_jur as $o){ 

				 	 echo '
                      <div class="affiche_pub">
                       <table class="tab_pub">
                           <tr>
                            <th>Réference</th>
                           <th>objet</th>
                           <th>numero de journale</th>
                           <th>Norme en linge</th>
                           <th>point Essentiel</th>
                           <th>Document</th>
                           
                            
                       </tr>
                  '; 

				 	echo"<tr>";
					echo  "<td>". $o['reference']."</td><br />";
					echo  " <td>".$o['objet']."</td><br />";
				 	echo  "<td>".$o['nature_text']."</td><br />";
				 	echo   "<td>".$o['numero_journale']."</td><br />";
				 	echo  "<td>" .$o['point_essentiel']."</td><br />";
				 	echo    "<td><a href='".$o['chemain_pdf']."'>DOC</a></td><br />" ;
				 	echo "</tr>";

				 	  echo" </table>
                            </div>
                                   ";
				 		echo "<h3 style='font-size:29px' stule='color:#2196f3'>  Les commentaires: </h3>";
					$bip="select * from commentaire where id_pub =".$o['id'];
					$tes= $bdd->query($bip) ;
					while($donne = $tes->fetch()){ 
						echo "<fieldset class='style_com'>";
						echo "<span class='mat_p'>".$donne['mat_p']."</span><br />"; 
						echo "<p class='date'>Ajouter Le :".$donne['date_ajout']."</p><br />"; 
						echo "<br><h5>".$donne['objet']."</h5>";

						

                        	if($donne['mat_p']==$_SESSION['nom'] || isset($_SESSION['ID_admin'])){
                        	echo "<br><a class='supp_com' href='employe.php?page=jur&supprime=".$donne['id']."'>Supprimer</a>";
                        		}
                          echo "</fieldset>";
					}

				 	
                     echo"</div>";
				 	echo "<br><h2 class='h2'>commenter</h2>";
				 	 

                  if(isset($_SESSION['matricule']) &&isset($_SESSION['nom'])){


				 	echo "<div class='fiecom'>
				 	        <form method='GET' action='#' >
				 	 		<fieldset>
				 			<textarea style='height:150px;width:600px' size='20' type='text' name='commentaire' placeholder='Ecrrit votre commentaire ici !' ></textarea>
				 			<input  type='hidden'  name='id_pub' value='".$o['id']."' >	
				 			<input type='hidden' name='date_ajout' value='".$date."' >
				 			<input  type='hidden'  name='page' value='jur'>		 	 
				 			<input  type='hidden'  name='prop'  value ='".$_SESSION['nom']."' >
				 		    <input class='boutan_com' type='submit' name='submit' value='commenter'>

				 			</fieldset>
				 			</form>";
                              echo"</div>";
				 			echo "</fieldset>";

						}
						}





	}elseif($_GET['page']=='norm'){


				echo "<h1 class='publication'>publication normative </h1>";//................................................. publication normative 
               

              echo"<div class='divpublication'>";

				$nor = new modele ('publication');
				$pub_nor= $nor->find(array("fields"=>"id,reference,objet,norme_cetim,norme_online,type_norme,chemain_pdf,statu,type_veille",
				"conditions"=>"type_veille = 'publication_normative' and statu = 1  "

					));
				;
                  
                
				 foreach ($pub_nor as $o){
				 	echo'
                    <div class="affiche_pub">
                       <table class="tab_pub">
                           <tr>
                            <th>Réference</th>
                           <th>objet</th>
                           <th>Norme du CETIM</th>
                           <th>Norme en linge</th>
                           <th>Type du Norme</th>
                           <th>Document</th>
                            
                       </tr>
                  '; 
					
			 		
				     echo"<tr>";
				 	echo "<td>".$o['reference']."</td><br />";
				 	echo "<td>".$o['objet']."</td><br />";
				 	echo "<td>".$o['norme_cetim']."</td><br />";
				 	echo "<td>".$o['norme_online']."</td><br  />";
				 	echo "<td>".$o['type_norme']."</td><br />";
				 	echo    "<td><a href='".$o['chemain_pdf']."'>DOC</a></td><br />" ;
				 	echo "<br />" ;
				 	echo"</tr>";
				     echo" </table>
                            </div>
                                   ";
				 		echo "<h3 style='font-size:29px' style='color:#2196f3'>  Les commentaires: </h3>";
					$bip="select * from commentaire where id_pub =".$o['id'];
					$tes= $bdd->query($bip) ;
					while($donne = $tes->fetch()){ 
						echo "<fieldset class='style_com'>";
						    echo "<span class='mat_p'>".$donne['mat_p']."</span><br />"; 
						   echo "<p class='date'>Ajouter Le :".$donne['date_ajout']."</p><br />"; 
						   echo "<br><h5>".$donne['objet']."</h5>";

						   

						    if( $donne['mat_p']==$_SESSION['nom'] || isset($_SESSION['ID_admin'])){
						   echo "<br><a class='supp_com' href='employe.php?page=norm&supprime=".$donne['id']."'>Supprimer</a>";
						}
						   echo "</fieldset>";
					}

				 	
                      echo"</div>";
				 	echo "<br><h2 class='h2'>commenter</h2>";
				 	 

                  if(isset($_SESSION['matricule']) && isset($_SESSION['nom'])){


				 	echo "<div class='fiecom'>
				 	        <form method='GET' action='#' >
				 	 		<fieldset>
				 			<textarea style='height:150px;width:600px' size='255' type='text' name='commentaire' placeholder='Ecrrit votre commentaire ici !' ></textarea>
				 			<input  type='hidden'  name='id_pub' value='".$o['id']."' >	
				 			<input type='hidden' name='date_ajout' value='".$date."' >
				 			<input  type='hidden'  name='page' value='norm'>		 	 
				 			<input  type='hidden'  name='prop'  value ='".$_SESSION['nom']."' >
				 			<input class='boutan_com' type='submit' name='submit' value='commenter'>

				 			</fieldset>
				 			</form>";
                           echo"</div>";
				 			echo "</fieldset>";

						}
						}
						


	


	}elseif($_GET['page']=='tec'){
	        echo "<h1 class='publication'>Publication Technologique </h1><br /><br /><br />";//  ....................................publication technologique
	


              echo"<div class='divpublication'>";

				
				$dir = new modele('publication');
				$pub_tec= $dir->find(array(
					"fields"=>"id,reference,objet,chemain_pdf,statu,type_veille"
					,"conditions"=>"type_veille = 'publication_techno' and statu = 1  "
				));
					
			     
				
				 foreach ($pub_tec as $o){


				 	 echo'
                    <div class="affiche_pub">
                       <table class="tab_pub">
                           <tr>
                            <th>Réference</th>
                           <th>objet</th>
                           <th>Document</th>
                          
                       		</tr>
                  '; 
				 	echo "<tr>";
			        
				 	echo "<td>".$o['reference']."</td><br /><br />";
				 	echo  "<td>". $o['objet']."</td><br /><br />";
				 echo    "<td><a href='".$o['chemain_pdf']."'>DOC</a></td><br/>" ;
				 	echo "<br />" ;
				 	echo "</tr>";
				 	echo" </table>
                            </div>
                                   ";

				 		echo "<h3 style='font-size:29px' stule='color:#2196f3'>  Les commentaires: </h3>";
					$bip="select * from commentaire where id_pub =".$o['id'];
					$tes= $bdd->query($bip) ;
					while($donne = $tes->fetch()){ 
						
					    echo "<fieldset class='style_com'>";
						echo "<span class='mat_p'>".$donne['mat_p']."</span><br />"; 
						echo "<p class='date'>Ajouter Le :".$donne['date_ajout']."</p><br />"; 
						echo "<br><h5>".$donne['objet']."</h5>";
						 if($donne['mat_p']==$_SESSION['nom'] || isset($_SESSION['ID_admin'])){
					    echo "<br><a class='supp_com' href='employe.php?page=tec&supprime=".$donne['id']."'>Supprimer</a>";}
						echo "</fieldset>";
					}

				 	

				 	echo "<br><h2 class='h2'>commenter</h2>";
				 	 

                  if(isset($_SESSION['matricule'])&& isset($_SESSION['nom'])){


				 	echo "<div class='fiecom'>
				 	        <form method='GET' action='#' >
				 	 			<fieldset>
				 			<textarea style='height:150px;width:600px' size='255' type='text' name='commentaire' placeholder='Ecrrit ton commentaire ici !' ></textarea>
				 			<input  type='hidden'  name='id_pub' value='".$o['id']."' >	
				 			<input type='hidden' name='date_ajout' value='".$date."' >
				 			<input  type='hidden'  name='page' value='tec'>		 	 
				 			<input  type='hidden'  name='prop'  value ='".$_SESSION['nom']."' >
				 			<input class='boutan_com' type='submit' name='submit' value='commenter'>


				 			</fieldset>
				 			</form>";
				 			echo"</div>";
				 			echo "</fieldset><br>";

						}//fin if
							}echo"</div>"; //fin forea²ch tec

						}elseif($_GET['page']=='gere'){ include('gere_compt.php'); }





	}else{echo "  veilleur choisir une option de menu en haut ";}


?>





		</section>


<footer>    <?php     include('include/footer_admin.php');  ?> </footer>
</div>

</body>

<?php  
}else header('location:index.php');  ?>
</html>