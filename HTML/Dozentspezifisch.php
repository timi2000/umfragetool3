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

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Auswertung</th>
                <th scope="col">Absende datum </th>

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
            $LehrerID = "Select idTeacher from Teacher Where t_vn like '$vn' and t_nn like '$nn'";
           // $sql = "Select idTeacher from Teacher Where t_vn like '$vn' and t_nn like '$nn'";
           // $sql = "INSERT INTO Teacher(t_vn, t_nn, t_email) Values (?,?,?)";
           /* $kommando = $con->prepare($sql);
            $kommando->bind_param("sss", $Nachname, $Vorname, $Email);
            $kommando->execute();
            $con->close();

            $sql = "Select idTeacher from Teacher Where t_vn like '$vn' and t_nn like '$nn'";

            $LehrerID = "Select idTeacher from Teacher Where t_vn like '$vn' and t_nn like '$nn'";*/
            $result3 = $con->query($LehrerID);
            while ($row = $result3->fetch_assoc()) {
                $res3 = $row['idTeacher'];
                }
            echo $LehrerName ." ". $res3;

            echo '<tr>
                <th scope="row"><a href="index.html" ><button type="button" class="btn btn-primary">Anschauen</button></a></th>
                <td>hoi Tim </td>
                <td>12.3.2017</td>

            </tr>';

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

            <tr>
                <th scope="row"><a href="index.html" ><button type="button" class="btn btn-primary">Anschauen</button></a></th>
                <td>a14</td>
                <td>12.3.2017</td>

            </tr>
            <tr>
                <th scope="row"><a href="index.html" ><button type="button" class="btn btn-primary">Anschauen</button></a></th>
                <td>a17</td>
                <td>12.3.2017</td>

            </tr>

            </tbody>
        </table>
        <a href="benedictSeite.php"><button type="button" class="btn btn-primary" style="margin-bottom: 5%;">zurück</button></a>
    </div>


</section>
<footer>

</footer>

</body>
</html>