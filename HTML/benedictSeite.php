<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>benedict seite</title>
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
        $(document).ready(function(){

            $('#teachersuchen').typeahead({
                source: function(query, result)
                {
                    $.ajax({
                        url:"Autocompletel.php",
                        method:"POST",
                        data:{query:query},
                        dataType:"json",
                        success:function(data)
                        {
                            result($.map(data, function(item){
                                return item;
                            }));
                        }
                    })
                }
            });

        });
    </script>

    <script>
        $(document).ready(function(){

            $('#cool').typeahead({
                source: function(query, result)
                {
                    $.ajax({
                        url:"LehrerDarstellen.php",
                        method:"POST",
                        data:{query:query},
                        dataType:"json",
                        success:function(data)
                        {
                            result($.map(data, function(item){
                                return item;
                            }));
                        }
                    })
                }
            });

        });
    </script>


</head>

<body>
<header >

    <div class="HeaderBenedictSeite">
        <nav class="nav">
            <a class="nav-link Schrift"  href="benedictSeite.php">Home</a>

            <a class="nav-link activ Schrift" href="Formularabsenden.php">Formular absenden</a>
            <a class="nav-link Schrift" href="Klasseerfassen.html">Klasse erfassen</a>

        </nav>
    </div>
</header>
<section>
    <div class="Homeseite">
        <div class="newclassy"> <a href="neuerLehrer.html" ><button type="button" class="btn btn-primary">neuer Lehrer erstellen</button></a></div>
        <div class="input-group">


            <input type="text" class="form-control" id="teachersuchen" placeholder="Dozent suchen" aria-label="Search for..." style="width: 50%;">
            <span class="input-group-btn">
        <button class="btn btn-secondary" type="button" >Suchen</button>
      </span>
        </div>
        <div class="Nbuttons">


            <table class="table"  style="text-align: center;">
                <thead>
                <tr>

                    <th>name</th>
                </tr>
                </thead>
                <tbody id="cool">



                <tr>

                    <td> <a href="Dozentspezifisch.html"><button type="button" class="btn btn-primary" style="margin-bottom: 5%;">Marco Glaus</button></a></td>


                </tr>
                <tr>

                    <td> <a href="Dozentspezifisch.html">
                        <button type="button" class="btn btn-primary" style="margin-bottom: 5%;">Rene Bäder</button>
                    </a></td>


                </tr>
                <tr>
                    <td> <a href="Dozentspezifisch.html"><button type="button" class="btn btn-primary" style="margin-bottom: 5%;">larry</button></a></td>


                </tr>
                </tbody>
            </table>

        </div>

    </div>



</section>
<footer>


</footer>

</body>
</html>