<?php  include_once('fonctions/connexion_bdd.php');include('classes/modele.class.php')   ?>

<h1>Ajouté une Nature du text</h1>
<p>Entrer la nature du text que vous voulez Ajouter</p>
<fieldset>
<form method='POST' action='#'>
	

	
	<label for='nature_text'>Ajouter nature du text</label><br />
	<input type='text' id='ref_text'  name='ajout_natur_text' required><br />
	
	<input class="boutan1"  type='submit' value='Enregistrer' name="submit"><br />
    <div class="annuler"><a href="admin_juridique.php">Annuler</a></div>
</fieldset>
</form>
<?php 
if(isset($_GET['supprime'])){
            
            $sql="DELETE FROM nature_text WHERE id =".$_GET['supprime'];
            $req=$bdd->exec($sql);
                }

                $type = new modele('nature_text');
                $p= $type->find(array(
                    "fields"=>"*",
                 
                    ));
                echo "<h2>type existant:</h2>";
                 foreach ($p as $o){
                    
                  echo   $o['nature_text']."<a href='admin_juridique.php?page=5&supprime=".$o['id']."'>supprimé</a><br>" ;

                }


    if (isset($_POST["submit"])) {
    	if (isset($_POST["ajout_natur_text"])) {
    		$NatureText = $_POST['ajout_natur_text'];
    		$sql = "INSERT INTO nature_text (nature_text) VALUES ('$NatureText')";
    		$req= $bdd->exec($sql);
    	}
    }

 ?>