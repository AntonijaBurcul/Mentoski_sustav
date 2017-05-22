<?php
session_start();
print_r($_SESSION);
if (isset($_SESSION['user'])) {
    header('Location: ../..');
}
include '../Views/register_v.php';
include '../Model/registracija.php';
if (!empty($_POST)) {
    $lozinka = $_POST['pass_1'];
    $email = $_POST['e-mail'];
    $ponlozinka = $_POST['pass_2'];
    if (empty($lozinka) || empty($email) || empty($ponlozinka)) {
        echo 'Morate popuniti sva polja';
    } else if (strcmp($lozinka, $ponlozinka) == 1) {
        echo "Sifre nisu jednake";
    } else {
        $pass_hash = password_hash($_POST['pass_1'], PASSWORD_DEFAULT);
        dodaj_kor($_POST['e-mail'], $pass_hash, "student", $_POST['status']);
    }
}