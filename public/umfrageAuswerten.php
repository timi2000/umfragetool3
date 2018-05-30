<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Umfrage Auswerten</title>
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
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 01.03.18
 * Time: 14:46
 */

session_start( );
//var_dump($_SESSION);
//if (!isset($_SESSION['email'])){
//session_destroy();
var_dump($_SESSION);
//die();
//}
$hash= htmlentities(htmlspecialchars($_SESSION['HAsh']));
$snn = htmlentities(htmlspecialchars($_SESSION['NName']));
$svn = htmlentities(htmlspecialchars($_SESSION['VName']));
$semail= htmlentities(htmlspecialchars($_SESSION['email']));
$t_id = htmlentities(htmlspecialchars($_SESSION['Tid']));
$semester = htmlentities(htmlspecialchars($_SESSION['Semester']));
$Klasse = htmlentities(htmlspecialchars($_SESSION['Klasse']));
$SID = htmlentities(htmlspecialchars($_SESSION['StudentID']));
$S_date = htmlentities(htmlspecialchars($_SESSION['S_Date']));


try{
    $db = new SQLite3("/Users/timwidmer/Desktop/Security.db3");

    $sql = 'DELETE FROM Security '
        . 'WHERE HAsh = :HAsh';

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':HAsh',$hash );
    $stmt->execute();
    $db->close();
    //  var_dump($_SESSION);
}catch ( Exception $ex ){
    echo "Fehler: " . $ex->getMessage();
}

$frage1 = $_POST["group1"];
$frage2 = $_POST["group2"];
$frage3 = $_POST["group3"];
$frage4 = $_POST["group4"];
$frage5 = $_POST["group5"];
$frage6 = $_POST["group6"];
$frage7 = $_POST["group7"];
$frage8 = $_POST["group8"];
$frage9 = $_POST["group9"];
$frage10 = $_POST["group10"];
$frage11 = $_POST["group11"];
$frage12 = $_POST["group12"];
$frage13 = $_POST["group13"];
$frage14 = $_POST["group14"];
$positves =  $_POST["positves"];
$negatives = $_POST["negatives"];
/*echo($frage1. " " .$frage2." " .$frage3. " "  .$frage4. " ".$frage5. " " .$frage6. " ".$frage7." ".$frage8." ".$frage9." ".
$frage10." ". $frage11." ". $frage12. " ". $frage13." ". $frage14. " " .$positves. " " .$negatives);*/
//echo"<H1>Bewertung wurde versendet</h1>";



// Dateneintragen in Tabelle Bewertung
try{
    $con = new mysqli("127.0.0.1","root","root", "mydb", "3306");
    $sql =$con->prepare( "INSERT INTO Bewertung ( Frage1, Frage2, Frage3, Frage4, Frage5, Frage6, Frage7, Frage8, Frage9, Frage10, Frage11, Frage12, Frage13, Frage14,  pos, neg) 
    Values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("iiiiiiiiiiiiiiss", $frage1, $frage2, $frage3, $frage4, $frage5, $frage6, $frage7, $frage8, $frage9, $frage10, $frage11, $frage12, $frage13, $frage14, $positves, $negatives);
    $sql->execute();
    $id = $con->insert_id;
    //echo"Daten Wurden in Bewertung Eingetragen.<br />";
    $sql->close();
    $con->close();

}
catch (Exception $ex ){
    echo "Fehler:" . $ex->getMessage();
}


//Daten Eintrag in Tabelle Course
try{

    $con2 = new mysqli("127.0.0.1","root","root", "mydb", "3306");
    $sql2 =$con2->prepare( "INSERT INTO Course ( Bewertung_idBewertung, Class_idClass, Teacher_idTeacher, Student_idStudent, Student_Class_idClass, Semester, c_Date)
    Values (?, ? , ?, ?, ?, ?, ?)");
    $sql2->bind_param("iiiiiis",$id ,$Klasse , $t_id, $SID, $Klasse, $semester, $S_date);
    $sql2->execute();
    echo"<H1 style=\"text-align: center; margin:0 auto; padding-top: 4%;\">Bewertung wurde versendet</h1>";
    //echo"Daten Wurden Eingetragen in Kurs .<br />";
    $sql2->close();
    $con2->close();
    $_SESSION = array();
    //SESSION Wird Gelöscht das man nicht Mehrmals Eine Umfrage absenden kann.
    session_destroy();

}
catch (Exception $ex ){
    echo "Fehler:" . $ex->getMessage();
    session_destroy();
}
//session_destroy();
//TRANSAKTION
/*
try {
    $dbh = new PDO('odbc:SAMPLE', 'db2inst1', 'ibmdb2',
        array(PDO::ATTR_PERSISTENT => true));
    echo "Connected\n";
} catch (Exception $e) {
    die("Unable to connect: " . $e->getMessage());
}

try {
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $dbh->beginTransaction();
    $dbh->exec("insert into staff (id, first, last) values (23, 'Joe', 'Bloggs')");
    $dbh->exec("insert into salarychange (id, amount, changedate)
      values (23, 50000, NOW())");
    $dbh->commit();

} catch (Exception $e) {
    $dbh->rollBack();
    echo "Failed: " . $e->getMessage();
}
*/


?></body>
</html>