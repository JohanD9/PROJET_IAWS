<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BDDobjet
 *
 * @author jdebat
 */
class BDDobjet extends PDO {
    private $db = 'LoopPasTonBus';               // base de données
    private $host = 'localhost';                  // adresse de la base
    private $user = 'root';                 // nom
    private $pwd = 'jojo654852';            // mot de passe
    private $con;                           // 
    private $select;                        // requette de séléction
    private $execute;                       // requette d'execution
    private $email='johan.debat@gmail.com';     // email de l'admin du site
    private $dns;
      
    public function __construct () 
    {
        try 
        {
            $this->con = parent::__construct($this->getDns(), $this->user, $this->pwd);
            // pour mysql on active le cache de requête
            if($this->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql')
                $this->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            return $this->con;
        }
        catch(PDOException $e) {
            //On indique par email qu'on n'a plus de connection disponible
            error_log(date('D/m/y').' à '.date("H:i:s").' : '.$e->getMessage(), 1, $this->email);
            $message= new Message();
            $message->outPut('Erreur 500', 'Serveur de BDD indisponible, nous nous excusons de la gêne occasionnée');
        }
    }
    
    public function select($reqSelect)
    {
        try
        {
            $this->con = parent::beginTransaction();
            //$result= parent::query($reqSelect);
            $result = parent::prepare($reqSelect);
            $result->execute();
            $this->con = parent::commit();
            // ou
            // $this->con = parent::rollBack();
              return $result;
        }
        catch (Exception $e) 
        {
            //On indique par email que la requête n'a pas fonctionné.
            error_log(date('D/m/y').' à '.date("H:i:s").' : '.$e->getMessage(), 1, 'artotal@gmail.com');
            $this->con =parent::rollBack();
            $message= new Message();
            $message->outPut('Erreur dans la requêtte', 'Votre requête a été abandonné');
        }
    }
    
    // renvoie un tableau que l'on peux travailler avec count($result)...
    public function selectTableau($reqSelect)
    {
        $result = parent::prepare($reqSelect);
        $result->execute();
        /* Récupération de toutes les lignes d'un jeu de résultats "équivalent à mysql_num_row() " */
        $resultat = $result->fetchAll();
        return $resultat;
    }
    
    // renvoie un tableau que l'on peux travailler avec count($result)...
    public function selectFirstTableau($reqSelect)
    {
        $result = parent::prepare($reqSelect);
        $result->execute();
        /* Récupération de toutes les lignes d'un jeu de résultats "équivalent à mysql_num_row() " */
        $resultat = $result->fetch();
        return $resultat;
    }
    
    // renvoie le nombre de lignes retournées
    public function selectCount($reqSelect)
    {
        $result = parent::prepare($reqSelect);
        $result->execute();
        /* Récupération de toutes les lignes d'un jeu de résultats "équivalent à mysql_num_row() " */
        $resultat = $result->rowCount();
        return $resultat;
    }

    // on change le type de base ici
    public function getDns()
    {
        return 'mysql:dbname='.$this->db.';host='.$this->host;
    } 
}
