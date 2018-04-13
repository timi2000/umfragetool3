
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Klassenerfassen</title>
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
   <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="../js/javaScripten.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    <script>
        function wegMitDerReihe()
        {
            var table=document.getElementById("myTable");
            var row = table.deleteRow(-1);

        }
    </script>

</head>
<body>
<header>
    <div class="HeaderBenedictSeite">
        <nav class="nav">
            <a class="nav-link Schrift"  href="benedictSeite.php">Lehrer Übersicht</a>

            <a class="nav-link Schrift" href="Formularabsenden.php">Formular absenden</a>
            <a class="nav-link activ Schrift" href="klasseerfassen.php">Klasse erfassen</a>
            <a class="nav-link Schrift" href="Klassenübersicht.php">Klassenübersicht</a>
        </nav>
    </div>
</header>
<section>
    <div class="titelbeiarbeit">
        <h1 class="Uebertitel" > Klasse Erstellen </h1>
    </div>


    <form class="KlasseErfassen" action="Klasseneuerfassen2.php" method="post">
        <div class="form-group">
            <label for="klassenName1">Klassen Name eingeben</label>
            <input type="text" class="form-control" id="klassenName1" name="KlassenNamen" aria-describedby="emailHelp" placeholder="Klassen Name">

        </div>

        <table class="table table-striped"  >
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nachname</th>
                <th scope="col">Vorname</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody  id="myTable" name="DasTabelle">
            <tr>
                <td>1</td>
                <td><input type="text" name="Nachname[]" class="form-control" placeholder="Nachname" ></td>
                <td><input type="text" name="Vorname[]" class="form-control" placeholder="Vorname"></td>
                <td><input type="email" name="Email[]" class="form-control" placeholder="email"></td>
            </tr>

            <tr>
                <td>2</td>
                <td><input type="text" name="Nachname[]" class="form-control" placeholder="Nachname" ></td>
                <td><input type="text" name="Vorname[]" class="form-control" placeholder="Vorname"></td>
                <td><input type="email" name="Email[]" class="form-control" placeholder="email"></td>
            </tr>

            <script type="text/javascript">

             function displayResult()

                {


                    var  table=document.getElementById("myTable");
                    //var n = countrows.toString();
                    var row = table.insertRow(-1);
                    var countrows = document.getElementById('myTable').rows.length;
                    var cell1=row.insertCell(0);
                    var cell2=row.insertCell(1);
                    var cell3=row.insertCell(2);
                    var cell4=row.insertCell(3);
                    cell1.innerHTML= countrows;
                    cell2.innerHTML="<input type=\"text\" name=\"Nachname[]\" class=\"form-control \"  placeholder=\"Nachname\" > ";
                    cell3.innerHTML="<input type=\"text\" name=\"Vorname[]\" class=\"form-control \"  placeholder=\"Vorname\">";
                    cell4.innerHTML="<input type=\"email\" name=\"Email[]\" class=\"form-control \"   placeholder=\"email\">";

                 }


            </script>

            </tbody>

        </table>



        <div class= buttongroup1 ><button type="button"  class="btn btn-secundary" onclick="displayResult()">Neue Reihe</button>
        <button type="button"  class="btn btn-danger" onclick="wegMitDerReihe()">Letzte reihe entfernen</button>

        <button type="submit" class="btn btn-primary">Klasse erstellen</button>
        </div>
    </form>
</section>
</body>
</html>
