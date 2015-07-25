
 <?php include('Fonctions/connexion_bdd.php');

 ?>
<fieldset id="gere">
<form  method="POST"  action="#"> 
<input  type="hidden"  name="page" value='gere'>
<label for='actu'> changer mot de passe:</label><br />
<input  type="password"  id='actu' name='psw'><br />
<input class="boutan1"  type='submit' name='submit' value='appliquer'><br />

<?php    
		

	if ($_SESSION['job']=="admin") {  echo"  <div class='annuler'><a href='admin.php'>Annuler</a></div>";}
	if ($_SESSION['job']=="employer") {  echo" <div class='annuler'><a href='employe.php'>Annuler</a></div>";}
	if(isset($_SESSION['job2'])){
	if ($_SESSION['job2']=="veilleurN") {  echo"  <div class='annuler'><a href='admin_normative.php'>Annuler</a></div>";}
	if ($_SESSION['job2']=="veilleurJ") {  echo"  <div class='annuler'><a href='admin_juridique.php'>Annuler</a></div>";}
	if ($_SESSION['job2']=="veilleurT") {  echo"  <div class='annuler'><a href='admin_technologique.php'>Annuler</a></div>";}

}

   ?>

</fieldset>
</form>

<?php 

//$sql=" UPDATE  admin SET password = 'nnn'"
/*$sql = "UPDATE admin SET";
          $sql .= " password = 'ccc' ";//.$pass;
          $sql .= " WHERE id =".$_SESSION['id']; 
          $quer= $bdd->prepare($sql);
          $quer->execute(); // excution de la requete*/





	if(isset($_POST['submit'])){
		
		
		if (isset($_POST['psw'])) {
                    $pass=$_POST['psw'];

			if ($_SESSION['job']=="admin") {
                    

                  
               $test=$bdd->exec("UPDATE admin SET password= '$pass' where id=".$_SESSION['id'] );  
                 echo "mot de passe bien changer";
			
			}elseif($_SESSION['job']=="veilleur") {

				$test=$bdd->exec("UPDATE veilleur SET password= '$pass' where id=".$_SESSION['id'] ); 

			echo "mot de passe bien changer";
		}elseif ($_SESSION['job']=="employer") {
               
               

               $test=$bdd->exec("UPDATE employer SET password= '$pass' where id=".$_SESSION['id'] ); 
			
          echo "mot de passe bien changer emp";
			# code...
		}



	}
}

 ?>