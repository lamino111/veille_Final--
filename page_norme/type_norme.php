<?php  include_once('fonctions/connexion_bdd.php');  include('classes/modele.class.php') ?>

<h1>Ajouté un Type du Norme</h1>
<p>Entrer le type du norme que vous voulez Ajouter</p>
<fieldset>
<form method='POST' action='#'>
	
	<label for='nature_text'>Ajouter Type du Norme</label><br />
	<input type='text' id='type_norme'  name='ajout_type_norme' required><br />
	
	<input class="boutan1"  type='submit' value='Enregistrer' name="submit"><br />
    <div class="annuler"><a href="admin_normative.php?page=1">Annuler</a></div>
</fieldset>
</form>
<?php 
if(isset($_GET['supprime'])){
            
            $sql="DELETE FROM typenorme WHERE id =".$_GET['supprime'];
            $req=$bdd->exec($sql);
                }

                $type = new modele('typenorme');
                $p= $type->find(array(
                    "fields"=>"*",
                 
                    ));
                echo "<h2>type existant:</h2>";
                 foreach ($p as $o){
                  echo   $o['type_norme']."<a href='admin_normative.php?page=6&supprime=".$o['id']."'>supprimé</a><br>" ;

                }




    if (isset($_POST["submit"])) {
    	if (isset($_POST["ajout_type_norme"])) {
    		$typeNorme = $_POST['ajout_type_norme'];
    		$sql = "INSERT INTO typenorme (type_norme) VALUES ('$typeNorme')";
    		$req= $bdd->exec($sql);
    	}
    }

 ?>