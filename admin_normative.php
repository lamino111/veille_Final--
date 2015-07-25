<html>
<head>
	<title>vieulleur normative</title>
	 <meta charset="utf-8">
	 <link rel="stylesheet" href="style.css">
	  <script type="text/javascript" src="libs/jquery/jquery-1.11.2.min.js"></script>
	 <script src="libs/jquery/style.js"></script>
</head>
<body>
	<?php  session_start(); 
		if(isset($_SESSION['ID_norm'])){ 
			?>

	<div class='bbody'>	
	<header>
		<?php
		 echo"<div class='bienvenue'><a href='admin_normative.php?page=gere'>Bienvenue <br /> ".$_SESSION['ID_norm']."<span>Pour modifier votre compte cliquez ici...!</span> </a></div>" ;?>
		<?php    include ('include/menu_norme_hor.php');    ?>  
	</header>
	
	<section>
		
		<?php 
		if(isset($_GET['page'])){
			if($_GET['page']==1){ include('page_norme/ajout_norme.php'); 
                 echo' <div class="div_lod">
		 	 <samp class="lod lod_1"></samp>
                  Chargement...
		 </div>';}
			elseif($_GET['page']==3){ include('page_norme/modif_norme.php'); }
			elseif($_GET['page']==4){ include('page_norme/affiche_norme.php'); }
			elseif($_GET['page']==5){ include('page_norme/10_norme.php'); }
			elseif($_GET['page']==12){ include('page_norme/actu_norme.php'); }
			elseif($_GET['page']==6){ include('page_norme/type_norme.php'); }
			elseif($_GET['page']==7){ include('page_norme/pub_norm.php'); }
			elseif($_GET['page']=='gere'){ include('gere_compt.php'); }

		}else echo"<p> veuiller choisir une option des menus proposé SVP !!!</p>";

		 ?>
	</section>	
	<aside  class='float_gauche'>
		<?php   include('include/menu_norme_ver.php');   ?>
		<div class="aside">
			<h2>actualité sur:</h2>
			<a href="http://www.google.com"><img class="google" src="images/google.ico" alt="google"></a>
            <a href="http://www.facebook.com"><img class="facebook" src="images/facebook.ico" alt="fac"></a>
            <a href="http://www.twitter.com"><img class="twitter" src="images/twitter.ico" alt="fac"></a>
		</div>
	</aside>




	<footer><?php include ('include/footer_admin.php');  ?></footer>


		</div>
	</body>
</html>
<?php }else header('location:index.php') ;?>