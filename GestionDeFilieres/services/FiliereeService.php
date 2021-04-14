<?php

include_once 'beans/Filieree.php';
include_once 'connexion/Connexion.php';
include_once 'dao/IDao.php';

class FiliereeService implements IDao {

    //put your code here
    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO Filieree VALUES (NULL,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(), $o->getLibelle())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM Filieree WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAlll() {
        $query = "SELECT * FROM filieree";
        $req = $this->connexion->getConnexion()->query($query); // query # prepare
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $filiere[] = new Filieree($e->id, $e->code, $e->libelle);
        }
        return $filiere;
    }

    public function findAll() {
        $query = "select * from Filieree";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findById($id) {
        $query = "select * from Filieree where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $fonction = new Filieree($res->id, $res->code, $res->libelle);
        return $fonction;
    }

    public function findByIdApi($id) {
        $query = "select * from Filieree where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        return $res;
    }

    public function update($o) {
        $query = "UPDATE Filieree SET libelle = ?,code=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getLibelle(), $o->getCode(), $o->getId())) or die('Error');
    }

    public function findByFiliere($id) {
        $query = "SELECT * FROM fonction WHERE fonction.id=?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $filiere[] = new Fonction($e->id, $e->code, $e->libelle);
        }
        return $filiere;
    }

}
