<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";


$nombrePersonne = filter_input(INPUT_POST, "nombrePersonne");

$id_etude = filter_input(INPUT_GET, "e");
$id_plage = filter_input(INPUT_GET, "p");

$data = getZones($id_plage);

if(isset($_POST["createZone"])){
     ?>
         <form method="post">
             <input type="text" id="nombrePersonne" name="nombrePersonne">
             <button name="CreateZone" >Create Zone</button>
         </form>

        <?php
}
if(isset($_POST["nombrePersonne"])){
    createNewZone($id_plage,$nombrePersonne);
    header('Location: ../pages/beneZoneView.php');
}

?>

<h1>veuillez selectionner une Zone : </h1>

<table>
    <tr>
        <th>Titre</th>
        <th>Selection</th>

    </tr>
    <tr>


        <?php
        $i = 0;
        foreach ($data as $d) {
            $i++;
            $zoneId = $d['id_zones'];
            echo "<td>Zone n°$i</td>";
            echo "<td><td><a href='/pages/beneZoneView.php?z=$zoneId&n=$i'>Selectioner</a></td></td></tr>";
        }
        ?>
    </tr>
</table>
<form method="post">
    <button type="submit" name="createZone" >Ajouter une zone</button>
</form>

<a href='/pages/beneEtudes.php'>Retour</a>
