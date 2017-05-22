<?php

// shift alt f
require '../db/config.php';


function dodaj_kor($email, $pass_hash, $role, $status) {
    global $db;

    $qry2 = $db->query("SELECT * FROM korisnici WHERE email = '$email'");
    if ($qry2->rowCount() === 0) {
        $qry = $db->exec("INSERT INTO korisnici (email, password, role,status) VALUES ('$email','$pass_hash', '$role', '$status') ");
        header('Location: ../../index.php');
    } else {
        header("Location: ../Views/register_v.php?err=$email");
    }
}
