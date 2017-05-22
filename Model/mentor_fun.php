<?php

require_once '../db/config.php';
require_once '../Model/korisnik.php';



function Izmijeni($id, $ime, $kod, $program, $bodovi, $sem_i, $sem_izv, $izborni) {
    global $db;
    $sql = $db->query("UPDATE predmeti SET ime='$ime', kod='$kod', program='$program', bodovi='$bodovi', sem_redovni = '$sem_i', sem_izvanredni='$sem_izv', izborni = '$izborni' WHERE id = '$id'");
    echo 'Predmet je izmjenjen';
}

function Izbrisi($id_predmeta, $id_studenta) {
    global $db;
    $sql = $db->exec("DELETE FROM upisi WHERE student_id = '$id_studenta' AND predmet_id = '$id_predmeta'");
    echo 'Predmet je izbrisan';
}

function Izbrisi_predmet($id_predmeta) {
    global $db;
    $sql = $db->exec("DELETE FROM predmeti WHERE id = '$id_predmeta'");
    echo 'Predmet je izbrisan';
}
function DodajNovi($ime, $kod, $program, $bodovi, $sem_r, $sem_i, $izborni) {
    global $db;
    $a = "INSERT INTO predmeti (ime,kod,program,bodovi,sem_redovni,sem_izvanredni,izborni) "
            . "VALUES ('$ime','$kod','$program','$bodovi','$sem_r','$sem_i','$izborni')";
    $qry = $db->prepare($a);
    $qry->execute();
    echo 'Predmet je dodan';
}
function Add_UL_studenta($id_studenta, $id_predmeta){
    global $db;
    $qry2 = $db->query("SELECT * FROM upisi WHERE student_id = '$id_studenta'AND predmet_id='$id_predmeta' ");
    //echo "row " . $qry2->rowCount();
    if($qry2->rowCount() === 0){
    
    $a = "INSERT INTO upisi (student_id, predmet_id, status) "
            . "VALUES ('$id_studenta','$id_predmeta','upisan')";
    $qry = $db->prepare($a);
    $qry->execute();
    echo 'Predmet je dodan';
    }else{
    echo 'Predmet je vec na upisnom listu';
    }
}


