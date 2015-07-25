<?php  include_once('fonctions/connexion_bdd.php');  
include('classes/modele.class.php') ?>
<h1>  Modfier une direction </h1>



<?php  
if(isset($_GET['modifer'])){
			
			$sql = "UPDATE direction SET  WHERE  id=".$_GET['id'];
			$req=$bdd->exec($sql);
				
				;}
				$dir = new modele('direction');
				$nombre_dir = $dir->find(array(
					"fields"=>"*"
					));

		
				 foreach ($nombre_dir as $o){
				 	
				 echo"	<form  method='GET'  action='admin.php'>  	
					<fieldset>
					<label for='nom_dir'>changer nom de la direction</label>
					<input type='hidden' name='page' value='9' required>
					<input type='hidden' name='id' value='".$o['id']."'' required>
					<input type='text' id='nom_dir' name='nom_dir'  placeholder=".$o['nom_direction']."  required>
					<label for='mat_dir'> changer l'acronyme</label>
					<input type='text' id='mat_dir' name='mat_dir'  required>
					 <input type='submit'  name='modifier' value='modifier' >
					</fieldset>
					</form>";
					
				   }

					if(isset($_GET['modifier'])){
					if(isset($_GET['nom_dir']) && isset($_GET['mat_dir'])&& isset($_GET['id'])){
						$nom=$_GET['nom_dir'];
						$acro=$_GET['mat_dir'];
						$o=$_GET['id'];

					$test=$bdd->exec("UPDATE direction SET nom_direction='$nom' , matricule_dir='$acro' where id = '$o' "); 
					echo "direction  bien changer ";
		
			 	}}


		





	?>