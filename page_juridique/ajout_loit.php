 <?php  include_once('fonctions/connexion_bdd.php');   ?>



<h1>Ajouté une lois</h1>
<p> Vous devez remplire le formulaire poure ajouter un lois</p>
<?php   $date=date('Y-m-j') ; ?>
<fieldset>
<form method='POST' action='#'  enctype="multipart/form-data" >
	<?php //hada lien ver un formulaire pour ajouter une nature du text ?>
	<div class="nature_text"><a href="admin_juridique.php?page=5">Cliquez ici pour Ajouter Nature du text</a></div>
	<label for='nature_text'>Nature du text</label><br />

	<select  name='nature_text'><br />
	<?php  
   $reponse = $bdd->query('SELECT * from nature_text');
                            while($donnees = $reponse->fetch())
                            {
                              
                              echo "<option value=".$donnees['nature_text'].">".$donnees['nature_text']."</option>" ; }                            
                           ?>
</select><br />
   
	<label for='ref_text'>Réference du text</label><br />
	<input type='hidden' name='type_veille' value='publication_juridique'>
	<input type='hidden' name='date_ajout' value=<?php echo "'".$date."'" ?>>
	<input type='text' id='ref_text'  name='ref_text' required><br />
	<label for='num_journale'> N° du Journale Officiel </label><br />
	<input type='text' id='num_journale' name='num_journale'  required><br /><br />
	<label for='objet' >Objet</label><br />
	<textarea type='text' cols="45" rows="20"  id='objet' name='objet' required></textarea><br /><br />
	<label for='point' > Points essentiels</label><br />
	<textarea  type='text' cols="45" rows="20"  id='point' name='point' required ></textarea><br />
	<label>Associé un document</label><br />
	<input class="parcourir" type='file' name='document' id='document'><br /><br />
	<input class="boutan1"  type='submit' value='Envoyer' name="submit"><br />
    <div class="annuler"><a href="admin_juridique.php">Annuler</a></div>
   
</fieldset>
</form>
<?php 
  // lareque d'joute des lois
 	if(isset($_POST['submit'])){
			if (isset($_POST['nature_text']) && isset($_POST['ref_text']) &&isset($_POST['num_journale']) &&isset($_POST['objet']) &&isset($_POST['point'])) {
		$nature=$_POST['nature_text'];
		$ref=$_POST['ref_text'];
		$num=$_POST['num_journale'];
		$objet=nl2br($_POST['objet']);
		$date_ajout=$_POST['date_ajout'];
		$point=addslashes($_POST['point']);
		$typev=$_POST['type_veille'];
		
		 if ( !empty($_FILES['document']['name']) )
                        {
                            move_uploaded_file($_FILES['document']['tmp_name'], 'pdf/'.basename($_FILES['document']['name']));
                            $_POST['document'] = 'pdf/'.$_FILES['document']['name'];
                        }

					$document=$_POST['document'];
	
				
			$sql= "INSERT INTO publication (nature_text,reference,numero_journale,objet,point_essentiel,type_veille,date_ajout,chemain_pdf) VALUES ( '$nature','$ref','$num','$objet','$point','$typev','$date_ajout','$document')";

		$req= $bdd->exec($sql);
		//style de msd de succe avec js
		echo "<h3 class='succe'> loit à été bien ajouté<img src='images/b1.ico'></h3>";
	}
    

}
		  			 	

				  
  ?>
