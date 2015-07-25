<html>
<head>
	<title>vieulleur technologique</title>
	 <meta charset="utf-8">
	 <link rel="stylesheet" href="style.css">
	  <script type="text/javascript" src="libs/jquery/jquery-1.11.2.min.js"></script>
	 <script src="libs/jquery/style.js"></script>
</head>
<body>
	<?php  session_start(); 
		if(isset($_SESSION['ID_tech'])){ 
			?>
	<div class='bbody'>	
	<header>
		<?php
		 echo"<div class='bienvenue'><a href='admin_technologique.php?page=gere'>Bienvenue <br />".$_SESSION['ID_tech']."<span>Pour modifier votre compte cliquez ici...!</span> </a></div>" ;?>
		<?php    include ('include/menu_techno_hor.php');    ?>  
	</header>
	
	<section >
		<?php 
		if(isset($_GET['page'])){
			if($_GET['page']==2){ include('page_techno/ajout_techno.php'); 
                  echo' <div class="div_lod">
		 	 <samp class="lod lod_1"></samp>
                  Chargement...
		 </div>';}
			elseif($_GET['page']==4){ include('page_techno/modif_techno.php'); }
			elseif($_GET['page']==1){ include('page_techno/affiche_techno.php'); }
			elseif($_GET['page']==5){ include('page_techno/10_techno.php'); }
			elseif($_GET['page']==12){ include('page_techno/actu_techno.php'); }
			elseif($_GET['page']==6){ include('page_techno/pub_tech.php'); }
			elseif($_GET['page']=='gere'){ include('gere_compt.php'); }

		}else echo"<p> veuiller choisir une option des menus proposé SVP !!!</p>";

		 ?>







	</section>	

<aside  class='float_gauche'>
		<?php   include('include/menu_techno_ver.php');   ?>
		<div class="aside">
			<h2>actualité sur:</h2>
			<a href="http://www.google.com"><img class="google" src="images/google.ico" alt="google"></a>
            <a href="http://www.facebook.com"><img class="facebook" src="images/facebook.ico" alt="fac"></a>
            <a href="http://www.twitter.com"><img class="twitter" src="images/twitter.ico" alt="fac"></a>
            
            
		</div>
</aside>




	<footer ><?php include ('include/footer_admin.php');  ?></footer>

<?php }else header('location:index.php') ;?>
</div>
</body>
</html>