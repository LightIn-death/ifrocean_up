<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";

session_start();
include_once "../includes/sessionFonctions.php";
Security("B");

$id_plages = filter_input(INPUT_GET, "id");
$etude = filter_input(INPUT_GET, "b");


$densiteGlobal = getDensite($id_plages);
$estimGlobal = getEstim($id_plages);
$nombrePartitip = getNombrePartitip($id_plages);
$nombreWorm = getTotalWorms($id_plages);

?>

<h3>Densite de vers sur la plage : <?php echo $densiteGlobal ?> Vers / M²</h3>
<h3>Nombre de vers estime de vers sur la plage : <?php echo $estimGlobal ?></h3>

<h3>Nombre de participation vers sur la plage : <?php echo $nombrePartitip ?></h3>
<h3>Nombre de vers trouvé sur la plage : <?php echo $nombreWorm ?></h3>


<a href="/pages/etudeView.php?id=<?php echo $etude ?>">retour</a>
