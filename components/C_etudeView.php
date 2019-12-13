<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

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
    $plageToAdd = (explode(";", $plageToAdd))[1];
    var_dump($plageToAdd);
    CreatePlageInstance($_GET["id"], $plageToAdd, $superficie);
}

if (isset($_POST["supprimePlage"])) {
    $InstanceToSuppr = filter_input(INPUT_POST, "supprPlageId");
    SupprPlageInstance($InstanceToSuppr);

}


$data = getEtude($_GET["id"]);
$plagesInstance = getPlageInstance($_GET["id"]);

?>


<h1>Etude n° <?php echo $data["id_etudes"] ?></h1>
<h2>Nom : <?php echo $data["nom"] ?></h2>
<h2>Reference : <?php echo $data["reference"] ?></h2>
<h3>date de creation (Annee / Mois / Jour) : <?php echo $data["dateDebut"] ?></h3>

<h2>Liste des plages de l'etudes :</h2>
<ul>

    <li>Nom / Commune / Departement || Actions</li>
    <?php
    foreach ($plagesInstance as $plageI) {
        $InstanceId = $plageI["id_instancePlages"];
        $plageNom = $plageI["nom"];
        $plageCommune = $plageI["commune"];
        $plageDepartement = $plageI["departement"];
        echo "<li> $plageNom / $plageCommune / $plageDepartement ||<form method='post' style='display: inline;'>
        <input type='submit' name='supprimePlage' value='supprimer'><input type='hidden' name='supprPlageId' value='$InstanceId'></form></li>";
    }
    ?>
</ul>


<?php
if ($data["dateFin"] == null) {
    $plages = getPlagesNotInEtude($_GET["id"]);
    ?>
    <form method="post">
        <label for="plage">Ajouter une plage a l'etude : </label>
        <input list="plage" name="plage">
        <datalist id="plage">
            <?php
            foreach ($plages as $plage) {

                $plageNom = $plage["nom"];
                $plageId = $plage["id_plages"];
                echo "<option value='$plageNom;$plageId' name='plage' />";
            }
            ?>
        </datalist>
        <label for="superficie">Superficie de la plage dans la periode de l'etude (km²) </label>
        <input type="number" name="superficie">

        <button type="submit" name="addPlage"> + Ajouter</button>
    </form>


    <h3>Etude en cours... (les resultats aparaiterons a la fin de l'etude)</h3>

    <form method="post">
        <button type="submit" name="cloture">Cloturer</button>
    </form>
    <?php

} else {
    ?>

    <h3>Date de fin (Annee / Mois / Jour) : <?php echo $data["dateFin"] ?></h3>
    <h3>Nombre de vers estime : <?php echo $data["nombreEstime"] ?></h3>
    <h3>Densite Global : <?php echo $data["nombreEstime"] ?></h3>

    <h3>Nombre de personne ayant participe : <?php echo $data["nombrePersonne"] ?></h3>

    <?php

}
?>


<form method="post">
    <button type="submit" name="Supprimer">Supprimer</button>
</form>


<a href="/pages/etudeListe.php">retour</a>


