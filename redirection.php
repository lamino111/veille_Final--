
	 <link rel="stylesheet" href="style.css">



<?php 
include('classes/modele.class.php');
session_start(); 
 ?>

<?php
include_once('Fonctions/connexion_bdd.php');
if(isset($_POST['login']) && isset($_POST['psw'])){
//verifier dans les admin
$admin = new modele('admin');
$admin_m = $admin->find(array("fields"=>"login,password,matricule,nom,prenom,id"));	
foreach ($admin_m as $tab1){
	if(($_POST['login']==$tab1['login']) &&($_POST['psw']==$tab1['password'])){
			$_SESSION['ID_admin']=$tab1['nom'];
			$_SESSION['nom']=$tab1['nom'];
			$_SESSION['matricule'] = $tab1['matricule'];
			$_SESSION['job']="admin"; 
			$_SESSION['id']=$tab1['id'];
			header('location:admin.php');
			}}
	
// verifier dans les utilisateur


$employer = new modele('employer');
$employer_m = $employer->find(array("fields"=>"id,login,password,matricule,nom,prenom"));
foreach ($employer_m as $tab3){
	if(($_POST['login']==$tab3['login'] )&&($_POST['psw']==$tab3['password'] )){

	$_SESSION['ID_empl']=$tab3['nom'];
	$_SESSION['nom']=$tab3['nom'];
	$_SESSION['matricule']=$tab3['matricule']; 
	$_SESSION['job']="employer";
	$_SESSION['id']=$tab3['id']; 

	header('location:employe.php');
		}
	}

$veilleur = new modele('veilleur');
$veilleur_m = $veilleur->find(array("fields"=>" id,login,password,matricule,nom,prenom,type_veille"));
foreach ($veilleur_m as $tab2){
if(($_POST['login']==$tab2['login'])&&($_POST['psw']==$tab2['password'])){
		if($tab2['type_veille']=="Veilleur Normative"){
			$_SESSION['ID_norm']=$tab2['nom'];
			$_SESSION['nom']=$tab2['nom'];
			$_SESSION['matricule']=$tab2['matricule'];
			$_SESSION['job']="veilleur"; 
			$_SESSION['job2']="veilleurN"; 
			$_SESSION['id']=$tab2['id'];
			header('location:admin_normative.php');}

		elseif ($tab2['type_veille']=="Veilleur Juridique") {
			$_SESSION['ID_juri']=$tab2['nom'];
			$_SESSION['nom']=$tab2['nom'];
			$_SESSION['matricule']=$tab2['matricule'];
			$_SESSION['job']="veilleur"; 
			$_SESSION['job2']="veilleurJ"; 
			$_SESSION['id']=$tab2['id']; 
			header('location:admin_juridique.php');}
		elseif ($tab2['type_veille'] =="Veilleur Technologique") { 
			$_SESSION['ID_tech']=$tab2['nom'];
			$_SESSION['nom']=$tab2['nom'];
			$_SESSION['matricule']=$tab2['matricule'];
			$_SESSION['job']="veilleur";
			$_SESSION['job2']="veilleurT"; 
			$_SESSION['id']=$tab2['id']; 
			header('location:admin_technologique.php');
			# code...
		}
		
		
   
}
else{
	echo "<div id='divred'><h1>votre mot de passe ou votre login est incorecte ! <a href='index.php'>Clic ici pour reessyer</a><h1></div>";

		}

	}
}else{
    echo"remplit les champs SVP !";
}

 ?>
