<h1>Les actualiter RSS</h1>
	
			<?php
//Chargement du flux RSS
	echo "<div class='flux_style'>";
if($flux = simplexml_load_file('http://www.afnor.org/rss/feed/Normalisation'))
{
   $donnee = $flux->channel;

   //Lecture des données

   foreach($donnee->item as $valeur)
   {
      //Affichages des données

      echo '<p class="rss_date">'.date("d/m/Y h:m:s",strtotime($valeur->pubDate)).'</p><p class="rss_text"><a class="rss_lein" href="'.$valeur->link.'">'.utf8_decode($valeur->title).'</a>';
      echo '<br/>'.utf8_decode($valeur->description).'</p>';
   }
}else echo 'Erreur de lecture du flux RSS';
echo "</div>"
?>
