<?php


require '../db/config.php';
require '../Model/korisnik.php';

function PrikazUpisnogLista($email) {
    global $db;
    $id = get_ID($email);
    $predmeti = $db->query("SELECT * FROM upisi WHERE student_id ='$id' ");
    $pr = $predmeti->fetchAll();

    $predmetiIme = $db->query("SELECT * FROM predmeti");
    $prSve = $predmetiIme->fetchAll();
    echo "<form method='POST'>";
    echo "<input type='hidden' name='student_id' value='$id'>";
    echo "<input type='hidden' name='popis' value='$email'>";
    echo "<table class=\"table table-striped\">";
    echo "<thead>";
    echo "<tr>";
    echo "<th colspan='2'>";
    echo 'Upisni list';
    echo "</th>";
    echo "</tr>";
    echo "</thead>";
    foreach ($pr as $predmet) {
        foreach ($prSve as $prPojedini) {
            if ($predmet['predmet_id'] == $prPojedini['id']) {
                echo "<tr>";
                echo "<td colspan='2'>" . $prPojedini['ime'] . "</td>";
                echo "</tr>";
                //izbrisi i upisat
                //prosao -> uz izbrisi
                //polozen -> nije prosa
                
                echo '<tr>';
                if ($predmet['status'] != 'passed') {
                    echo "<td>";
                    echo "<a>Upisan - nije polozen</a>";
                    echo "</td>";
                    echo "<td>";
                    echo "<button class='btn btn-sm btn-danger' name='izbrisi' value = " . $prPojedini['id'] . " >Izbrisi</button>";
                    echo "<button class='btn btn-sm btn-success' name='polozen' value = " . $prPojedini['id'] . " >Polozen</button>";
                    echo "</td>";
                } else {
                    echo "<td>";
                    echo "<a>Polozen</a>";
                    echo "</td>";
                    echo "<td>";
                    echo "<button class='btn btn-sm btn-warning' name='nije_polozen' value = " . $prPojedini['id'] . " >Nije polozen</button>";
                    echo "</td>";
                }
                echo '</tr>';
                
            }
        }
    }
    echo "</table>";
    echo "</form>";
    
}

function PrikazPredmeta() {
    global $db;
    $qry = $db->query("SELECT * FROM predmeti");
    $predmeti = $qry->fetchAll();
    echo " <form method='POST'> ";
    echo "<table class=\"table table-striped\">";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Naziv Predmeta</th>";
    echo "<th>ECTS</th>";
    echo "<th>Opcije</th>";
    echo "</tr>";
    echo "</thead>";
    foreach ($predmeti as $p) {
        echo "<tr>";
        echo "<td> " . $p['id'] . "</td>";
        echo "<td> " . $p['ime'] . "</td>";
        echo "<td> " . $p['bodovi'] . "</td>";

        echo "<td><button class='btn btn-sm btn-primary' name='upisi' value = " . $p['id'] . " >Upisi</button></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</form>";
}

function Add($student_id, $predmet_id, $status) { //radi
    //dodavanje novog predmeta na upisni list
    global $db;
    $qry2 = $db->query("SELECT * FROM upisi WHERE student_id = '$student_id'AND predmet_id='$predmet_id' ");
    //echo "row " . $qry2->rowCount();
    if ($qry2->rowCount() === 0) {
        $qry = $db->exec("INSERT INTO upisi (student_id, predmet_id, status) VALUES ('$student_id','$predmet_id','$status') ");
        return 'Predmet je dodan na upisni list';
    } else {
        return 'Predmet je vec na upisnom listu';
    }
}

function Remove($email, $predmet_id) { //radi
    //brisanje predmeta sa upisnog lista
    global $db;
    $id = get_ID($email);
    $sql = $db->exec("DELETE FROM upisi WHERE student_id = '$id' AND predmet_id='$predmet_id'");
    return 'Predmet je izbrisan';
}
