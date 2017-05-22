<?php
require 'app/db/config.php';

function provjera_korisnika($email) {
    global $db;
    $qry = $db->query("SELECT * FROM korisnici WHERE email = '$email' ");

    while ($tip = $qry->fetch()) {
        $temp = $tip['role'];
    }
    return $temp;
}

//provjerava da li su ispravni svi unosi -> radi
function logiranje($email, $lozinka) {
    global $db;
    $qry = $db->query("SELECT password FROM korisnici WHERE email = '$email' ");
    while ($red = $qry->fetch()) {
        $temp = $red['password'];
    }
    return (password_verify($lozinka, $temp)) ? 1 : 0;
}
