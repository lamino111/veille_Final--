<?php
// Connexion à la base de données
 try
 { 
     
    $bdd = new PDO('mysql:host=localhost;dbname=cetim2015', 'root', '');
 
   $bdd->query('SET NAMES utf8');
  }
 catch(Exception $e)
 {
   die('Erreur : '.$e->getMessage());
 }

?>