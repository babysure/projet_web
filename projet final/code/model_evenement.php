<?php 

include_once("config_DB.php") ;
/*
* Dans le cadre de notre cours d'ingénierie logicielle  nous avions vue qu'il était préférable d'utiliser le patern DAO pour la partie modèle
*/ 
class Evenement{

    const NOM_BD = NOM_BD ;
    const LOGIN_USER_BD = LOGIN_USER_BD ;
    const HOST_DB = HOST_DB ;
    const MDP_USER_BD = MDP_USER_BD ;

    private $id ; 

    private $titre ; 

    private $debut ; 
    
    private $fin ; 

    private $lieu ; 

    private $categorie ; 

    private $statut ; 

    private $description ; 

    function __construct(
        $titre,
        $debut,
        $fin,
        $lieu,
        $categorie, // id_categorie
        $statut, // id_statut
        $description,
        $id = ''
    ){
        self::setTitre($titre);
        self::setDebut($debut);
        self::setFin($fin);
        self::setLieu($lieu);
        self::setCategorie($categorie);
        self::setStatut($statut);
        self::setDescription($description);
        
        $this->id = $id ; 
    }

    

    public static function findById($id){

        
        $sql = "SELECT * FROM evenement WHERE id_evenement=$id"; 

        $connexion =@mysqli_connect(self::HOST_DB , self::LOGIN_USER_BD , self::MDP_USER_BD , self::NOM_BD ) or die("Erreur de connexion") ;

        $res=mysqli_query( $connexion, $sql) ; 

        $row = mysqli_fetch_assoc($res) ;

        $event =  new Evenement($row["titre"], $row["debut"] , $row["fin"] , $row["lieu"], $row["id_categorie"] , $row["id_statut"] , $row["description"] ) ;

        $event->id =  $row["id_evenement"] ; 

        return $event ;
    }



    /*
    *   entré : $_SESSION['jour_selec'] :  DateTime
    *   sortie :  évènement semaine relative  : array ( Evenement )
    */
    public static function searchEventsOfWeek($date){
        
        $date = new DateTime($date->format("d-m-Y")) ;
        
        $date->modify('-3 day') ; 

        $debut_semaine =  $date->format("Y-m-d") ;
        
        $date->modify('+6 day') ; 

        $fin_semaine = $date->format("Y-m-d") ; 

        $sql = "SELECT * FROM evenement WHERE ( '$debut_semaine' BETWEEN CAST( evenement.debut AS DATE )  AND CAST( evenement.fin AS DATE ) ) OR ( '$fin_semaine' BETWEEN  CAST( evenement.debut AS DATE ) AND CAST( evenement.debut AS DATE ) ) OR ( CAST( evenement.debut AS DATE ) BETWEEN '$debut_semaine' AND '$fin_semaine')  ORDER BY evenement.debut"; 

        $connexion =@mysqli_connect(self::HOST_DB , self::LOGIN_USER_BD , self::MDP_USER_BD , self::NOM_BD ) or die("Erreur de connexion") ;

        $res=mysqli_query( $connexion, $sql) ; 
        $tab = array() ;

        while ($row = mysqli_fetch_assoc($res) ) {
            
            $event =  new Evenement($row["titre"], $row["debut"] , $row["fin"] , $row["lieu"], $row["id_categorie"] , $row["id_statut"] , $row["description"] ) ;

            $event->id =  $row["id_evenement"] ; 
            
            $tab[] = $event ;
            
        } 

        return $tab ; 

    }

    
    public function enregistrer(){

        
        $connexion =@mysqli_connect(self::HOST_DB , self::LOGIN_USER_BD , self::MDP_USER_BD , self::NOM_BD ) or die("Erreur de connexion") ;
        
        if($this->id){

            $event = self::findById($this->id) ;
        }else {
            $event =  "" ; 
        }
        

        
        if($event){

            $sql = "UPDATE  evenement SET titre='$this->titre' , debut='".$this->debut->format("Y-m-d\TH:i:s")."' , fin= '".$this->fin->format("Y-m-d\TH:i:s")."' , lieu='$this->lieu',  id_categorie='$this->categorie' , id_statut='$this->statut' , description='$this->description'  WHERE id_evenement=$this->id"; 
        
        }else {
            
            $sql = "INSERT INTO evenement(titre, debut , fin , lieu , id_categorie , id_statut, description ) VALUES  ( '$this->titre' , '".$this->debut->format('Y-m-d\TH:i:s')."', '".$this->fin->format('Y-m-d\TH:i:s')."' ,'$this->lieu' , '$this->categorie', '$this->statut', '$this->description' )"; 
        }

        $res=mysqli_query($connexion,$sql) ; 

       
    }


    public function suprimer(){
         
        $connexion =@mysqli_connect(self::HOST_DB , self::LOGIN_USER_BD , self::MDP_USER_BD , self::NOM_BD ) or die("Erreur de connexion") ;

        if($this->id){

            $sql = "DELETE FROM evenement WHERE id_evenement=$this->id" ;
            $res=mysqli_query($connexion,$sql) ;
            
        }

    }

    public function getId(){

        return $this->id ; 
    }

    public function getTitre(){

        return $this->titre ;
    }

    public function setTitre($titre){

        if(  is_string($titre) ){
            $this->titre = $titre ;
        }else {
            $this->titre = "Pas de titre" ; 
        }

        
        return $this ; 
    }

    public function getDebut(){

        return $this->debut ; 
    }

    public function setDebut($debut){

        if( $debut instanceof DateTime){

            $this->debut = new DateTime( $debut->format("Y-m-d\TH:i:s") );
        }else {

            $this->debut = new DateTime($debut) ; 

        }

        
        return $this ; 
    }

    public function getFin(){
        return $this->fin ;
    }

    public function setFin($fin){

   if( $fin instanceof DateTime){

            $this->fin = new DateTime( $fin->format("Y-m-d\TH:i:s") );
        }else {

            $this->fin = new DateTime($fin) ; 

        }

        return $this ; 
    }

    public function getLieu(){

        return $this->lieu ;
    }

    public function setLieu($lieu){
       
        if(  is_string($lieu)){
            $this->lieu = $lieu ;
        }else {
            $this->lieu = "Pas de lieu" ; 
        }

        return $this ;
    }

    public function getIdCategorie(){
        return $this->categorie ; 
    }

    public function getCategorie(){

        $id =  $this->categorie ;

        $sql = "SELECT * FROM categorie WHERE id_categorie = $id"; 

        $connexion =@mysqli_connect(self::HOST_DB , self::LOGIN_USER_BD , self::MDP_USER_BD , self::NOM_BD ) or die("Erreur de connexion") ;

        $res=mysqli_query($connexion,$sql) ; 
        
        if(mysqli_num_rows($res)){

            return mysqli_fetch_assoc($res)["descriptif"] ;

        }else {

            return "Inconnue" ; 
        }

        

    }

    public function setCategorie($categorie){
        $this->categorie = $categorie ;
        return $this ; 
    }

    public function getIdStatut(){
        return $this->statut ;
    }

    public function getStatut(){
        
        $id =  $this->statut ;

        $sql = "SELECT * FROM statut WHERE id_statut = $id"; 

        $connexion =@mysqli_connect(self::HOST_DB , self::LOGIN_USER_BD , self::MDP_USER_BD , self::NOM_BD ) or die("Erreur de connexion") ;

        $res=mysqli_query($connexion,$sql) ; 
        

        if(mysqli_num_rows($res)){

            return mysqli_fetch_assoc($res)["descriptif"] ;

        }else {

            return "Inconnu" ; 
        }

    }

    public function setStatut($statut){
        $this->statut = $statut ; 
        return $this ; 
    }

    public function getDescription(){
        
        return $this->description ; 
    }

    public function setDescription($description){
        $this->description = $description ; 
        return $this ; 
    }



}

