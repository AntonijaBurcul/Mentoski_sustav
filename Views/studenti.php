<html>
    <head>
        <title>Mentorski sustav</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href='logout.php'>Logout</a>
                </div>
            </div>
            <?php
                if ( $poruka ) {
                    echo '<div class="row"><div class="alert alert-info" role="alert">';
                    echo $poruka;
                    echo '</div></div>';
                }
            ?>
            <div class="row">
                <div class="col-md-6">
                    <?php PrikazPredmeta(); ?>
                </div>
                <div class="col-md-6">
                    <?php PrikazUpisnogLista($_SESSION['email']); ?>
                </div>
            </div>
        </div>
    </body>
</html>