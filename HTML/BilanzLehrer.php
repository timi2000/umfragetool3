
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="../js/javaScripten.js"></script>
    <script src="scripts.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



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
    <?php
    $con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
    if (mysqli_connect_errno())
    {
        echo "failed to conect to MySQL: ".mysqli_connect_error();

    }

    $Lehrerid = $_POST['lehrerid'];
    $Semester = $_POST['Semester'];
    $Klassenname = $_POST['klassenname'];
    $KlassenId = $_POST['Klassenid'];
    $teacherName = "Select t_vn, t_nn From Teacher WHERE idTeacher Like $Lehrerid ";
    $Kommando= $con->query($teacherName);
    while ($row = $Kommando->fetch_assoc()) {
        $T_vname = $row['t_vn'];
        $T_nname = $row['t_nn'];
    }
    echo "<div class=\"titeldiv\"  style='padding-bottom: 3%;'>
        <h1 class=\"Uebertitel\" >  Lehrer: $T_nname $T_vname <br>Klasse: $Klassenname <br>  Semester: $Semester </h1>
    </div> ";
   echo"<div class=\"tabelle\">
        <a href=\"benedictSeite.php\"><button type=\"button\" class=\"btn btn-primary\" style=\"margin-bottom: 5%;\">zurück</button></a>

        <table class=\"table table-bordered \">
            <thead >
            <tr style=\"width:100%;\">

                <th scope=\"col\">NR</th>
                <th scope=\"col\">Fragen</th>
                <th scope=\"col\"><img  id=\"img1\" src=\"../img/Happy2.PNG\"></th>
                <th scope=\"col\"><img id=\"img2\" src=\"../img/Happy.PNG\"></th>
                <th scope=\"col\"><img  id=\"img3\" src=\"../img/Sad.PNG\"></th>
                <th scope=\"col\"><img   id=\"img4\" src=\"../img/Sad2.PNG\"> </th>
                <th></th>

            </tr>
            </thead>
            <tbody>";







    $thesql="Select Bewertung_idBewertung From Course WHERE Class_idClass Like $KlassenId AND Semester Like $Semester AND Teacher_idTeacher LIKE $Lehrerid";
    $resultat= $con->query($thesql);
    while ($row = $resultat->fetch_assoc()) {
        $bewertungsid = $row['Bewertung_idBewertung'];
    }


    $bewertidNR = 0;

    $SehrgutG = 0;
    $GutG = 0;
    $SchlechtG = 0;
    $SehrSchlechtG = 0;

    $F1Sehrgut = 0;
    $F1Gut = 0;
    $F1Schlecht = 0;
    $F1SehrSchlecht = 0;

    $F2Sehrgut = 0;
    $F2Gut = 0;
    $F2Schlecht = 0;
    $F2SehrSchlecht = 0;

    $F3Sehrgut = 0;
    $F3Gut = 0;
    $F3Schlecht = 0;
    $F3SehrSchlecht = 0;


    $F4Sehrgut = 0;
    $F4Gut = 0;
    $F4Schlecht = 0;
    $F4SehrSchlecht = 0;


    $F5Sehrgut = 0;
    $F5Gut = 0;
    $F5Schlecht = 0;
    $F5SehrSchlecht = 0;


    $F6Sehrgut = 0;
    $F6Gut = 0;
    $F6Schlecht = 0;
    $F6SehrSchlecht = 0;


    $F7Sehrgut = 0;
    $F7Gut = 0;
    $F7Schlecht = 0;
    $F7SehrSchlecht = 0;


    $F8Sehrgut = 0;
    $F8Gut = 0;
    $F8Schlecht = 0;
    $F8SehrSchlecht = 0;


    $F9Sehrgut = 0;
    $F9Gut = 0;
    $F9Schlecht = 0;
    $F9SehrSchlecht = 0;


    $F10Sehrgut = 0;
    $F10Gut = 0;
    $F10Schlecht = 0;
    $F10SehrSchlecht = 0;


    $F11Sehrgut = 0;
    $F11Gut = 0;
    $F11Schlecht = 0;
    $F11SehrSchlecht = 0;


    $F12Sehrgut = 0;
    $F12Gut = 0;
    $F12Schlecht = 0;
    $F12SehrSchlecht = 0;


    $F13Sehrgut = 0;
    $F13Gut = 0;
    $F13Schlecht = 0;
    $F13SehrSchlecht = 0;


    $F14Sehrgut = 0;
    $F14Gut = 0;
    $F14Schlecht = 0;
    $F14SehrSchlecht = 0;


    for($count = 0; $count<count($bewertungsid); $count++){
    //$Kursliste= "Select Course.Class_idClass, Course.Semester, Class.c_n From Course LEFT JOIN Class ON Course.Class_idClass = Class.idClass Where Teacher_idTeacher LIKE '$res'GROUP BY Semester";
    $umfragewert= "Select Course.Bewertung_idBewertung, Bewertung.* from Course LEFT JOIN Bewertung ON Course.Bewertung_idBewertung = Bewertung.idBewertung WHERE Course.Class_idClass Like $KlassenId AND Course.Semester Like $Semester AND Course.Teacher_idTeacher LIKE $Lehrerid";
    $kommando= $con->query($umfragewert);
    while ($row1 = $kommando->fetch_assoc()) {
        $IDBewertungs = $row1['Bewertung_idBewertung'];
        $IDBewertung = $row1['idBewertung'];
        $Frage1 = $row1['Frage1'];
        $Frage2 = $row1['Frage2'];
        $Frage3 = $row1['Frage3'];
        $Frage4 = $row1['Frage4'];
        $Frage5 = $row1['Frage5'];
        $Frage6 = $row1['Frage6'];
        $Frage7 = $row1['Frage7'];
        $Frage8 = $row1['Frage8'];
        $Frage9 = $row1['Frage9'];
        $Frage10 = $row1['Frage10'];
        $Frage11 = $row1['Frage11'];
        $Frage12 = $row1['Frage12'];
        $Frage13 = $row1['Frage13'];
        $Frage14 = $row1['Frage14'];
        $pos[] = $row1['pos'];
        $neg[] = $row1['neg'];

        $bewertidNR++;


       switch ($Frage1) {
            case 0:
                $F1Sehrgut++;
                break;
            case 1:
                $F1Gut++;
                break;
            case 2:
                $F1Schlecht++;
                break;
            case 3:
                $F1SehrSchlecht++;
                break;
        }
//Frage 2

        /*$F2Sehrgut = 0;
        $F2Gut = 0;
        $F2Schlecht = 0;
        $F2SehrSchlecht = 0;*/
        switch ($Frage2) {
            case 0:
                $F2Sehrgut++;
                break;
            case 1:
                $F2Gut++;
                break;
            case 2:
                $F2Schlecht++;
                break;
            case 3:
                $F2SehrSchlecht++;
                break;
        }
        //Frage 3
        /*$F3Sehrgut = 0;
        $F3Gut = 0;
        $F3Schlecht = 0;
        $F3SehrSchlecht = 0;*/
        switch ($Frage3) {
            case 0:
                $F3Sehrgut++;
                break;
            case 1:
                $F3Gut++;
                break;
            case 2:
                $F3Schlecht++;
                break;
            case 3:
                $F3SehrSchlecht++;
                break;
        }

        switch ($Frage4) {
            case 0:
                $F4Sehrgut++;
                break;
            case 1:
                $F4Gut++;
                break;
            case 2:
                $F4Schlecht++;
                break;
            case 3:
                $F4SehrSchlecht++;
                break;
        }

        switch ($Frage5) {
            case 0:
                $F5Sehrgut++;
                break;
            case 1:
                $F5Gut++;
                break;
            case 2:
                $F5Schlecht++;
                break;
            case 3:
                $F5SehrSchlecht++;
                break;
        }

        switch ($Frage6) {
            case 0:
                $F6Sehrgut++;
                break;
            case 1:
                $F6Gut++;
                break;
            case 2:
                $F6Schlecht++;
                break;
            case 3:
                $F6SehrSchlecht++;
                break;
        }

        switch ($Frage7) {
            case 0:
                $F7Sehrgut++;
                break;
            case 1:
                $F7Gut++;
                break;
            case 2:
                $F7Schlecht++;
                break;
            case 3:
                $F7SehrSchlecht++;
                break;
        }

        switch ($Frage8) {
            case 0:
                $F8Sehrgut++;
                break;
            case 1:
                $F8Gut++;
                break;
            case 2:
                $F8Schlecht++;
                break;
            case 3:
                $F8SehrSchlecht++;
                break;
        }

        switch ($Frage9) {
            case 0:
                $F9Sehrgut++;
                break;
            case 1:
                $F9Gut++;
                break;
            case 2:
                $F9Schlecht++;
                break;
            case 3:
                $F9SehrSchlecht++;
                break;
        }

        switch ($Frage10) {
            case 0:
                $F10Sehrgut++;
                break;
            case 1:
                $F10Gut++;
                break;
            case 2:
                $F10Schlecht++;
                break;
            case 3:
                $F10SehrSchlecht++;
                break;
        }

        switch ($Frage11) {
            case 0:
                $F11Sehrgut++;
                break;
            case 1:
                $F11Gut++;
                break;
            case 2:
                $F11Schlecht++;
                break;
            case 3:
                $F11SehrSchlecht++;
                break;
        }

        switch ($Frage12) {
            case 0:
                $F12Sehrgut++;
                break;
            case 1:
                $F12Gut++;
                break;
            case 2:
                $F12Schlecht++;
                break;
            case 3:
                $F12SehrSchlecht++;
                break;
        }

        switch ($Frage13) {
            case 0:
                $F13Sehrgut++;
                break;
            case 1:
                $F13Gut++;
                break;
            case 2:
                $F13Schlecht++;
                break;
            case 3:
                $F13SehrSchlecht++;
                break;
        }

        switch ($Frage14) {
            case 0:
                $F14Sehrgut++;
                break;
            case 1:
                $F14Gut++;
                break;
            case 2:
                $F14Schlecht++;
                break;
            case 3:
                $F14SehrSchlecht++;
                break;
        }
       }
}



// echo "Gesamtbögen abgabe". $bewertidNR;
    echo" <tr>

                <th> Gesamt abgegbene bögen: $bewertidNR</th>
                <td></td>
                <td  style=\"background-color:rgb(68, 148, 48);\"></td>
                <td style=\"background-color:rgb(115, 174, 227);\"></td>
                <td style=\"background-color:rgb(230, 105, 62);\"></td>
                <td style=\"background-color:rgb(216, 37, 53);\" ></td>
                <td></td>

            </tr>";
    echo"<tr>
    <script type=\"text/javascript\">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Auswertung', 'chart '],
                ['Sehrgut' ,     $F1Sehrgut],
                ['Gut',      $F1Gut],
                ['Schlecht ',  $F1Schlecht],
                ['Sehrschlecht', $F1SehrSchlecht]


            ]);

            var options = {
                title: 'Frage1 resultat',
                 colors:['#449430','#73aee3','#e6693e','#d82535']
                  //colors:['#449430','#73aee3','#e6693e','#d82535']
                 // colors:['#449430','#f9af60','#e6693e','#d82535']
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie1'));

            chart.draw(data, options);
        }
    </script>
                <th scope=\"row\">1</th>
                <td>Kennt die Lehrperson Die Organisation und Abläufe der Schule?</td>
                <td>$F1Sehrgut</td>
                <td>$F1Gut</td>
                <td>$F1Schlecht</td>
                <td>$F1SehrSchlecht</td>
                <td><div id=\"pie1\" style=\"width: 160px; height: 120px;\"></div></td>

            </tr>";
    echo "<tr>
 <script >
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Auswertung', 'chart '],
                ['Sehrgut' ,     $F2Sehrgut],
                ['Gut',      $F2Gut],
                ['Schlecht ',  $F2Schlecht],
                ['Sehrschlecht', $F2SehrSchlecht]


            ]);

            var options = {
                title: 'Frage2 resultat',
                 colors:['#449430','#73aee3','#e6693e','#d82535']
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie2'));

            chart.draw(data, options);
        }
    </script>
                <th scope=\"row\">2</th>
                <td>Steht die Lehrperson positiv zur Bénédict-Schule?</td>
                <td>$F2Sehrgut</td>
                <td>$F2Gut</td>
                <td>$F2Schlecht</td>
                <td>$F2SehrSchlecht</td>
                <td><div id=\"pie2\" style=\"width: 160px; height: 120px;\"></div></td>

            </tr>";
    echo "<tr> <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Auswertung', 'chart '],
                ['Sehrgut' ,     $F3Sehrgut],
                ['Gut',      $F3Gut],
                ['Schlecht ',  $F3Schlecht],
                ['Sehrschlecht', $F3SehrSchlecht]


            ]);

            var options = {
                title: 'Frage3 resultat',
                colors:['#449430','#73aee3','#e6693e','#d82535']
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie3'));

            chart.draw(data, options);
        }
    </script>
                <th scope=\"row\">3</th>
                <td> Bereitet sich die Lehrperson auf die Lektionen vor?</td>

                 <td>$F3Sehrgut</td>
                <td>$F3Gut</td>
                <td>$F3Schlecht</td>
                <td>$F3SehrSchlecht</td>
                <td><div id=\"pie3\" style=\"width: 160px; height: 120px;\"></div></td>
            </tr>";
    echo "<tr> <script >
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Auswertung', 'chart '],
                ['Sehrgut' ,     $F4Sehrgut],
                ['Gut',      $F4Gut],
                ['Schlecht ',  $F4Schlecht],
                ['Sehrschlecht', $F4SehrSchlecht]


            ]);

            var options = {
                title: 'Frage4 resultat',
                colors:['#449430','#73aee3','#e6693e','#d82535']
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie4'));

            chart.draw(data, options);
        }
    </script>

                <th scope=\"row\">4</th>
                <td> Informiert die Lehrperson über den Unterrichtsablauf(Ablauf, Lernziele, Zwischenprüfungen, Hausaufgaben)?</td>

                  <td>$F4Sehrgut</td>
                <td>$F4Gut</td>
                <td>$F4Schlecht</td>
                <td>$F4SehrSchlecht</td>
                <td><div id=\"pie4\" style=\"width: 160px; height: 120px;\"></div></td>
            </tr>
    ";
    echo " <tr><script >
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Auswertung', 'chart '],
                ['Sehrgut' ,     $F5Sehrgut],
                ['Gut',      $F5Gut],
                ['Schlecht ',  $F5Schlecht],
                ['Sehrschlecht', $F5SehrSchlecht]


            ]);

            var options = {
                title: 'Frage5 resultat',
                colors:['#449430','#73aee3','#e6693e','#d82535']
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie5'));

            chart.draw(data, options);
        }
    </script>
                <th scope=\"row\">5</th>
                <td>Hat die Lehrperson ein Schrittweisses Vorgehen? </td>

                <td>$F5Sehrgut</td>
                <td>$F5Gut</td>
                <td>$F5Schlecht</td>
                <td>$F5SehrSchlecht</td>
                <td><div id=\"pie5\" style=\"width: 160px; height: 120px;\"></div></td>
            </tr>";
    echo "<tr><script >
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Auswertung', 'chart '],
                ['Sehrgut' ,     $F6Sehrgut],
                ['Gut',      $F6Gut],
                ['Schlecht ',  $F6Schlecht],
                ['Sehrschlecht', $F6SehrSchlecht]


            ]);

            var options = {
                title: 'Frage6 resultat',
                colors:['#449430','#73aee3','#e6693e','#d82535']
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie6'));

            chart.draw(data, options);
        }
    </script>
                <th scope=\"row\">6</th>
                <td> Visualisiert die Lehrperson abwechslungsreich und spannend? </td>

                 <td>$F6Sehrgut</td>
                <td>$F6Gut</td>
                <td>$F6Schlecht</td>
                <td>$F6SehrSchlecht</td>
                <td><div id=\"pie6\" style=\"width: 160px; height: 120px;\"></div></td>
            </tr>";
    echo"<tr><script >
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Auswertung', 'chart '],
                ['Sehrgut' ,     $F7Sehrgut],
                ['Gut',      $F7Gut],
                ['Schlecht ',  $F7Schlecht],
                ['Sehrschlecht', $F7SehrSchlecht]


            ]);

            var options = {
                title: 'Frage7 resultat',
                colors:['#449430','#73aee3','#e6693e','#d82535']
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie7'));

            chart.draw(data, options);
        }
    </script>
    
                <th scope=\"row\">7</th>
                <td> Unterrichtet die Lehrperson motiviert?</td>

                <td>$F7Sehrgut</td>
                <td>$F7Gut</td>
                <td>$F7Schlecht</td>
                <td>$F7SehrSchlecht</td>
                <td><div id=\"pie7\" style=\"width: 160px; height: 120px;\"></div></td>
            </tr>";
    echo "   <tr>
   <script >
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Auswertung', 'chart '],
                ['Sehrgut' ,     $F8Sehrgut],
                ['Gut',      $F8Gut],
                ['Schlecht ',  $F8Schlecht],
                ['Sehrschlecht', $F8SehrSchlecht]


            ]);

            var options = {
                title: 'Frage8 resultat',
                colors:['#449430','#73aee3','#e6693e','#d82535']
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie8'));

            chart.draw(data, options);
        }
    </script>
                <th scope=\"row\">8</th>
                <td> Bringt die Lehrperson Praxisbeispiele?</td>

                 <td>$F8Sehrgut</td>
                <td>$F8Gut</td>
                <td>$F8Schlecht</td>
                <td>$F8SehrSchlecht</td>
                <td><div id=\"pie8\" style=\"width: 160px; height: 120px;\"></div></td>
            </tr>
    ";
    echo "<tr><script >
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Auswertung', 'chart '],
                ['Sehrgut' ,     $F9Sehrgut],
                ['Gut',      $F9Gut],
                ['Schlecht ',  $F9Schlecht],
                ['Sehrschlecht', $F9SehrSchlecht]


            ]);

            var options = {
                title: 'Frage9 resultat',
                colors:['#449430','#73aee3','#e6693e','#d82535']
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie9'));

            chart.draw(data, options);
        }
    </script>
                <th scope=\"row\" style=\"background-color: transparent;\">9</th>
                <td> Vermittelt die Lehrperson den Stoff klar und deutlich?</td>

                 <td>$F9Sehrgut</td>
                <td>$F9Gut</td>
                <td>$F9Schlecht</td>
                <td>$F9SehrSchlecht</td>
                <td><div id=\"pie9\" style=\"width: 160px; height: 120px;\"></div></td>
            </tr>
            ";
    echo"  <tr><script >
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Auswertung', 'chart '],
                ['Sehrgut' ,     $F10Sehrgut],
                ['Gut',      $F10Gut],
                ['Schlecht ',  $F10Schlecht],
                ['Sehrschlecht', $F10SehrSchlecht]


            ]);

            var options = {
                title: 'Frage10 resultat',
                colors:['#449430','#73aee3','#e6693e','#d82535']
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie10'));

            chart.draw(data, options);
        }
    </script>
                <th scope=\"row\">10</th>
                <td> Erhalten Sie genügend Selbstlern und Übungsangebote?</td>

                 <td>$F10Sehrgut</td>
                <td>$F10Gut</td>
                <td>$F10Schlecht</td>
                <td>$F10SehrSchlecht</td>
                <td><div id=\"pie10\" style=\"width: 160px; height: 120px;\"></div></td>
            </tr>";
    echo"<tr><script >
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Auswertung', 'chart '],
                ['Sehrgut' ,     $F11Sehrgut],
                ['Gut',      $F11Gut],
                ['Schlecht ',  $F11Schlecht],
                ['Sehrschlecht', $F11SehrSchlecht]


            ]);

            var options = {
                title: 'Frage11 resultat',
                colors:['#449430','#73aee3','#e6693e','#d82535']
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie11'));

            chart.draw(data, options);
        }
    </script>
                <th scope=\"row\">11</th>
                <td> Erhalten Sie regelmässig Hausaufgaben?</td>
                 <td>$F11Sehrgut</td>
                <td>$F11Gut</td>
                <td>$F11Schlecht</td>
                <td>$F11SehrSchlecht</td>
                <td><div id=\"pie11\" style=\"width: 160px; height: 120px;\"></div></td>
            </tr>";
    echo"<tr><script >
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Auswertung', 'chart '],
                ['Sehrgut' ,     $F12Sehrgut],
                ['Gut',      $F12Gut],
                ['Schlecht ',  $F12Schlecht],
                ['Sehrschlecht', $F12SehrSchlecht]


            ]);

            var options = {
                title: 'Frage12 resultat',
                colors:['#449430','#73aee3','#e6693e','#d82535']
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie12'));

            chart.draw(data, options);
        }
    </script>
                <th scope=\"row\">12</th>
                <td> Können Sie das Gelernte an der Prüfung anwenden?</td>

                <td>$F12Sehrgut</td>
                <td>$F12Gut</td>
                <td>$F12Schlecht</td>
                <td>$F12SehrSchlecht</td>
                <td><div id=\"pie12\" style=\"width: 160px; height: 120px;\"></div></td>
            </tr>";
        echo"<tr>
<script >
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Auswertung', 'chart '],
                ['Sehrgut' ,    $F13Sehrgut],
                ['Gut',      $F13Gut],
                ['Schlecht ',  $F13Schlecht],
                ['Sehrschlecht', $F13SehrSchlecht]


            ]);

            var options = {
                title: 'Frage13 resultat',
                colors:['#449430','#73aee3','#e6693e','#d82535']
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie13'));

            chart.draw(data, options);
        }
    </script>
                <th scope=\"row\">13</th>
                <td> Wurden Ihre Fachfragen während des Unterrichts beantwortet?</td>

                <td>$F13Sehrgut</td>
                <td>$F13Gut</td>
                <td>$F13Schlecht</td>
                <td>$F13SehrSchlecht</td>
                <td><div id=\"pie13\" style=\"width: 160px; height: 120px;\"></div></td>
            </tr>";


            echo"<tr>
 <script >
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Auswertung', 'chart '],
                ['Sehrgut' ,    $F14Sehrgut],
                ['Gut',      $F14Gut],
                ['Schlecht ',  $F14Schlecht],
                ['Sehrschlecht', $F14SehrSchlecht]


            ]);

            var options = {
                title: 'Frage14 resultat',
                colors:['#449430','#73aee3','#e6693e','#d82535']
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie14'));

            chart.draw(data, options);
        }
    </script>
                <th scope=\"row\">14</th>
                <td> Decken die Lehrmittel den Fachinhalt ab?</td>

                 <td>$F14Sehrgut</td>
                <td>$F14Gut</td>
                <td>$F14Schlecht</td>
                <td>$F14SehrSchlecht</td>
                <td><div id=\"pie14\" style=\"width: 160px; height: 120px;\"></div></td>
            </tr> <tr>
            </tr>
            </tbody>
        </table>";

            echo"
        <table class=\"table table-striped\">
  <thead>
    <tr >
     <th scope=\"col\">Positves</th>
   </tr>
   </thead>
  <tbody>";
            for ($count = 0; $count<count($pos); $count++) {
        //print_r($count);$Nachname[$count]
        $commentpositve= ($pos[$count]);

        echo"<tr><td>$commentpositve</td></tr>";
    }

    echo"</tbody>
</table>";
            echo" <table class=\"table table-striped\">
  <thead>
    <tr >
      <th scope=\"col\">Negatives</th>
     </tr>
  </thead>
  <tbody>";
for ($count = 0; $count<count($neg); $count++) {
        //print_r($count);$Nachname[$count]
        $CommentNegative= ($neg[$count]);
        echo"<tr><td>$CommentNegative</td></tr>";
        }
  echo"
</tbody>
</table>";

    //Sehrgut
    $SehrgutG = $F1Sehrgut + $F2Sehrgut + $F3Sehrgut + $F4Sehrgut + $F5Sehrgut + $F6Sehrgut + $F7Sehrgut + $F8Sehrgut+
    $F9Sehrgut + $F10Sehrgut + $F11Sehrgut + $F12Sehrgut + $F13Sehrgut + $F14Sehrgut;
    //Gut
    $GutG = $F1Gut + $F2Gut + $F3Gut + $F4Gut + $F5Gut + $F6Gut + $F7Gut + $F8Gut + $F9Gut + $F10Gut + $F11Gut + $F12Gut
    + $F13Gut + $F14Gut;
    //Schlecht
    $SchlechtG = $F1Schlecht + $F2Schlecht + $F3Schlecht +$F4Schlecht + $F5Schlecht + $F6Schlecht +$F7Schlecht + $F8Schlecht+
            $F9Schlecht + $F10Schlecht + $F11Schlecht + $F12Schlecht + $F13Schlecht + $F14Schlecht;

    $SehrSchlechtG = $F1SehrSchlecht + $F2SehrSchlecht + $F3SehrSchlecht + $F4SehrSchlecht + $F5SehrSchlecht + $F6SehrSchlecht+
                $F7SehrSchlecht + $F8SehrSchlecht + $F9SehrSchlecht + $F10SehrSchlecht + $F11SehrSchlecht + $F12SehrSchlecht + $F13SehrSchlecht + $F14SehrSchlecht;
            echo"
<script type=\"text/javascript\">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Auswertung', 'chart '],
                ['Sehrgut' ,     $SehrgutG],
                ['Gut',      $GutG],
                ['Schlecht ',  $SchlechtG],
                ['Sehrschlecht', $SehrSchlechtG]
                ]);

            var options = {
                title: 'Alle auswertung zusammengefasst',
                colors:['#449430','#73aee3','#e6693e','#d82535']
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>

<div id=\"piechart\" style=\"width: 900px; height: 500px;\"></div>";



        echo"<a href=\"benedictSeite.php\"><button type=\"button\" class=\"btn btn-primary\" style=\"margin-bottom: 5%;\">zurück</button></a>
<button type=\"button\" class=\"btn btn-primary\" style=\"margin-bottom: 5%;\">drucken</button>";

    ?>
    </div>
</section>


</body>
</html>
