 <?php  include_once('fonctions/connexion_bdd.php');   ?>

<h1>Ajouté une technologie</h1>

<p> Vous devez remplire le formulaire poure ajouter un lois</p>
<?php   $date=date('Y-m-j') ; ?> 
<fieldset>
<form method='POST' action='#'  enctype="multipart/form-data" >
	<input type='hidden' name='date_ajout' value=<?php echo "'".$date."'" ?>>
	<label for='ref_text'>Réference</label><br />
	<input type='hidden' name='type_veille' value='publication_techno'>
	<input type='text' id='ref_text'  name='ref' required><br />
	<label for='objet' >Objet</label><br />
	<textarea type='text' cols="45" rows="20" id='objet'  name='objet' required></textarea><br /><br />
	<label>Associé un document</label><br />
	<input class="parcourir" type='file' name='document' id='document' value='parcourir'><br /><br />
	<input class="boutan1"  type='submit' value='Envoyer' name="submit"><br />
    <div class="annuler"><a href="admin_technologique.php">Annuler</a></div>
</fieldset>
</form>
<?php 
  // lareque d'joute des lois
 	if(isset($_POST['submit'])){
			if (isset($_POST['ref']) &&isset($_POST['objet'])) {
		$ref=$_POST['ref'];
		$objet=$_POST['objet'];
		$typev=$_POST['type_veille'];
		$date_ajout=$_POST['date_ajout'];
		 if ( !empty($_FILES['document']['name']) )
                        {
                            move_uploaded_file($_FILES['document']['tmp_name'], 'pdf/'.basename($_FILES['document']['name']));
                            $_POST['document'] = 'pdf/'.$_FILES['document']['name'];
                        }

					$document=$_POST['document'];
	
			
			$sql= "INSERT INTO publication (reference,objet,type_veille,chemain_pdf,date_ajout) VALUES ('$ref','$objet','$typev','$document','$date_ajout')";

		$req= $bdd->exec($sql);
		//style de msd de succe avec js
		echo "<h3 class='succe'> bien ajouté<img src='images/b1.ico'></h3>";
	}
    

}
		  			 	

				  
  ?>
