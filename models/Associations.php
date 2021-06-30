<?php

class Associations {

    // Connexion
    private $connexion;
    private $table = "associations";

    // Objets
    public $id;
    public $nom;
    public $logo;
    public $description;
    public $mail;
    public $facebook;
    public $twitter;
    public $instagram;
    public $discord;
    public $created_at;

    /**
     * Constructeur avec $db pout la connexion à la base de données
     * 
     * @params $db
     */
    public function __construct($db)
    {

        $this->connexion = $db;

    }

    /**
     * Lecture des produits
     * 
     * @return void
     */
    public function lire()
    {
        $sql = "SELECT * FROM associations ORDER BY nom ASC";

        $query = $this->connexion->prepare($sql);

        $query->execute();

        return $query;
    }

    public function creer()
    {
        $sql = "INSERT INTO " . $this->table . "

        SET 
        nom=:nom,
        logo=:logo, 
        description=:description, 
        mail=:mail, 
        facebook=:facebook, 
        twitter=:twitter, 
        instagram=:instagram, 
        discord=:discord
        ";

        $query = $this->connexion->prepare($sql);

        $this->nom=htmlspecialchars(strip_tags($this->nom));
        $this->logo=htmlspecialchars(strip_tags($this->logo));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->mail=htmlspecialchars(strip_tags($this->mail));
        $this->facebook=htmlspecialchars(strip_tags($this->facebook));
        $this->twitter=htmlspecialchars(strip_tags($this->twitter));
        $this->instagram=htmlspecialchars(strip_tags($this->instagram));
        $this->discord=htmlspecialchars(strip_tags($this->discord));

        $query->bindParam(":nom", $this->nom);
        $query->bindParam(":logo", $this->logo);
        $query->bindParam(":description", $this->description);
        $query->bindParam(":mail", $this->mail);
        $query->bindParam(":facebook", $this->facebook);
        $query->bindParam(":twitter", $this->twitter);
        $query->bindParam(":instagram", $this->instagram);
        $query->bindParam(":discord", $this->discord);

        if($query->execute()) {
            return true;
        }

        return false;

    }

    public function supprimer() {
        $sql = "DELETE FROM " . $this->table . " WHERE id = ?";

        $query = $this->connexion->prepare( $sql );
        
        $this->id=htmlspecialchars(strip_tags($this->id));

        $query->bindParam(1, $this->id);

        if($query->execute()) {
            return true;
        }

        return false;
    }

    public function modifier() {
        $sql = "UPDATE " . $this->table . "
        SET 
        nom=:nom,
        logo=:logo, 
        description=:description, 
        mail=:mail, 
        facebook=:facebook, 
        twitter=:twitter, 
        instagram=:instagram, 
        discord=:discord
        WHERE id = :id";

        $query = $this->connexion->prepare($sql);

        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->nom=htmlspecialchars(strip_tags($this->nom));
        $this->logo=htmlspecialchars(strip_tags($this->logo));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->mail=htmlspecialchars(strip_tags($this->mail));
        $this->facebook=htmlspecialchars(strip_tags($this->facebook));
        $this->twitter=htmlspecialchars(strip_tags($this->twitter));
        $this->instagram=htmlspecialchars(strip_tags($this->instagram));
        $this->discord=htmlspecialchars(strip_tags($this->discord));

        $query->bindParam(":id", $this->id);
        $query->bindParam(":nom", $this->nom);
        $query->bindParam(":logo", $this->logo);
        $query->bindParam(":description", $this->description);
        $query->bindParam(":mail", $this->mail);
        $query->bindParam(":facebook", $this->facebook);
        $query->bindParam(":twitter", $this->twitter);
        $query->bindParam(":instagram", $this->instagram);
        $query->bindParam(":discord", $this->discord);

        if($query->execute()) {
            return true;
        }

        return false;
    }

}