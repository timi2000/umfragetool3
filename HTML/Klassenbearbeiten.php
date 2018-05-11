<!--<!DOCTYPE html>
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
            var table= document.getElementById("myTable2");
            var row = table.deleteRow(-1);

        }
    </script>

    <script type="text/javascript">

        function displayResult()

        {


            var  table=document.getElementById("myTable2");
            //var n = countrows.toString();
            var row = table.insertRow(-1);
            var countrows = document.getElementById('myTable2').rows.length;
            var cell1=row.insertCell(0);
            var cell2=row.insertCell(1);
            var cell3=row.insertCell(2);
            var cell4=row.insertCell(3);
            var cell5=row.insertCell(4);
            cell1.innerHTML= countrows;
            cell2.innerHTML="<input type=\"text\" name=\"Nachname[]\" class=\"form-control \"  placeholder=\"Nachname\" > ";
            cell3.innerHTML="<input type=\"text\" name=\"Vorname[]\" class=\"form-control Vorname\"  placeholder=\"Vorname\">";
            cell4.innerHTML="<input type=\"email\" name=\"Email[]\" class=\"form-control email\"   placeholder=\"email\">";
            cell5.innerHTML="<button type=\"button\" class=\"btn btn-danger\" onclick=\"deleteRow(this)\">Aus Klasse entfernen</button>";
        }


    </script>
    <script>
        function deleteRow(r ) {
            var i = r.parentNode.parentNode.rowIndex - 1;
            document.getElementById("myTable2").deleteRow(i);
        }
    </script>

</head>
<body>
<section>
<div>
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



  <!--<form method="post" action="Updateklasse.php">-->
        <?php
/*
        $Klassen = $_POST["KlassenName"];
echo "<input type=\"text\" name=\"NamenDerKlasse\" class=\"form control\" value=\"$Klassen\">";
        $prints =" <html> 
               <h1  style=\"text-align: center; margin: 0 auto; padding-top:3%; padding-bottom: 2%; \"> $Klassen</h1>
             </html>";
        echo"$prints"; ?>

    <div class="tabelle" >

    <table class="table table-striped" >
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nachname</th>
            <th scope="col">Vorname</th>
            <th scope="col">E-mail</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody id="myTable2">


        <?php
        /**
         * Created by PhpStorm.
         * User: timwidmer
         * Date: 09.04.18
         * Time: 12:08
         */

/*
        $con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
        if (mysqli_connect_errno())
        {
            echo "failed to conect to MySQL: ".mysqli_connect_error();
        }
        $Klassen = $_POST["KlassenName"];
        $klassenid = "Select idClass from Class  Where c_n like '$Klassen'";
        $result2 = $con->query($klassenid);
        $Students = "Select St.s_vn, St.s_nn, St.s_email , St.idStudent from Student AS St, Class AS CL
Where  CL.idClass = St.Class_idClass
and CL.c_n like '$Klassen'";

        $result = $con->query($Students);

       while ($row = $result2->fetch_assoc()) {
            $res2 = $row['idClass'];

        }

        $Students = "Select St.s_vn, St.s_nn, St.s_email , St.idStudent from Student AS St, Class AS CL
Where  CL.idClass = St.Class_idClass
and CL.c_n like '$Klassen'";

        $result = $con->query($Students);

        while ($row = $result->fetch_assoc()  ) {
            $svn = $row['s_vn'];
            $snn = $row['s_nn'];
            $semail = $row['s_email'];

            $rows= "<tr>"."<th>"."$res2"."</th>"."<td>"."<input type=\"text\" name=\"Nachname[]\" class=\"form-control\"   value=\" $snn \">"."</td>". "<td>"."<input type=\"text\" name=\"Vorname[]\" class=\"form-control\"   value=\" $svn \">"."</td>". "<td>"."<input type=\"email\" name=\"Email[]s\" class=\"form-control\"   value=\" $semail \">". "</td>"."<td>".
                 "<button type=\"button\" class=\"btn btn-danger\" onclick=\"deleteRow(this)\">". "Aus Klasse entfernen "."</button>"."</td>"."</tr>";

            echo $rows;


        }

        //get data from db
       // $sql = mysql_query("SELECT * FROM table");




        $con->close();

        ?>

        </tbody>
    </table>
        <form action="Klassenübersicht.php">
                    <div class="col-sm">
                        <button type="submit" class="btn btn-primary">zurück</button>
                    </div>
                </form>
        <div class="col-sm" style="margin: 0 auto; ">
        <button type="button" class="btn btn-secundary" onclick="displayResult()">Neue Reihe hinzufügen </button>
    </div>
    <div class="col-sm" style="margin: 0 auto; ">
        <button type="button" class="btn btn-secundary" onclick="wegMitDerReihe()">Klasse Entfernen </button>

    </div>
        <div class="col-sm"  >
            <button type="submit" class="btn btn-danger">Veränderung übernehmen</button>

        </div>









</div>

</section>
</body>
</html>
