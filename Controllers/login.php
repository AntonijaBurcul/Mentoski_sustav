<?php
/* SESSION  user
 *              role
 *              email 
*/
session_start();
if (isset($_POST['email'])) {
    if (!isset($_SESSION['email'])) {
        $_SESSION = $_POST;
    }
    require_once 'app/Model/login_m.php';
    $korisnik = provjera_korisnika($_POST['email']);
    if ( ($korisnik == 'student') && (logiranje($_POST['email'], $_POST['pass']) == 1)) {
        $_SESSION['user']['email'] = $_POST['email'];
        $_SESSION['user']['role'] = $korisnik;
        header('Location: app/Controllers/student.php');
    } else if (($korisnik == 'mentor') && (logiranje($_POST['email'], $_POST['pass']) == 1)) {
        $_SESSION['user']['email'] = $_POST['email'];
        $_SESSION['user']['role'] = $korisnik;
        header('Location: app/Controllers/mentor.php');
    }
    echo "<p>Pogresan unos!!</p>";
} elseif (empty($_SESSION) && empty ($_POST)) {
   require_once 'app/Views/login_v.php';
} elseif ($_SESSION['user']['role'] === 'student') {
    header('Location: app/Controllers/student.php');
} elseif ($_SESSION['user']['role'] === 'mentor') {
    header('Location: app/Controllers/mentor.php');
} 
