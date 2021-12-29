<?php
class Db {
    public $pdo;
    function __construct(){
        $this->pdo = new PDO('sqlite:C:\Users\Pablo\Documents\IUT\IUT S3\PTUT\appRehab\PHP\database\database.db' );
    }

    public function addCategorie(string $nom){
        $sth = $this->pdo->prepare("SELECT * FROM Categories WHERE nameCategory= :categorie");
        $sth->execute(["categorie" => $nom]);
        $result = $sth->fetch();
        if($result != false){
            return false;
        }
        $sth = $this->pdo->prepare("INSERT INTO Categories(nameCategory) VALUES (:categorie)");
        $sth->execute(["categorie" => $nom]);
        return true;
    }

    public function addLesson(string $nom, string $categorie){
        $sth = $this->pdo->prepare("SELECT * FROM Categories WHERE nameCategory= :categorie");
        $sth->execute(["categorie" => $categorie]);
        $result = $sth->fetch();
        if($result == false){
            return false;
        }
        $categorieId = $result["idCategory"];
        $sth = $this->pdo->prepare("SELECT * FROM Lessons WHERE nameLesson= :lesson AND categoryId= :categorie");
        $sth->execute(["lesson" => $nom, "categorie" => $categorieId]);
        $result = $sth->fetch();
        if($result != false){
            return false;
        }
        $sth = $this->pdo->prepare("INSERT INTO Lessons (nameLesson, categoryId) VALUES (:nom, :categorie)");
        $sth->execute(["nom" => $nom, "categorie" => $categorieId]);
        return true;
    }

    public function addExercice(string $nom, string $lesson){
        $sth = $this->pdo->prepare("SELECT * FROM Lessons WHERE nameLesson= :lesson");
        $sth->execute(["lesson" => $lesson]);
        $result = $sth->fetch();
        if($result == false){
            echo "1";
            return false;
        }
        $lessonId = $result["idLesson"];
        $sth = $this->pdo->prepare("SELECT * FROM Items WHERE nameItem= :nom AND lessonId= :lessonId");
        $sth->execute(["nom" => $nom, "lessonId" => $lessonId]);
        $result = $sth->fetch();
        if($result != false){
            echo "2";
            return false;
        }
        $sth = $this->pdo->prepare("INSERT INTO Items(nameItem, lessonId) VALUES(:nom, :lessonId)");
        $sth->execute(["nom" => $nom, "lessonId" => $lessonId]);
        return true;
    }

    public function deleteExercice(string $nom)
    {
        $sth = $this->pdo->prepare("SELECT * FROM Items WHERE nameItem= :nom");
        $sth->execute(["nom" => $nom]);
        $result = $sth->fetch();
        if ($result == false) {
            return false;
        }
        $itemId = $result["idItem"];
        $sth = $this->pdo->prepare("DELETE FROM Files WHERE itemId= :itemId");
        $sth->execute(["itemId" => $itemId]);
        $sth = $this->pdo->prepare("DELETE FROM Items WHERE idItem= :itemId");
        $sth->execute(["itemId" => $itemId]);
        return true;
    }
}