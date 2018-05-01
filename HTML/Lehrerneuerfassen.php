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
<?php
$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}
$Nachname = htmlentities($_POST["TeacherNName"]);
$Vorname = htmlentities($_POST["TeacherVName"]);
$Email = htmlentities($_POST["TeacherEmail"]);
echo($Nachname. " ".$Vorname." ". $Email);

try{
    //$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
    $sql = "INSERT INTO Teacher(t_vn, t_nn, t_email) Values (?,?,?)";
    $kommando = $con->prepare($sql);
    $kommando->bind_param("sss", $Vorname, $Nachname, $Email);
    $kommando->execute();
    $con->close();
    echo "Daten wurden erfolgreich eingetragen";
    echo'<h1>Lehrer Wurde Erfasst</h1>
    <a href="neuerLehrer.html"><button style="margin-right:2%;"type="button" class="btn btn-primary" >zurück</button></a>';

}
catch(Exception $ex){
    echo"Fehler: ". $ex->getMessage();
}



?>
<body>

