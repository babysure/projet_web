<?php 

include_once("config_DB.php") ; 

class Categorie{

    private $id ;

    private $descriptif ; 

    const NOM_BD = NOM_BD ;
    const LOGIN_USER_BD = LOGIN_USER_BD ;
    const HOST_DB = HOST_DB ;
    const MDP_USER_BD = MDP_USER_BD ;

    function __construct(
        $descriptif
    ){
        self::setDescriptif($descriptif);         
    }

    public static function getAllCategories(){

        $sql = "SELECT * FROM categorie"; 

        $connexion =@mysqli_connect(self::HOST_DB , self::LOGIN_USER_BD , self::MDP_USER_BD , self::NOM_BD ) or die("Erreur de connexion") ;

        $tab =  array() ; 

        $res=mysqli_query( $connexion, $sql) ; 

            
        while ($row = mysqli_fetch_assoc($res) ) {
            
            

            $categorie=  new Categorie($row["descriptif"]) ; 

            $categorie->id = $row["id_categorie"] ;

            $tab[] = $categorie ;
        }

        return $tab ; 

    }

    public static function findById($id){

        $sql = "SELECT * FROM categories WHERE id_categorie= $id";
        
        $connexion =@mysqli_connect(self::HOST_DB , self::LOGIN_USER_BD , self::MDP_USER_BD , self::NOM_BD ) or die("Erreur de connexion") ;

        $res=mysqli_query( $connexion, $sql) ; 

        $row = mysqli_fetch_assoc($res) ;

        $categorie=  new Categorie($row["descriptif"]) ; 

        $categorie->id = $row["id_categorie"] ;

        return $categorie ; 


    }


    public function enregistrer(){

        $connexion =@mysqli_connect(self::HOST_DB , self::LOGIN_USER_BD , self::MDP_USER_BD , self::NOM_BD ) or die("Erreur de connexion") ;

        $sql = "INSERT INTO categorie(descriptif ) VALUES  ( '$this->descriptif' )";
        
        $res=mysqli_query($connexion,$sql) ; 
    }

    public function getId(){

        return $this->id ; 
    }

    public function setDescriptif($descriptif){

        $this->descriptif = $descriptif ;

        return $this ; 

    }

    public function getDescriptif(){

        return $this->descriptif ; 
    }






}




?>