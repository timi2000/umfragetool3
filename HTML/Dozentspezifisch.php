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
    <script>
        function ZurNeuenSeite(r ) {
           /* var i = r.parentNode.parentNode.rowIndex ;
            document.getElementById("tabel4").deleteRow(i);*/
         /*   alert("Hello! I am an alert box!!");
            window.location="BilanzLehrer.php"*/
        }

    </script>
    <script>
        $(document).ready(function(){
            /* Hier der jQuery-Code */
           // alert('Hallo Welt');
        });
    </script>

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

        <table class="table table-striped"  id="tabel4" >
            <thead>
            <tr>
                <th scope="col">#</th>

                <th scope="col">KlassenName</th>
                <th scope="col">Semester</th>
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

            echo $LehrerName." ".$res." "."<br />";



//<td><a href="bla.html">Linktext</a></td>

//td a { display:block; width:100%; }
            /*  $BewertungsID = "Select Bewertung_idBewertung From Course WHERE Teacher_idTeacher LIKE '$res'";
            $result1 = $con->query($BewertungsID);
            while ($row1 = $result1->fetch_assoc()) {
                $res1 = $row1['Bewertung_idBewertung'];
                echo "BewertungsID"." ".$res1;
            }
            $ClassID = "Select Class_idClass From Course WHERE Teacher_idTeacher LIKE '$res' ";
            $result2 = $con->query($ClassID);
            while ($row2 = $result2->fetch_assoc()) {
                $res2 = $row2['Class_idClass'];
                echo "Klassenid"." ".$res2;
            }*/
           /* $Kurs= "Select * From Course WHERE Teacher_idTeacher LIKE '$res'";
            $result4 = $con->query($Kurs);
            while ($row = $result4->fetch_assoc()) {
                $res4 = " KursId->  ".$row['idCourse']." Bewertungid-> ".$row['Bewertung_idBewertung']." KlassenId-> ".$row['Class_idClass']."  LEhrerid-> ".$row['Teacher_idTeacher'].
                " Studentenid->".$row['Student_idStudent']." StudentenKlassenid->".$row['Student_Class_idClass']." Semester-> ".$row['Semester'];
                echo $res4."<br />";


            }*/
            $kurs1 ="Select Class_idClass From Course WHERE Teacher_idTeacher LIKE '$res'";
            $result5= $con->query($kurs1);
            while ($row5 = $result5->fetch_assoc()) {
                $res5 = $row5['Class_idClass'];
                // echo "Klass so so ".$res5;
            }

           $klassenName = "Select c_n From Class WHERE idClass LIKE '$res5'";
            $result6= $con->query($klassenName);
            while ($row6 = $result6->fetch_assoc()) {
                //$res6 = "  ".$row['c_n'];
                //echo $res6;
                $res6 =$row6['c_n']."<br />";

               /* $print=' <tr>
                <th scope="row"><a href="BilanzLehrer.php"><button type="button" class="btn btn-primary" value="'.$row6['c_n'].'">'.$row6['c_n'].'</button></a></th>
                <td>hoi Tim </td>
                <td>12.3.2017</td>
                </tr>';
                echo  $print;*/

            }
          //  echo "Klassenname"." ".$res6." "."klassenid".$res5;

          /*  $Kurs= "Select Class_idClass, Semester,  From Course  WHERE Teacher_idTeacher LIKE '$res' GROUP BY Semester ";
            $result4 = $con->query($Kurs);
            while ($row = $result4->fetch_assoc()) {
                $classid = $row['Class_idClass'];
                $klasssename = $row['c_n'];
                //$Studentid = $row['Student_idStudent'];
                $Semester = $row['Semester'];
              echo "klassenid ".$classid."klassenname ".$klasssename."Semester ".$Semester."<br />";
              }
*/
                $Kursliste= "Select Course.Class_idClass, Course.Semester, Class.c_n From Course LEFT JOIN Class ON Course.Class_idClass = Class.idClass Where Teacher_idTeacher LIKE '$res'GROUP BY Semester";
                $whatttt = $con->query($Kursliste);
                while ($zeile = $whatttt->fetch_assoc()) {
                $idfromClass = $zeile['Class_idClass'];
                $Semester1 = $zeile['Semester'];
                $klassenName = $zeile['c_n'];

                /*echo "klassenid " . $idfromClass." klassenname " . $klassenName . " Semester " . $Semester1 . "<br />";*/
                echo "<form method=\"post\" action=\"BilanzLehrer.php\">
                <tr>
                <th><input type=\"hidden\" name=\"lehrerid\"  class=\"form-control\"  value='$res' readonly> </th>
                <td><input type=\"hidden\" name=\"klassenname\"  class=\"form - control\"  value='$klassenName' readonly>$klassenName</td>
                <td><input type=\"hidden\" name=\"Semester\"  class=\"form - control\"  value='$Semester1' readonly><input type=\"hidden\" name=\"Klassenid\"  class=\"form - control\"  value='$idfromClass' readonly>$Semester1</td>
                <td scope='row'><button type='submit' class='btn btn-primary'>Zur Auswertung</button></td>
                </tr>
                     </form>";
            }
          /*  SELECT kommentare.*, users.vorname, users.nachname FROM kommentare
LEFT JOIN users ON kommentare.userid = users.id
WHERE beitragid = 1*/


            //<td><a href="bla.html">Linktext</a></td>

            //td a { display:block; width:100%; }

           // $kurs = "Select idCourse from Course WHERE Bewertung_Teacher_idTeacheridBewertung LIKE '$res1' AND ";


            // $sql = "Select idTeacher from Teacher Where t_vn like '$vn' and t_nn like '$nn'";
            // $sql = "INSERT INTO Teacher(t_vn, t_nn, t_email) Values (?,?,?)";
            /* $kommando = $con->prepare($sql);
             $kommando->bind_param("sss", $Nachname, $Vorname, $Email);
             $kommando->execute();
             $con->close();

            $sql = "Select idTeacher from Teacher Where t_vn like '$vn' and t_nn like '$nn'";

            $LehrerID = "Select idTeacher from Teacher Where t_vn like '$vn' and t_nn like '$nn'";*/









/*
            $sql1 = "SELECT t_vn, t_nn FROM Teacher";
            $result1 = $con->query($sql1);
            echo '<tbody id="cool">';


            while($row = $result1->fetch_assoc()) {

                $print = ' <tr><td> <a href="Dozentspezifisch.php"><button type="button" class="btn btn-primary" style="margin-bottom: 5%;"> ' .$row['t_vn'] . " " . $row['t_nn']. ' </button></a></td> </tr>';
                echo ("$print");
            }
            $con->close();

            echo '</tbody>';
            */
           // $select = bewertung


            ?>

            <!--<tr>
                <th scope="row"><a href="BilanzLehrer.php" ><button type="button" class="btn btn-primary">Anschauen</button></a></th>
                <td>a14</td>
                <td>12.3.2017</td>

            </tr>
            <tr>
                <th scope="row"><a href="BilanzLehrer.php" ><button type="button" class="btn btn-primary">Anschauen</button></a></th>
                <td>a17</td>
                <td>12.3.2017</td>

            </tr>-->

            </tbody>
        </table>

        <a href="benedictSeite.php"><button type="button" class="btn btn-primary" style="margin-bottom: 5%;">zurück</button></a>

    </div>


</section>


</body>
</html>