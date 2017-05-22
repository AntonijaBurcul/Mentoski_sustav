<html>
    <head>
        <title>Mentorski sustav</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">
        <form method='POST'> 
            <button  class='btn btn-lg btn-default' name='studenti'value = 'studenti'>Studenti</button>
            <button class='btn btn-lg btn-default' name='predmeti' value='predmeti'>Predmeti</button>
            <button class='btn btn-lg btn-default' name='novi' value='novi'>Dodaj novi predmet</button>
        </form>
            </div>
    </body>
</html>
<?php
function PrikazUpisnogLista($email) {
    global $db;
    $id = get_ID($email);
    $predmeti = $db->query("SELECT * FROM upisi WHERE student_id ='$id' ");
    $pr = $predmeti->fetchAll();

    $predmetiIme = $db->query("SELECT * FROM predmeti");
    $prSve = $predmetiIme->fetchAll();
    echo " <form method='POST'> ";
    //hidden polja uzimam kako bi ostala na stranici i kako bi znala o kojem je studentu riječ
    echo "<input type='hidden' name='student_id' value='$id'>";
    echo "<input type='hidden' name='popis' value='$email'>";
    echo "<table class=\"table table-striped\">";
    foreach ($pr as $predmet) {
        foreach ($prSve as $prPojedini) {
            if ($predmet['predmet_id'] == $prPojedini['id']) {
                echo "<p class='lead'>" . $prPojedini['ime'] . "</p>";
                //izbrisi i upisat
                //prosao -> uz izbrisi
                //polozen -> nije prosa
                if ($predmet['status'] != 'passed') {
                    echo "<a>Upisan - nije polozen</a>";
                    echo "<button class='btn btn-sm btn-danger' name='izbrisi' value = " . $prPojedini['id'] . " >Izbrisi</button>";
                    echo "<button class='btn btn-sm btn-success' name='polozen' value = " . $prPojedini['id'] . " >Polozen</button>";
//                    echo "<input type='submit' name=". $prPojedini['id'] ." value = 'Izbrisi' />"; 
                } else {
                    echo "<a>Polozen</a>";
                    echo "<button class='btn btn-sm btn-warning' name='nije_polozen' value = " . $prPojedini['id'] . " > Nije polozen</button>";
                }
            }
        }
    }
    echo "</table>";
    echo "</form>";
}

function PopisStudenata() { // radi
    global $db;
    $sql = $db->query("SELECT * FROM korisnici WHERE role = 'student' ");
    $popis_studenata = $sql->fetchAll();
    echo " <form method='POST'> ";
    echo "<table class=\"table table-striped\">";
    foreach ($popis_studenata as $p) {
        echo "<tr>";
        echo "<td> " . $p['email'] . "</td>";
        echo "<td><button class='btn btn-sm btn-default' name='popis' value = " . $p['email'] . " >Upisni list</button></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</form>";
}

function SviPredmeti() { //radi
    global $db;
    $sql = $db->query("SELECT * FROM predmeti");
    $temp = $sql->fetchALL();
    echo " <form method='POST'> ";
    echo "<table class=\"table table-striped\">";
    foreach ($temp as $p) {
        echo "<tr>";
        echo "<td> " . $p['id'] . "</td>";
        echo "<td> " . $p['ime'] . "</td>";
        echo "<td><button class='btn btn-sm btn-default' name='details' value = " . $p['id'] . " >Details</button></td>";
        echo "<td><button class='btn btn-sm btn-default' name='edit' value = " . $p['id'] . " >Edit</button></td>";
        echo "<td><button class='btn btn-sm btn-default' name='izbrisi_predmet' value = " . $p['id'] . " >Delete</button></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</form>";
}

function SviPredmetiAddUL($id) { //radi
    global $db;
    $sql = $db->query("SELECT * FROM predmeti");
    $temp = $sql->fetchALL();
    echo " <form method='POST'> ";
    echo "<input type='hidden' name='student_id' value=$id />";
    echo "<input type='hidden' name='popis' value='$id'>";
    echo "<table class=\"table table-striped\">";
    foreach ($temp as $p) {
        echo "<tr>";
        echo "<td> " . $p['id'] . "</td>";
        echo "<td> " . $p['ime'] . "</td>";
        echo "<td><button class='btn btn-sm btn-default' name='add_ul' value = " . $p['id'] . " >Add</button></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</form>";
}

function DohvatiPredmet($id) { // radi
    global $db;
    $sql = $db->query("SELECT * FROM predmeti WHERE id = '$id' ");
    $temp = $sql->fetchALL();
    echo "<table border='0' style='width:auto' align = 'center' >";
    foreach ($temp as $row) {
        echo 'ID: ' . $row['id'] . '<br>' .
        'Ime: ' . $row['ime'] . '<br>' .
        'Kod: ' . $row['kod'] . '<br>' .
        'Program: ' . $row['program'] . '<br>' .
        'Bodovi: ' . $row['bodovi'] . '<br>';
        'Semestar izvanredni: ' . $row['sem_redovni'] . '<br>';
        'Semestar redovni: ' . $row['sem_izvanredni'] . '<br>';
        'Izborni: ' . $row['izborni'] . '<br>';
    }
    echo "</table>";
}

function PredmetInfo($id) { //radi
    $result = DohvatiPredmet($id);
    //izlistava "stari" predmet
    echo "<div class='container'>";
    echo "<table class=\"table table-striped\">";
    foreach ($result as $row) {
        echo 'ID: ' . $row['id'] . '<br>' .
        'Ime: ' . $row['ime'] . '<br>' .
        'Kod: ' . $row['kod'] . '<br>' .
        'Program: ' . $row['program'] . '<br>' .
        'Bodovi: ' . $row['bodovi'] . '<br></div>';
        'Semestar izvanredni: ' . $row['sem_redovni'] . '<br></div>';
        'Semestar redovni: ' . $row['sem_izvanredni'] . '<br></div>';
        'Izborni: ' . $row['izborni'] . '<br></div>';
    }
    echo "</table>";
    //izlistava formu za novi predmet
    echo "<form method='POST'>
                       <p>Azuriraj predmet</p>
                       <label>Ime predmeta: </label>
                       <input type='text' name='ime_novog' /><br>
                       <label>Kod predmeta: </label>
                       <input type='text' name='kod_novog' /><br>
                       <label>Novi program: </label>
                       <input type='text' name='program_novog' /><br>
                       <label>Bodovi predmeta: </label>
                       <input type='text' name='bodovi_novog' /><br>
                       <label>Semestar redovni: </label>
                       <input type='text' name='semestar_redovni' /><br>
                       <label>Semestar izvanredni: </label>
                       <input type='text' name='semestar_izvanredni' /><br>
                       <label>Izborni: </label>
                       <input type='text' name='izborni' /><br>
                       <br>
                       <button name='azuriraj_predmet' value = '$id' >Azuriraj predmet</button>
            </form>";
    echo "</div>";
}
