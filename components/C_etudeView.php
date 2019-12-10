<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";


if (isset($_POST["cloture"])) {
    clotureEtude($_GET["id"]);
}
$data = getEtude($_GET["id"]);

?>


<h1>Etude n° <?php echo $data["id_etudes"] ?></h1>
<h2>Nom : <?php echo $data["nom"] ?></h2>
<h2>Reference : <?php echo $data["reference"] ?></h2>
<h3>date de creation (Annee / Mois / Jour) : <?php echo $data["dateDebut"] ?></h3>

<?php
if ($data["dateFin"] == null) {
    ?>
    <h3>Nombre de vers estime : Etude en cours... (les resultats aparaiterons a la fin de l'etude)</h3>
    <h3>Densite Global : Etude en cours... (les resultats aparaiterons a la fin de l'etude)</h3>

    <h3>Nombre de personne ayant participe : Etude en cours... (les resultats aparaiterons a la fin de l'etude)</h3>

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


<a href="/pages/etudeListe.php">retour</a>


