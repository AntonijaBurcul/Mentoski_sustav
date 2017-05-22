<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="app/css/bootstrap.min.css" />
        <link rel="stylesheet" href="app/css/prijava.css" />
    </head>
    <body>
        <div class="container">
            <form class="form-signin" method="POST">
                <h2 class="form-signin-heading">Prijava</h2>
                <input class="form-control" type="text" name="email" placeholder="Email" />
                <input class="form-control" type="password" name="pass" placeholder="Lozinka" />
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login" />
                <a class="btn btn-lg btn-default btn-block" href="app/Controllers/register.php">Register</a>
            </form>
        </div>
    </body>
</html>