<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/normalize.css">

</head>
<body>
<header>
    <div class="HeaderBenedictSeite">
        <nav class="nav">
            <a class="nav-link activ Schrift"  href="benedictSeite.php">Lehrer Übersicht</a>

            <a class="nav-link  Schrift" href="Formularabsenden.php">Formular absenden</a>
            <a class="nav-link Schrift" href="klasseerfassen.php">Klasse erfassen</a>
            <a class="nav-link Schrift" href="Klassenübersicht.php">Klassenübersicht</a>
        </nav>
    </div>
</header>
<section>
    <div class="hokus">
        <?php
        $con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
        if (mysqli_connect_errno())
        {
        echo "failed to conect to MySQL: ".mysqli_connect_error();
        }
        $LehrerName1 = $_POST["LehrerName"];
        echo " <div class=\"titeldiv\"  style='padding-bottom: 3%;'>
        <h1 class=\"Uebertitel\"> $LehrerName1 </h1>
    </div>";
        ?>

        <table class="table table-striped"  id="tabel4" >
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">KlassenName</th>
                <th scope="col">Semester</th>
                <th scope="col">Datum</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            <?php
            $con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
            if (mysqli_connect_errno())
            {
                echo "failed to conect to MySQL: ".mysqli_connect_error();
            }


            $LehrerName = $_POST["LehrerName"];
            $lehrerexplodiert  = explode(" ", $LehrerName);
            $vn = $lehrerexplodiert[ 1 ];
            $nn = $lehrerexplodiert[ 0 ];
            $vn = $vn.'%';
            $nn = $nn.'%';

            $LehrerID = "Select idTeacher from Teacher Where t_vn like '$vn' and t_nn LIKE '$nn'";
            $result = $con->query($LehrerID);
            while ($row1 = $result->fetch_assoc()) {
                $res = $row1['idTeacher'];
            }

            $kurs1 ="Select Class_idClass From Course WHERE Teacher_idTeacher LIKE '$res'";
            $result5= $con->query($kurs1);
            while ($row5 = $result5->fetch_assoc()) {
                $res5 = $row5['Class_idClass'];

            }


try {
                $Kursliste = "Select Course.Class_idClass, Course.Semester, Course.c_Date, Class.c_n  From Course LEFT JOIN Class ON Course.Class_idClass = Class.idClass Where Teacher_idTeacher LIKE '$res'GROUP BY Semester , Class_idClass, c_Date";
                $whatttt = $con->query($Kursliste);
                while ($zeile = $whatttt->fetch_assoc()) {
                    $idfromClass = $zeile['Class_idClass'];
                    $Semester1 = $zeile['Semester'];
                    $klassenName = $zeile['c_n'];
                    $datum = $zeile['c_Date'];
                    /*echo "klassenid " . $idfromClass." klassenname " . $klassenName . " Semester " . $Semester1 . "<br />";*/
                    echo "<form method=\"post\" action=\"BilanzLehrer.php\">
                <tr>
                <th><input type=\"hidden\" name=\"lehrerid\"  class=\"form-control\"  value='$res' readonly> </th>
                <td><input type=\"hidden\" name=\"klassenname\"  class=\"form-control\"  value='$klassenName' readonly>$klassenName</td>
                <td><input type=\"hidden\" name=\"Semester\"  class=\"form-control\"  value='$Semester1' readonly><input type=\"hidden\" name=\"Klassenid\"  class=\"form-control\"  value='$idfromClass' readonly>$Semester1</td>
                <td><input type=\"hidden\" name=\"Datum\"  class=\"form-control\"  value='$datum' readonly><input type=\"hidden\" name=\"semester\"  class=\"form-control\"  value='$datum' readonly>$datum</td>
                <td scope='row'><button type='submit' class='btn btn-primary'>Zur Auswertung</button></td>
                </tr>
                     </form>";
                }
            }catch(Exception $e) {
            echo 'Ein Fehler ist aufgetreten: ',  $e->getMessage(), "\n";

            }





            ?>
            </tbody>
        </table>

        <a href="benedictSeite.php"><button type="button" class="btn btn-primary" style="margin-bottom: 5%;">zurück</button></a>

    </div>


</section>


</body>
</html>