 <?php  include_once('fonctions/connexion_bdd.php');   ?>



<h1>Ajouté une Norme</h1>
<p> Vous devez remplire le formulaire poure ajouter </p>
<?php   $date=date('Y-m-j') ; ?> 
<fieldset>
<form method='POST' action='#'  enctype="multipart/form-data">
	 
	<div class="nature_text"><a href="admin_normative.php?page=6">Cliquez ici pour Ajouter type de Norme</a></div>
	<label for='nature_text'>Type Norme</label><br />

	<select  name='type_norme'><br />
	<?php  
   $reponse = $bdd->query('SELECT * from typenorme');
                            while($donnees = $reponse->fetch())
                            {
                              
                              echo "<option value=".$donnees['type_norme'].">".$donnees['type_norme']."</option>" ; }                            
                           ?>
</select><br /><br />
<input type='hidden' name='date_ajout' value=<?php echo "'".$date."'" ?>>
	<label for='ref_norme'>Réference du Norme</label><br />
	<input type='hidden' name='type_veille' value='publication_normative'>
	<input type='text' id='ref_text'  name='ref_norme' required><br /><br />
	<label for='objet' >Titre</label><br />
	<textarea type='text'  cols="45" rows="20" id='objet' name='titre' required></textarea><br /><br />
	<label for='norme_cetime' > Norme du CETIM</label><br />
	<textarea  type='text' cols="45" rows="20" id='norme' name='norme_cetim' required ></textarea><br />
	<label for='norme_cetime' > Norme en linge</label><br />
	<textarea  type='text' cols="45" rows="20" id='norme' name='norme_ligne' required ></textarea><br />
	<label>Associé un document</label><br />
	<input class="parcourir" type='file' name='document' id='document' value='parcourir'><br /><br />
	<input class="boutan1"  type='submit' value='Envoyer' name="submit"><br />
    <div class="annuler"><a href="admin_normative.php">Annuler</a></div>
</fieldset>
</form>

<?php 
  // lareque d'joute des lois
 	if(isset($_POST['submit'])){
			if (isset($_POST['type_norme']) && isset($_POST['ref_norme']) &&isset($_POST['titre']) &&isset($_POST['norme_cetim']) &&isset($_POST['norme_ligne'])) {
		$type=$_POST['type_norme'];
		$ref=$_POST['ref_norme'];
		$titre=$_POST['titre'];
		$norme_cetim=$_POST['norme_cetim'];
		$norme_ligne=$_POST['norme_ligne'];
		$typev=$_POST['type_veille'];
		$date_ajout=$_POST['date_ajout'];
	
			 if ( !empty($_FILES['document']['name']) )
                        {
                            move_uploaded_file($_FILES['document']['tmp_name'], 'pdf/'.basename($_FILES['document']['name']));
                            $_POST['document'] = 'pdf/'.$_FILES['document']['name'];
                        }

					$document=$_POST['document'];
	
			$sql= "INSERT INTO publication (type_norme,reference,objet,norme_cetim,norme_online,type_veille,chemain_pdf,date_ajout) VALUES ( '$type','$ref','$titre','$norme_cetim', '$norme_ligne','$typev','$document','$date_ajout')";

		$req= $bdd->exec($sql);
		//style de msd de succe avec js
		echo "<h3 class='succe'>Norme à été bien ajouté<img src='images/b1.ico'></h3>";
	}
    

}
		  			 	

				  
  ?>
