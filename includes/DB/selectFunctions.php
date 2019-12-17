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

function supprimeEtude($id)
{
    global $pdo;
    $query = $pdo->prepare("DELETE FROM `etudes` WHERE `etudes`.`id_etudes` = :id");
    $query->execute(['id' => $id]);
}

function getPlageInstance($id)
{
    global $pdo;
    $rq = $pdo->prepare("SELECT p.nom, p.commune,p.departement,i.id_instancePlages FROM instanceplages i JOIN etudes e on i.FK_id_etudes = e.id_etudes JOIN plage p on i.FK_id_plages = p.id_plages WHERE e.id_etudes=:id");
    $rq->execute(['id' => $id]);
    $data = $rq->fetchAll();
    return $data;
}

function getPlagesNotInEtude($id)
{
    global $pdo;
    $rq = $pdo->prepare("SELECT * FROM plage");
    $rq->execute(['id' => $id]);
    $data = $rq->fetchAll();
    return $data;
}

function CreatePlageInstance($id, $plage, $km)
{
    global $pdo;
    $rq = $pdo->prepare("SELECT * FROM `plage` where id_plages=:plage");
    $rq->execute(['plage' => $plage]);
    $plageresult = $rq->fetch();
    $rq = $pdo->prepare("INSERT INTO `instanceplages` ( `FK_id_etudes`, `FK_id_plages`, `superficieTotal`) VALUES ( :id, :plageid, :km)");
    $rq->execute(['id' => $id, 'plageid' => $plageresult["id_plages"], 'km' => $km]);
}

function SupprPlageInstance($id)
{
    global $pdo;
    $rq = $pdo->prepare(" DELETE FROM `instanceplages` WHERE `instanceplages`.`id_instancePlages` = :id");
    $rq->execute(['id' => $id]);
}

function addEspece($nom)
{
    global $pdo;
    $query = $pdo->prepare("INSERT INTO `especes` (`nom`) VALUES (:nom)");
    $query->execute(['nom' => $nom]);
}

function listeEspece()
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM `especes`");
    $query->execute();
    $row = $query->fetchAll();
    return $row;
}

function deleteEspece($id_especes)
{
    global $pdo;
    $query = $pdo->prepare("DELETE FROM `especes` WHERE `id_especes`=:id_especes");
    $query->execute(['id_especes' => $id_especes]);
}

function modifyEspeces($id_especes)
{
    global $pdo;
    $query = $pdo->prepare("UPDATE `especes` SET `nom`=:nom WHERE id_especes=:id_especes");
    $query->execute(['id_especes' => $id_especes]);
}

function getOpenEtudes()
{
    global $pdo;
    $rq = $pdo->prepare("SELECT * FROM `etudes` where dateFin is null ");
    $rq->execute();
    $data = $rq->fetchAll();
    return $data;

}


function getZones($id)
{
    global $pdo;
    $rq = $pdo->prepare("SELECT * FROM `zones` WHERE `FK_instance_plages` = :id");
    $rq->execute(["id" => $id]);
    $data = $rq->fetchAll();
    return $data;

}

function getZonedetails($id)
{
    global $pdo;
    $rq = $pdo->prepare("SELECT * FROM `zones` WHERE `id_zones`= :id");
    $rq->execute(["id" => $id]);
    $data = $rq->fetch();
    return $data;

}


function getInstEspece($id)
{
    global $pdo;
    $rq = $pdo->prepare("SELECT * FROM `instanceespeces` i JOIN especes e ON e.id_especes=i.FK_id_especes WHERE `FK_zone`=:id");
    $rq->execute(['id' => $id]);
    $data = $rq->fetchAll();
    return $data;
}






