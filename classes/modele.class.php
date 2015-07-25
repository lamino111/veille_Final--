<?php 
class modele {

	  public $id;
      public $table;
      public $bdd;


 public function __construct($table)
      {
        $this->table = $table;
        try
         { 
           
           $this->bdd = new PDO('mysql:host=localhost;dbname=cetim2015', 'root', '');
           
          $this->bdd->query('SET NAMES utf8');
          }
         catch(Exception $e)
         {
           die('Erreur : '.$e->getMessage());
         }

      }




     //la fonction pour afficher quelque chose avec des condition order by .. limit ..ext 
 public function find($data=array())
      {
        $conditions = "1 = 1";
        $fields = "*";
        $limit = "";
        $order = " Id DESC ";
        if (isset($data['conditions']) && ($data['conditions'] !== "")) { $conditions = $data['conditions'];  }
        if (isset($data['fields'])) { $fields = $data['fields'];  }
        if (isset($data['limit'])) { $limit = " LIMIT ".$data['limit'];  }
        $sql = "SELECT ".$fields." FROM ".$this->table." WHERE ".$conditions." ORDER BY ".$order.$limit;
        
        $query = $this->bdd->prepare($sql); //preparer requete

        $query->execute(); // excution de la requete

        $t = array(); // on déclare un tableau pour stocker le résultat aprés
        while ($resultat = $query->fetch()) 
        {
          $t[] = $resultat;
        }

        return $t;

      }
public function conte($param=null,$cond=null){
  
                   $query= $this->bdd->prepare("SELECT count(Id) as Nb FROM ".$this->table."WHERE".$param = $cond );
                    $query->execute();
                    $data=$query->fetch();
                    $n = $data['Nb'];

                    return $n;
                    
}








public function del($id)//modifer le statut
      {
        $sql = "UPDATE ".$this->table." SET ";
          $sql .= " StatutOffre = 3";
          $sql .= " WHERE Id =".$id; 

          $quer= $this->bdd->prepare($sql);
          $quer->execute(); // excution de la requete
      }

      public function stat()//modifer stattistique
      {
         $sql = "UPDATE ".$this->table." SET ";
          $sql .= " Stat = Stat + 1";
          $sql .= " WHERE Id = ".$this->id; 
          $quer= $this->bdd->prepare($sql);
          $quer->execute(); // excution de la requete
      }















}
	

 ?>