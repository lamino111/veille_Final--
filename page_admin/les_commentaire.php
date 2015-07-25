<?php include('fonctions/connexion_bdd.php') ?> 
<h1>  Liste de tous les commentaire</h1>

<?php 

     if(isset($_GET['submit'])){
			if (isset($_GET['checked'])) {
		
	
		$sql="DELETE  FROM `commentaire` ";
		$req=$bdd->exec($sql);
	   echo  "b1 supprime ";}}

 ?>
<?php  
if(isset($_GET['supprime'])){
			
			$sql="DELETE FROM commentaire WHERE id =".$_GET['supprime'];
			$req=$bdd->exec($sql);
				}
$sql="SELECT * FROM commentaire";
		$data=$bdd->query($sql);?>

		 <div class="affiche_util">
         <table>
            <tr>
                <th>Matricule</th>
                <th>Le contenu</th>
                <th>Date d'ajout</th>
                 <th>Supprimer</th>
            </tr>
           

		<?php while($result = $data->fetch()){

			
			 echo"<tr>";
			echo "<td>".$result['mat_p']."</td>";
			echo "<td>".$result['objet']."</td>";
			echo "<td>".$result['date_ajout']."</td><td><a href='admin.php?page=14&supprime=".$result['id']."'>supprimé</a></td>";
			
			 echo"</tr>";
		}?>
		 </table>
       </div>

       <p class='selec'>Sélectionner tous</p>
     <form method="GET" action="">
     	<div class="check">
        <input type="checkbox" name="checked" value="supp" id="rounded" >
        <input   type='hidden'  name='page' value='14'>
        <label for="rounded"></label>
      </div>
         <input class="sup_tous" type='submit'  name='submit' value='Supprimer'>
     </form>
 







