<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

?>
<h3>LISTE ESPCE</h3>

<tr>
    <th>Nom</th>
    <th>ID</th>
</tr>
<?php
if (isset($_POST["email"])) {

    $nom = filter_input(INPUT_POST, "nom");
    $id = filter_input(INPUT_POST, "id");

    $resultat=listeEspece($nom, $id);

    foreach ($resultat as $ligne){
        
    }
}
?>

<a href="/components/C_addEspece.php">addEspece</a>
