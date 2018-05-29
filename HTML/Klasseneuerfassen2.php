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

<?php

$con = new MySQli("127.0.0.1", "root", "root", "mydb", "3306");
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 04.04.18
 * Time: 11:54
 */
$SNname = $_POST["Nachname"];
$SVname = $_POST['Vorname'];
$SEmail = $_POST["Email"];
$klasse = $_POST["KlassenNamen"];

echo $klasse. "   ";




try{
    $sql = "INSERT INTO Class(c_n) VALUES (?)";
    $kommando = $con->prepare($sql);
    $kommando->bind_param("s", $klasse);
    $kommando->execute();

    $id = $con->insert_id;
    echo " Daten mit der ID $id eingetragen.<br />";

}
catch(Exception $ex){
    echo "Fehler : " .$ex->getMessage();
}



if(isset($_POST["Nachname"]))
{
    $SNname = $_POST["Nachname"];
    $SVname = $_POST['Vorname'];
    $SEmail = $_POST["Email"];
    $query = '';
    for($count = 0; $count<count($SNname); $count++)
    {
        $SNname_clean = mysqli_real_escape_string($con, $SNname[$count]);
        $SVname_clean = mysqli_real_escape_string($con, $SVname[$count]);
        $SEmail_clean = mysqli_real_escape_string($con, $SEmail[$count]);

        if($SNname_clean != '' && $SVname_clean != '' && $SEmail_clean != '' )
        {
            $query .= '
   INSERT INTO Student(s_vn, s_nn, s_email, Class_idClass) 
   VALUES("'.$SVname_clean.'", "'.$SNname_clean.'", "'.$SEmail_clean.'", "'.$id.'"); 
   ';
        }
    }
    if($query != '')
    {
        if(mysqli_multi_query($con, $query))
        {
            echo 'Item Data Inserted';
            echo'<H1>Klasse Wurde erfolgreich Erstellt </H1>
            <a href="klasseerfassen.php"><button style="margin-right:2%;"type="button" class="btn btn-primary" >zurück</button></a>';

        }
        else
        {
            echo 'Error';

        }
    }
    else
    {
        echo 'All Fields are Required';
    }
}
?>
</body>
</html>

