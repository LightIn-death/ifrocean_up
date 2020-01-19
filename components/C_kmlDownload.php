<?php
include_once "../includes/DB/Functions.php";
//Security("A");

$etudeId = filter_input(INPUT_POST, "id");
$data = getKml($etudeId);

//var_dump($data);
//echo "DATA = \n". $data . "\n\n\n\n";
// Creates an array of strings to hold the lines of the KML file.
$kml = array('<?xml version="1.0" encoding="UTF-8"?>');
$kml[] = '<kml xmlns="http://earth.google.com/kml/2.1">';
$kml[] = ' <Document>';
$kml[] = ' <Style id="restaurantStyle">';
$kml[] = ' <IconStyle id="restuarantIcon">';
$kml[] = ' <scale>1.2</scale>';
$kml[] = ' <Icon>';
$kml[] = ' <href>https://earth.google.com/earth/rpc/cc/icon?color=1976d2&amp;id=2000&amp;scale=4</href>';
$kml[] = ' </Icon>';
$kml[] = '<hotSpot x="64" y="128" xunits="pixels" yunits="insetPixels"/>';
$kml[] = ' </IconStyle>';
$kml[] = ' </Style>';
$kml[] = ' <Style id="barStyle">';
$kml[] = ' <IconStyle id="barIcon">';
$kml[] = ' <Icon>';
$kml[] = ' <href>http://maps.google.com/mapfiles/kml/pal2/icon27.png</href>';
$kml[] = ' </Icon>';
$kml[] = ' </IconStyle>';
$kml[] = ' </Style>';

// Iterates through the rows, printing a node for each row.
//$result = [1,2,3,4];
$i = 0;

foreach ($data as $row) {

    $p1 = explode(";", $row['point1']);

    $point1Lo = $p1[1];
    $point1La = $p1[0];

    $p2 = explode(";", $row['point2']);
    $point2Lo = $p2[1];
    $point2La = $p2[0];

    $p3 = explode(";", $row['point3']);
    $point3Lo = $p3[1];
    $point3La = $p3[0];

    $p4 = explode(";", $row['point4']);
    $point4Lo = $p4[1];
    $point4La = $p4[0];


    $kml[] = ' <Placemark id="placemark' . ($i + 1) . '">';
    $kml[] = ' <name>' . htmlentities(1) . '</name>';
    $kml[] = ' <description>' . htmlentities("point numero 1") . '</description>';
    $kml[] = ' <styleUrl>#Style</styleUrl>';
    $kml[] = ' <Point>';
    $kml[] = ' <coordinates>' . $point1Lo . ',' . $point1La . '</coordinates>';
    $kml[] = ' </Point>';
    $kml[] = ' </Placemark>';

    $kml[] = ' <Placemark id="placemark' . ($i + 2) . '">';
    $kml[] = ' <name>' . htmlentities(2) . '</name>';
    $kml[] = ' <description>' . htmlentities("point numero 2") . '</description>';
    $kml[] = ' <styleUrl>#Style</styleUrl>';
    $kml[] = ' <Point>';
    $kml[] = ' <coordinates>' . $point2Lo . ',' . $point2La . '</coordinates>';
    $kml[] = ' </Point>';
    $kml[] = ' </Placemark>';

    $kml[] = ' <Placemark id="placemark' . ($i + 3) . '">';
    $kml[] = ' <name>' . htmlentities(3) . '</name>';
    $kml[] = ' <description>' . htmlentities("point numero 3") . '</description>';
    $kml[] = ' <styleUrl>#Style</styleUrl>';
    $kml[] = ' <Point>';
    $kml[] = ' <coordinates>' . $point3Lo . ',' . $point3La . '</coordinates>';
    $kml[] = ' </Point>';
    $kml[] = ' </Placemark>';

    $kml[] = ' <Placemark id="placemark' . ($i + 4) . '">';
    $kml[] = ' <name>' . htmlentities(4) . '</name>';
    $kml[] = ' <description>' . htmlentities("point numero 4") . '</description>';
    $kml[] = ' <styleUrl>#Style</styleUrl>';
    $kml[] = ' <Point>';
    $kml[] = ' <coordinates>' . $point4Lo . ',' . $point4La . '</coordinates>';
    $kml[] = ' </Point>';
    $kml[] = ' </Placemark>';


    $kml[] = ' <Placemark id="POLYGONE' . $i . '">';
    $kml[] = ' <name>' . htmlentities('Zone numero '.$i) . '</name>';
    $kml[] = ' <description>' . htmlentities("nombre de presonne present dans la zone : ".$row['nombrePersonne']) . '</description>';
    $kml[] = '<styleUrl>#__managed_style_09F20CD56410F5308AAD</styleUrl>';
    $kml[] = ' <Polygon>';
    $kml[] = ' <outerBoundaryIs>';
    $kml[] = ' <LinearRing>';
    $kml[] = ' <coordinates>' . $point1Lo . ',' . $point1La . ',0 ' . $point2Lo . ',' . $point2La . ',0 ' . $point3Lo . ',' . $point3La . ',0 ' . $point4Lo . ',' . $point4La . ',0 ' . $point1Lo . ',' . $point1La . ',0  </coordinates>';
    $kml[] = ' </LinearRing>';
    $kml[] = ' </outerBoundaryIs>';
    $kml[] = ' </Polygon>';
    $kml[] = ' </Placemark>';


    $i += 5;

}

// End XML file
$kml[] = ' </Document>';
$kml[] = '</kml>';
$kmlOutput = join("\n", $kml);
header('Content-type: application/vnd.google-earth.kml+xml');
echo $kmlOutput;
?>
