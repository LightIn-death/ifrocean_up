<?php

function Logout()
{
    session_start();
    session_unset();
    session_destroy();
}