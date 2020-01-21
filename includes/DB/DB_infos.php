<?php


class DB_INFOS
{

    const servername = 'mysql:host=localhost:3307;dbname=ifrocean';

    const username = "Ifrocean";
    const password = "IfroceanPassword";
}

function pass()
{
}

function msg($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
