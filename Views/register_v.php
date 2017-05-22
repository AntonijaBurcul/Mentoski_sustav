<html>
    <head>
        <title>Mentorski sustav</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container ">
            <div class="row" >
                <div class="col-md-6" >
                    <form action="" method ="POST">
                        <ul style="list-style-type:none">
                            <h2 class="form-signin">Registracija</h2>
                            <li><br>
                                Email:
                                <input class="form-control" type="text" name="e-mail" />
                            </li>
                            <li><br>
                                Password:
                                <input class="form-control" type="password" name="pass_1" />
                            </li>
                            <li><br>
                                Retype password:
                                <input class="form-control" type="password" name="pass_2" />
                            </li>
                            <li><br>
                                Status studenta: 
                                <input class="form-control" type="text" name="status" />
                            </li>
                            <li><br>
                                <input class="form-control" type="submit" value="Register" />
                            </li>
                            <li><br>
                                <a href="../../index.php" style="text-decoration:none" >Izlazak iz registracije</a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </body> 
</html>

<?php

if (isset($_GET['err'])) {
    echo "Korisnik " . $_GET['err'] . " vec postoji";
}
?>