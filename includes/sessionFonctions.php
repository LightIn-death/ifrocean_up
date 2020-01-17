<?php

function Logout()
{
    session_start();
    session_unset();
    session_destroy();
}

function Security($P = "C")
{
    if (is_null($_SESSION["personne"]["auth"])) {
        header("location: /pages/formConnexion.php");
    } else {
        if ($P == "A") {
            // Admin
            if ($_SESSION["personne"]["admin"] != True) {
                header("location: /pages/home.php");
            }

        } elseif ($P == "B") {
            //Benevole
            if ($_SESSION["personne"]["admin"] != False) {
                header("location: /pages/home.php");
            }

        }


    }


}

