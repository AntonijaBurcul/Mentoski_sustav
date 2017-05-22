<html>
    <head>
        <title>Mentorski sustav</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <form method='POST'>
                        <div class="form-group">
                            <label>Ime predmeta:</label>
                            <input class="form-control" type='text' name='ime_novog' />
                            <label>Kod predmeta:</label>
                            <input class="form-control" type='text' name='kod' />
                            <label>Program predmeta:</label>
                            <input class="form-control" type='text' name='program' />
                            <label>Bodovi predmeta:</label>
                            <input class="form-control" type='text' name='bodovi' />
                            <label>Semestar redovni:</label>
                            <input  class="form-control" type='text' name='sem_r' />
                            <label>Semestar izvanredni:</label>
                            <input class="form-control" type='text' name='sem_i' />
                            <label>Izborni: </label>
                            <input class="form-control" type='text' name='izborni' /><br>
                            <button class='btn btn-lg btn-default' name='novi'>Dodaj predmet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>


