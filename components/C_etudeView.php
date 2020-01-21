<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";

session_start();
include_once "../includes/sessionFonctions.php";
Security("A");

if (isset($_POST["Supprimer"])) {
    supprimeEtude($_GET["id"]);
    header('Location: etudeListe.php');
}

if (isset($_POST["cloture"])) {
    clotureEtude($_GET["id"]);
}

if (isset($_POST["addPlage"])) {
    $plageToAdd = filter_input(INPUT_POST, "plage");
    $superficie = filter_input(INPUT_POST, "superficie");
//    var_dump($plageToAdd);
    CreatePlageInstance($_GET["id"], $plageToAdd, $superficie);
}

if (isset($_POST["supprimePlage"])) {
    $InstanceToSuppr = filter_input(INPUT_POST, "supprPlageId");
    SupprPlageInstance($InstanceToSuppr);
}

if (isset($_POST["VoirPlage"])) {
    $InstancePlageId = filter_input(INPUT_POST, "PlageId");
    $etude = $_GET["id"];
    header("Location: /pages/InstancePlageView.php?id=$InstancePlageId&b=$etude");


}


$data = getEtude($_GET["id"]);
$plagesInstance = getPlageInstance($_GET["id"]);

?>


<h1>Etude n° <?php echo $data["id_etudes"] ?></h1>
<div class="zone"><h2>Nom : <?php echo $data["nom"] ?></h2>
    <h2>Reference : <?php echo $data["reference"] ?></h2>
    <h3>date de creation (Année / Mois / Jour) : <?php echo $data["dateDebut"] ?></h3>
</div>
<h2>Liste des plages de l'etudes :</h2>
<ul>


    <li>Nom / Commune / Département || Actions</li>
    <?php
    foreach ($plagesInstance as $plageI) {
        $InstanceId = $plageI["id_instancePlages"];
        $plageNom = $plageI["nom"];
        $plageCommune = $plageI["commune"];
        $plageDepartement = $plageI["departement"];
        if ($data["dateFin"] == null) {
            echo "<li> $plageNom / $plageCommune / $plageDepartement ||<form method='post' style='display: inline;'>
        <input class='del' type='submit' name='supprimePlage' value='supprimer' onclick=\"return confirm('Etes-vous sûr de vouloir supprimer la plage ?')\"><input type='hidden' name='supprPlageId' value='$InstanceId'></form></li>";


            $zon = getZones($InstanceId);
            $tru = true;
            foreach ($zon as $zo) {
                $check = GPScheck($zo["point1"], $zo["point3"], $zo["point3"], $zo["point4"]);
                if ($check == false) {
                    $tru = false;

                }
            }
//            var_dump($zon);
            if (!$tru) {
                echo "<p class='del'>(Attention ! Cordonnées gps des zones non ou partiellement remplie sur cette plage, les données risque d'etre erroné)</p>";
            } elseif (empty($zon)) {
                echo "<p class='del'>(Attention ! Aucune zone na ete mise en place sur cette plage)</p>";
            } else {
                echo "✅";
            }

        } else
            echo "<li> $plageNom / $plageCommune / $plageDepartement ||<form method='post' style='display: inline;'>
        <input type='submit' name='VoirPlage' value='Voir'><input type='hidden' name='PlageId' value='$InstanceId'></form></li>";
    }


    ?>
</ul>


<?php
if ($data["dateFin"] == null) {
    $plages = getPlagesNotInEtude($_GET["id"]);

    ?>
    <div class="zone">
        <form method="post">
            <label>Ajouter une plage à l'etude :
                <select name="plage">
                    <?php
                    foreach ($plages as $plage) {

                        $plageNom = $plage["nom"];
                        $plageId = $plage["id_plages"];
                        echo "<option value='$plageId' name='plage'/>$plageNom</option>";
                    }
                    ?>

                </select>
            </label>


            <label for="superficie">Superficie de la plage dans la période de l'etude (M²) </label>
            <input type="number" name="superficie">

            <button type="submit" name="addPlage"> + Ajouter</button>
        </form>
    </div>

    <h3>Etude en cours... (les résultats apparaîtrons à la fin de l'etude)</h3>

    <form method="post">
        <button class="del" type="submit" name="cloture"
                onclick="return confirm('Etes-vous sûr de vouloir cloturé l\'étude ?')">Cloturer
        </button>
    </form>
    <?php

} else {


    $densiteGlobal = getGlobalDensite($_GET["id"]);
    $estimGlobal = getGlobalEstim($_GET["id"]);
    $nombrePartitip = getNombrePartitip($_GET["id"]);

    ?>
    <div class="zone">
        <h3>Date de fin (Année / Mois / Jour) : <?php echo $data["dateFin"] ?></h3>
        <h3>Densité Globale : <?php echo $densiteGlobal ?> Vers / M²</h3>
        <h3>Nombre de vers estime : <?php echo $estimGlobal ?> vers sur l'ensemble des plages de l'etude</h3>

        <h3>Nombre de participations sur l'etude complete : <?php echo $nombrePartitip ?></h3>


    </div>

    <table class="stG">
        <?php
        $stEsp = getStatPerEspeceGlob($_GET["id"]);
        //        var_dump($stEsp);
        ?>

        <tr>
            <th>Espece</th>
            <th>Nombre</th>
            <th>densitée</th>
            <th>nombre estimé</th>
        </tr>

        <?php
        foreach ($stEsp as $st) {
            ?>
            <tr>
                <td><?php echo $st["nom"] ?></td>
                <td><?php echo $st["nombre"] ?></td>
                <td><?php echo $st["dens"] ?></td>
                <td><?php echo $st["est"] ?></td>

            </tr>
            <?php
        }
        ?>

    </table>


    <form method="post" action="/components/C_kmlDownload">
        <input type="hidden" value="<?php echo $_GET["id"] ?>" name="id">
        <button type="submit" name="kml"
                onclick="return ">Télécharger le fichier KML
        </button>
    </form>
    <?php


}
?>


<form method="post">
    <button class="del" type="submit" name="Supprimer"
            onclick="return confirm('Etes-vous sûr de vouloir supprimer l étude en cours ?')">Supprimer
    </button>
</form>


<a href="/pages/etudeListe.php">retour</a>


