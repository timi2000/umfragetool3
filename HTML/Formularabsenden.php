<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formularabsenden</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="../js/javaScripten.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>


    <script src="scripts.js"></script>

    <script>
        $(document).ready(function(){

            $('#klassen').typeahead({
                source: function(query, result)
                {
                    $.ajax({
                        url:"Autocomplete.php",
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

            $('#teacher').typeahead({
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


</head>
<body>
<form name="FormularAbgesende " action="Sqlite-abfrage.php" method="post">
<header>
    <div class="HeaderBenedictSeite">
        <nav class="nav">
            <a class="nav-link Schrift"  href="benedictSeite.php">Home</a>

            <a class="nav-link activ Schrift" href="Formularabsenden.php">Formular absenden</a>
            <a class="nav-link Schrift" href="klasseerfassen.php">Klasse erfassen</a>
            <a class="nav-link Schrift" href="Klassenübersicht.php">Klassenübersicht</a>

        </nav>
    </div>
</header>
<section>

<div class="absendeformular">

    <div class="input-group coolisach">
        <h4 style="padding-right: 10px">Klasse Auswählen  </h4>
        <input type="text" id="klassen" name="Klassen" class="form-control" >
        <div class="input-group-append">

            <div class="dropdown-menu" >
                 <?php
                 /**
                  * Created by PhpStorm.
                  * User: timwidmer
                  * Date: 13.03.18
                  * Time: 16:21
                  */

                 $con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
                 if (mysqli_connect_errno())
                 {
                     echo "failed to conect to MySQL: ".mysqli_connect_error();
                 }
                 $sql1 = "SELECT c_n FROM Class";
                 $result1 = $con->query($sql1);
                 while($row = $result1->fetch_assoc()) {
                     $print='<a class="dropdown-item" value= "'.$row['c_n'].'">'.$row['c_n'].'</a>';
                     echo ("$print");

                 }

                 $con->close();
                 ?>
            </div>

        </div>

    </div>

    <div class="input-group coolisach">
        <h4 style="padding-right: 10px"> Lehrer Auswählen </h4>
        <input type="text" id="teacher" name="Lehrer" class="form-control" aria-label="Text input with dropdown button" >

        <div class="input-group-append">

            <div class="dropdown-menu">
                <?php
                /**
                 * Created by PhpStorm.
                 * User: timwidmer
                 * Date: 13.03.18
                 * Time: 16:21
                 */

                $con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
                if (mysqli_connect_errno())
                {
                    echo "failed to conect to MySQL: ".mysqli_connect_error();
                }
                $sql2 = "SELECT t_vn, t_nn FROM Teacher ";
                $result2 = $con->query($sql2);
                while($row1 = $result2->fetch_assoc()) {

                    $print = ' <a class="dropdown-item" <option value="$reihe" selected="selected">' . $row1['t_vn'] . " " . $row1['t_nn'] . '</a> </option>';
                    echo ("$print");

                }


                $con->close();
                ?>

            </div>
        </div>
    </div>
    <div class="input-group coolisach">
        <h4 style="padding-right: 10px">Semester Auswählen </h4>
        <input type="text" class="form-control" name="Semester" aria-label="Text input with dropdown button" >
        <div class="input-group-append">



        </div>
    </div>
    <button type="submit" class="btn btn-primary">Formular absenden</button>


</div>
</section>
</form>
</body>
</html>