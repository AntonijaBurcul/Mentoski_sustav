<?php
session_start();

if (empty($_SESSION)) {
    header('Location: ../..');
} elseif ($_SESSION['user']['role'] != 'mentor') {
    header('Location: student.php');
}
echo "<a href='logout.php'>Logout</a>";
require_once '../Views/mentor_v.php';
require_once '../Model/mentor_fun.php';
if (isset($_POST['studenti'])) {
    PopisStudenata();
}
if (isset($_POST['predmeti'])) {
    SviPredmeti();
}
if (isset($_POST['izbrisi']) && isset($_POST['student_id'])) {
    Izbrisi($_POST['izbrisi'], $_POST['student_id']);
}
if (isset($_POST['nije_polozen']) && isset($_POST['student_id'])) {
    promjena_statusa($_POST['nije_polozen'], $_POST['student_id'], "");
}
if (isset($_POST['polozen']) && isset($_POST['student_id'])) {
    promjena_statusa($_POST['polozen'], $_POST['student_id'], "passed");
}
if (isset($_POST['popis'])) {
    //samo radi ljepšeg prikaza
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
    <?php PrikazUpisnogLista($_POST['popis']); ?>
            </div>
            <div class="col-md-6">
    <?php SviPredmetiAddUL($_POST['popis']); ?>
            </div>
        </div>
    </div>
    <?php
}

if (isset($_POST['add_ul'])) {
    Add_UL_studenta(get_ID($_POST['student_id']), $_POST['add_ul']);
}
if (isset($_POST['details'])) {
    DohvatiPredmet($_POST['details']);
}
if (isset($_POST['edit'])) {
    PredmetInfo($_POST['edit']);
}
if (isset($_POST['izbrisi_predmet'])) {
    Izbrisi_predmet($_POST['izbrisi_predmet']);
}
if (isset($_POST['azuriraj_predmet'])) {
    Izmijeni($_POST['azuriraj_predmet'], $_POST['ime_novog'], $_POST['kod_novog'], $_POST['program_novog'], $_POST['bodovi_novog'], $_POST['semestar_redovni'], $_POST['semestar_izvanredi'], $_POST['izborni']);
}

if (isset($_POST['novi'])) {
    if ($_POST['novi'] != "novi") {
        DodajNovi($_POST['ime_novog'], $_POST['kod'], $_POST['program'], $_POST['bodovi'], $_POST['sem_r'], $_POST['sem_i'], $_POST['izborni']);
    }
    require_once '../Views/predmeti.php';
}
?>
