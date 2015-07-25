<?php include('fonctions/connexion_bdd.php')             ?>  
<h1> Ajouté une direction </h1>
<p> Vous devez remplire le formulaire poure ajouter une direction</p>
<fieldset>
<form  method="POST"  action="#">  	

<label for='nom_dir'>Nom de la direction</label><br />
<input type='text' id='nom_dir' name='nom_dir' required><br />
<label for='mat_dir'> Acronyme</label><br />
<input type='text' id='mat_dir' name=' mat_dir' required ><br />
 <input class="boutan1" type='submit'  name='submit' value='Enregistrer'>
 <div class="annuler"><a href="admin.php">Annuler</a></div>

</form>
</fieldset>
<?php 
		

	if(isset($_POST['submit'])){
			if (isset($_POST['nom_dir'])&& isset($_POST['mat_dir'])) {
		$mat_dir=$_POST['mat_dir'];
		$nom_dir=$_POST['nom_dir'];
		
	
		$sql="SELECT * FROM direction";
		$data=$bdd->query($sql);
		
		$var=0;
		while($result = $data->fetch()){
			
			if($mat_dir == ($result['matricule_dir'])){

				$var=1;
			}
	
			}
			if($var==1){
				echo"<h3 class='erreur'> Ce veilleur existe déja<img src='images/erreur.png' alt='erruer'></h3> ";
			}else
			{

			$sql="INSERT INTO direction (nom_direction,matricule_dir) VALUES ( '$nom_dir','$mat_dir')";

		$req= $bdd->exec($sql);
		
		echo "<h3 class='succe'> La Direction à été bien ajouté<img src='images/b1.ico'></h3>";
	}

}
}
 ?>


