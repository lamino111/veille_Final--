 <?php  include_once('fonctions/connexion_bdd.php');   ?>
<h1>  Ajouté un employer </h1>
<p> Vous devez remplire le formulaire poure ajouter un Employé</p>


<fieldset>
<form   method='POST' action='#' >
<label for='nom' >Nom :</label><br />
<input type='text'  name='nom' id='nom_veilleur'><br />
<label for='prenom' >Prenom :</label><br />
<input  type='text' id='prenom'  name='prenom' ><br />
<label id='matricule'>Matricule :</label><br />
<input  type='text' id='matricule'  name='matricule'><br />
<label for='login'> Login :</label><br />
<input  type='text' id='login' name='login'><br />
<label for='password' > Mot de passe :</label><br />
<input  type='password' id='password' name='password' ><br />
<label for='dir'>Direction :</label><br />
<select  name='nom_direction'><br />
	<?php  
   $reponse = $bdd->query('SELECT id, nom_direction from direction');
                            while($donnees = $reponse->fetch())
                            {
                              
                              echo "<option value=".$donnees['nom_direction'].">".$donnees['nom_direction']."</option>" ; }                            
                           ?>
</select><br />

 <input class="boutan1" type='submit'  name='submit' value='Enregistrer'>
 <div class="annuler"><a href="admin.php">Annuler</a></div>
</form>
</fieldset>



<?php 
	if(isset($_POST['submit'])){
			if (isset($_POST['nom'])&& isset($_POST['prenom'])&&isset($_POST['matricule'])&&isset($_POST['login'])&&isset($_POST['password'])&&isset($_POST['nom_direction'])) {
		   
		$matricule=$_POST['matricule'];
		$login=$_POST['login'];
		$password=$_POST['password'];
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$nom_direction=$_POST['nom_direction'];
	
		$sql="SELECT * FROM employer";
		$data=$bdd->query($sql);
		
		$var=0;
		while($result = $data->fetch()){
			
			if ($matricule == ($result['matricule'])){
					
				$var=1;
			}
	
			
		}
			if($var==1){
			

				echo"<h3 class='erreur'> Employé existe déja<img src='images/erreur.png' alt='erruer'></h3> ";
			}else
			{

			$sql="INSERT INTO employer (matricule,login,password,nom,prenom,nom_direction) VALUES ( '$matricule','$login','$password','$nom','$prenom','$nom_direction' )";
                
		$req= $bdd->exec($sql);
		
		echo "<h3 class='succe'> Employé à été bien ajouté<img src='images/b1.ico'></h3>";
	}


}}

 ?>

