<?php

function GPScalculate($p1, $p2, $p3, $p4)
{
    $p1 = explode(";", $p1);
    $p2 = explode(";", $p2);
    $p3 = explode(";", $p3);
    $p4 = explode(";", $p4);

    $c12 = Edge(floatval($p1[0]), floatval($p1[1]), floatval($p2[0]), floatval($p2[1]));
    $c14 = Edge(floatval($p1[0]), floatval($p1[1]), floatval($p4[0]), floatval($p4[1]));

    $diag = Edge(floatval($p2[0]), floatval($p2[1]), floatval($p4[0]), floatval($p4[1]));

    $c32 = Edge(floatval($p3[0]), floatval($p3[1]), floatval($p2[0]), floatval($p2[1]));
    $c34 = Edge(floatval($p3[0]), floatval($p3[1]), floatval($p4[0]), floatval($p4[1]));

    $tr1 = tri($c12, $c14, $diag);
    $tr2 = tri($c32, $c34, $diag);

    $area = $tr1 + $tr2;
    $pem = $c12 + $c32 + $c34 + $c14;
    return $area;


    //
}

function Edge($lat1, $lon1, $lat2, $lon2)
{
    $R = 6378.137; // Radius of earth in KM
    $dLat = $lat2 * pi() / 180 - $lat1 * pi() / 180;
    $dLon = $lon2 * pi() / 180 - $lon1 * pi() / 180;
    $a = sin($dLat / 2) * sin($dLat / 2) + cos($lat1 * pi() / 180) * cos($lat2 * pi() / 180) * sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $d = $R * $c;
    return $d * 1000; // metres
}

function tri($a, $b, $c)
{

    $tr1 = (sqrt(($a + $b + $c) * (-$a + $b + $c) * ($a - $b + $c) * ($a + $b - $c))) / 4;
    return $tr1;
}

function GPScheck($p1, $p2, $p3, $p4)
{
    if (is_null($p1) or is_null($p2) or is_null($p3) or is_null($p4)) {
        return false;
    } else if ((Edge(floatval($p2[0]), floatval($p2[1]), floatval($p4[0]), floatval($p4[1])) < Edge(floatval($p1[0]), floatval($p1[1]), floatval($p2[0]), floatval($p2[1]))) OR (Edge(floatval($p2[0]), floatval($p2[1]), floatval($p4[0]), floatval($p4[1])) < Edge(floatval($p1[0]), floatval($p1[1]), floatval($p4[0]), floatval($p4[1])))) {
        return false;
    } else {
        return true;
    }
}







