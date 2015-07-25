 <?php  include_once('fonctions/connexion_bdd.php');   ?>

<h1>Ajouté un veilleur </h1>
<p> Vous devez remplire le formulaire pour ajouter un veilleur</p>
<fieldset>
<form   method='POST' action='#' >

<label for='nom_vielleur' >Nom :</label><br />
<input type='text'  name='nom' id='nom_veilleur' required><br />
<label for='prenom' >Prenom :</label><br />
<input  type='text' id='prenom' name='prenom' required><br />
<label id='matricule'>Matricule :</label><br />
<input  type='text' id='matricule'  name='matricule' required><br />
<label for='login'> Login :</label><br />
<input  type='text' id='login' name='login' required><br />
<label for='password' > Mot de passe :</label><br />
<input  type='password' id='password' name='password' required><br />
<label for='tveille'>Type de veille :</label><br />
<select name='tveille' id='tveille'  required><br />
<option   value='Veilleur Normative'>Veilleur Normative</option><br />
<option  value='Veilleur Juridique' > Veilleur Juridique</option><br />
<option  value='Veilleur Technologique'>Veilleur Technologique</option><br />
</select> <br />
<input class="boutan1" type='submit'  name='submit' value='Enregistrer'>
<div class="annuler"><a href="admin.php">Annuler</a></div>
 
</form>

</fieldset>
<?php 
	if(isset($_POST['submit'])){
			if (isset($_POST['nom'])&& isset($_POST['prenom'])&&isset($_POST['matricule'])&&isset($_POST['login'])&&isset($_POST['password'])&&isset($_POST['tveille'])) {
		$matricule=$_POST['matricule'];
		$login=$_POST['login'];
		$password=$_POST['password'];
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$tveille=$_POST['tveille'];
	
		$sql="SELECT * FROM veilleur";
		$data=$bdd->query($sql);
		
		$var=0;
		while($result = $data->fetch()){
			
			if ($matricule == ($result['matricule'])){
					
				$var=1;
			}
	
			
		}
			if($var==1){
			

				echo"<h3 class='erreur'> Ce veilleur existe déja<img src='images/erreur.png' alt='erruer'></h3> ";
			}else
			{

			$sql="INSERT INTO veilleur (matricule,login,password,nom,prenom,type_veille) VALUES ( '$matricule','$login','$password','$nom','$prenom','$tveille' )";

		$req= $bdd->exec($sql);
		
		echo "<h3 class='succe'> le veilleur à été bien ajouté<img src='images/b1.ico'></h3>";
	}


}}



 ?>


