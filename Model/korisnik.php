<?php

require '../db/config.php';

function get_ID($email) {
    global $db;
    $qry = $db->query("SELECT * FROM korisnici WHERE email = '$email' ");
    while ($tip = $qry->fetch()) {
        $temp = $tip['id'];
    }
    return $temp;
}

function provjera_statusa($email) {
    global $db;
    $qry = $db->query("SELECT * FROM korisnici WHERE email = '$email' ");

    while ($tip = $qry->fetch()) {
        $temp = $tip['status'];
    }
    return $temp;
}

function promjena_statusa($predmet_id, $id, $status) {
    global $db;    
    $qry = $db->query("UPDATE upisi SET status = '$status'  WHERE predmet_id = '$predmet_id' AND student_id = '$id'");
}
