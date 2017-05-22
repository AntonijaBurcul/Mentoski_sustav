<?php
session_start();

if (empty($_SESSION)) {
    header('Location: ../..');
} elseif ($_SESSION['user']['role'] != 'student') {
    header('Location: mentor.php');
}
include '../Model/student_fun.php';
require_once '../Model/korisnik.php';

$poruka = null;
if (isset($_POST['izbrisi'])) {
    $poruka = Remove($_SESSION['email'], $_POST['izbrisi']);
}
if (isset($_POST['polozen']) && isset($_POST['student_id'])) {
    $poruka = promjena_statusa($_POST['polozen'], $_POST['student_id'], "passed");
}
if (isset($_POST['nije_polozen']) && isset($_POST['student_id'])) {
    $poruka = promjena_statusa($_POST['nije_polozen'], $_POST['student_id'], "");
}
if (isset($_POST['upisi'])) {
    $poruka = Add(get_ID($_SESSION['email']), $_POST['upisi'], "upisan");
}

require_once '../Views/studenti.php';