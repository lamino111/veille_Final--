<html>
<head>
	<title>page administrateur</title>
	 <meta charset="utf-8">
	 <link rel="stylesheet" href="style.css">
	 	<link rel="stylesheet" href="checkbox.css">
	 	<script type="text/javascript" src="libs/jquery/jquery-1.11.2.min.js"></script>
	 <script src="libs/jquery/style.js"></script>


</head>
<body>
	<?php  session_start(); 
		if(isset($_SESSION['ID_admin'])){ 
			?>
	<div class='bbody'>	
	<header>
		<?php
		 echo"<div class='bienvenue'><a href='admin.php?page=gere'>Bienvenue <br /> ".$_SESSION['ID_admin']." <span>Pour modifier votre compte cliquez ici...!</span></a></div>" ;?>
		<?php
				  {include('include/menu_admin_inclu.php'); } 

		    ?>  
	</header>
	
	<section   class="font">
		
<?php 


		if(isset($_GET['page']) &&(!empty($_GET['page'])))  {
			if($_GET['page']==1){ include('page_admin/gestion_util/affiche_util_employe.php'); }
			elseif($_GET['page']==2){include('page_admin/gestion_util/affiche_util_veilleur.php');}
			elseif($_GET['page']==3){ include('page_admin/gestion_util/ajoute_util_employe.php'); }
			elseif($_GET['page']==4){ include('page_admin/gestion_util/ajoute_util_veilleur.php'); }
			elseif($_GET['page']==5){ include('page_admin/gestion_util/supprime_util_employe.php'); }
			elseif($_GET['page']==6){ include('page_admin/gestion_util/supprime_util_veilleur.php'); }
			elseif($_GET['page']==12){ include('page_admin/gestion_util/modifier_util_employe.php');}
			elseif($_GET['page']==13){ include('page_admin/gestion_util/modifier_util_veilleur.php');}
			elseif($_GET['page']==7){ include('page_admin/gestion_dir/afficher_dir.php'); }
			elseif($_GET['page']==8){ include('page_admin/gestion_dir/ajoute_dir.php'); }
			elseif($_GET['page']==9){ include('page_admin/gestion_dir/modifier_dir.php'); }
			elseif($_GET['page']==10){ include('page_admin/gestion_dir/supprime_dir.php'); }
			elseif($_GET['page']==14){ include('page_admin/les_commentaire.php'); }
			
			elseif($_GET['page']=='jur'){ include('publication.php'); }
			elseif($_GET['page']=='norm'){ include('publication.php'); }
			elseif($_GET['page']=='tec'){ include('publication.php'); }
			elseif($_GET['page']=='gere'){ include('gere_compt.php');}

		}else echo"<p> veuiller choisir une option des menus proposé SVP !</p>";

		 ?>

	</section>	
	<footer><?php include ('include/footer_admin.php');  ?></footer>
		</div>

	<?php }else header('location:index.php') ;?>

</body>
</html>