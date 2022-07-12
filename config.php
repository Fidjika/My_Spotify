<?php


namespace BbbConnection;

use PDO;
use Exception;

class connect_to_bdd{

    private $mdp = "Loloti13";
    private $id = "charlotte";

    function bddConnect(){
        try{
          return new PDO ("mysql:host=localhost;dbname=spotify;charset=utf8", $this->id, $this->mdp);

        }catch(Exception $e){
          die('Erreur' . $e->getMessage());
        };
    }

};

?>

