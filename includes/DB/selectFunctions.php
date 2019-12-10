<?php

require_once "DB_infos.php";

$pdo = new PDO(DB_INFOS::servername, DB_INFOS::username, DB_INFOS::password, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);


function userLogin($email, $password)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM `personnes` WHERE email=:email AND password=:password");
    $query->execute(['email' => $email, 'password' => $password]);
    $row = $query->fetchAll();

    if (empty($row)) {
        msg("Wrong email or password");
    }
    foreach ($row as $r) {
        if ($r["email"] == $email AND $r["password"] == $password) {
            /*Do everything as connected*/
            session_start();
            $personne = [];
            $personne["auth"] = true;
            $personne["id_personnes"] = $r["id_personnes"];
            $personne["nom"] = $r["nom"];
            $personne["prenom"] = $r["prenom"];
            $personne["email"] = $r["email"];
            $personne["password"] = $r["password"];
            if ($r["admin"] == 1) {
                $personne["admin"] = true;
            } else {
                $personne["admin"] = false;
            }
            $_SESSION["personne"] = $personne;

            header('Location: home.php');

        }
    }

}

function userInscription($nom, $prenom, $email, $tel, $password)
{
    global $pdo;
    $query = $pdo->prepare("INSERT INTO `personnes` (`id_personnes`, `nom`, `prenom`, `email`, `tel`, `password`, `admin`) VALUES (NULL, :nom, :prenom, :email, :tel, :password, '0')");
    $query->execute(['nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'tel' => $tel, 'password' => $password]);
}

function getEtudeListe()
{
    global $pdo;
    $rq = $pdo->prepare("SELECT * FROM `etudes` ");
    $rq->execute();
    $data = $rq->fetchAll();
    return $data;
}

function EtudeAdd($nom, $reference)
{
    $date = date('Y/m/d', time());
    global $pdo;
    $query = $pdo->prepare("INSERT INTO `etudes` (`nom`, `dateDebut`,  `reference`) VALUES ( :nom, :date , :referen)");
    $query->execute(['nom' => $nom, 'date' => $date, 'referen' => $reference]);


}

function getEtude($id)
{
    global $pdo;
    $rq = $pdo->prepare("SELECT * FROM `etudes` where id_etudes=:id ");
    $rq->execute(['id' => $id]);
    $data = $rq->fetch();
    return $data;
}


function clotureEtude($id)
{

    $date = date('Y/m/d', time());
    global $pdo;
    $query = $pdo->prepare("    UPDATE `etudes` SET `dateFin` = :date WHERE `etudes`.`id_etudes` = :id ");
    $query->execute(['date' => $date, 'id' => $id]);

}











