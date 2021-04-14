<?php

include_once 'beans/Classe.php';
include_once 'connexion/Connexion.php';
include_once 'dao/IDao.php';

class ClasseService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO Classe VALUES (NULL,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(), $o->getNom()->getId())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM Classe WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select classe.id,classe.code,filieree.code as nom from Classe,filieree where filieree.id=classe.id_f";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findById($id) {
        $query = "select * from Classe where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $fonction = new Fonction($res->id, $res->code, $res->nom);
        return $fonction;
    }

    public function findByIdApi($id) {
        $query = "select * from Classe where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        return $res;
    }

    public function update($o) {
        $query = "UPDATE Classe SET id_f = ?,code=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom()->getId(), $o->getCode(), $o->getId())) or die('Error');
    }

    public function findFiliere() {
        $query = "select classe.id,classe.code as nom,filieree.code from Classe,filieree where filieree.id=classe.id_f";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findFiliere1($code_filiere) {
        $query = "select classe.id,classe.code as nom,filieree.code from Classe,filieree where filieree.id=classe.id_f and id_f=?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($code_filiere));
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function count() {
        $query = "select count(classe.id) as nbr,filieree.code as nom from Classe,filieree where filieree.id=classe.id_f group by nom";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

}
