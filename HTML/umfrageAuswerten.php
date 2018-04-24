<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 01.03.18
 * Time: 14:46
 */

session_start( );
if (!isset($_SESSION['email'])){
    session_destroy();
    var_dump($_SESSION);
    die();
}
var_dump($_SESSION);
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
echo($frage1. " " .$frage2." " .$frage3. " "  .$frage4. " ".$frage5. " " .$frage6. " ".$frage7." ".$frage8." ".$frage9." ".
$frage10." ". $frage11." ". $frage12. " ". $frage13." ". $frage14. " " .$positves. " " .$negatives);
echo"<H1>Bewertung wurde versendet</h1>";




try{
    $con = new mysqli("127.0.0.1","root","root", "mydb", "3306");
    $sql =$con->prepare( "INSERT INTO Bewertung ( Frage1, Frage2, Frage3, Frage4, Frage5, Frage6, Frage7, Frage8, Frage9, Frage10, Frage11, Frage12, Frage13, Frage14,  pos, neg) 
    Values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
   // $kommando = $con->prepare($sql);
    $sql->bind_param("iiiiiiiiiiiiiiss", $frage1, $frage2, $frage3, $frage4, $frage5, $frage6, $frage7, $frage8, $frage9, $frage10, $frage11, $frage12, $frage13, $frage14, $positves, $negatives);
    $sql->execute();
    $id = $con->insert_id;
    echo"Daten Wurden in Bewertung Eingetragen.<br />";
    $sql->close();
    $con->close();
    echo"$id";
}
    catch (Exception $ex ){
    echo "Fehler:" . $ex->getMessage();
}

/*try{
    $con = new mysqli("127.0.0.1","root","root", "mydb", "3306");
    $sql =( "Select From Bewertung (idBewertung.)
    Values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    // $kommando = $con->prepare($sql);
    $sql->bind_param("iiiiiiiiiiiiiiss", $frage1, $frage2, $frage3, $frage4, $frage5, $frage6, $frage7, $frage8, $frage9, $frage10, $frage11, $frage12, $frage13, $frage14, $positves, $negatives);
    $sql->execute();
    echo"Daten Wurden Eingetragen.<br />";
    $sql->close();
    $con->close();
}
catch (Exception $ex ){
    echo "Fehler:" . $ex->getMessage();
}*/
///HIEr timii
/*htmlspecialchars($_SESSION['ID']);
$2tmlspecialchars($_SESSION['HAsh']);*/
$snn =htmlspecialchars($_SESSION['NName']);
$svn =htmlspecialchars($_SESSION['VName']);
$semail=htmlspecialchars($_SESSION['email']);
$t_id =htmlspecialchars($_SESSION['Tid']);
$semester =htmlspecialchars($_SESSION['Semester']);
echo "hallo Semester"." ".$semester;
$Klasse =htmlspecialchars($_SESSION['Klasse']);
$SID =htmlspecialchars($_SESSION['StudentID']);
/*$teacherVn=htmlspecialchars($_SES SION['teacherVn']);
$htmlspecialchars($_SESSION['teacherNn']);*/

try{
    $con2 = new mysqli("127.0.0.1","root","root", "mydb", "3306");
    $sql2 =$con2->prepare( "INSERT INTO Course ( Bewertung_idBewertung, Class_idClass, Teacher_idTeacher, Student_idStudent, Student_Class_idClass, Semester)
    Values (?, ? , ?, ?, ?, ?)");
    // $kommando = $con->prepare($sql);
    $sql2->bind_param("iiiiii",$id ,$Klasse , $t_id, $SID, $Klasse, $semester);

    $sql2->execute();
    echo"Daten Wurden Eingetragen in Kurs .<br />";
    $sql2->close();
    $con2->close();
    $_SESSION = array();
    session_destroy();
}
catch (Exception $ex ){
    echo "Fehler:" . $ex->getMessage();
    session_destroy();
}




// prepare and bind
/*$stmt = $con->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);
//mysqli_query($con,"SELECT Frage1, Frage2, Frage3, Frage4, Frage5, Frage6, Frage7, Frage8, Frage9, Frage10, Frage11, Frage12, Frage13, Frage14, Frage15 ,pos, neg FROM Bewertung");


/*mysqli_query($con,"INSERT INTO Bewertung ( Frage1, Frage2, Frage3, Frage4, Frage5, Frage6, Frage7, Frage8, Frage9, Frage10, Frage11, Frage12, Frage13, Frage14,  pos, neg)
Values ($frage1, $frage2, $frage3, $frage4, $frage5, $frage6, $frage7, $frage8, $frage9, $frage10, $frage11, $frage12, $frage13, $frage14,'$positves', '$negatives')");
//$lastid =  mysqli_insert_id($con);*/




/*mysqli_query($con,"SELECT Frage1, Frage2 from Bewertung");
mysqli_query($con, "INSERT INTO Bewertung (Frage1, Frage2) Values ($frage1, $frage2)");

*/

/*if (mysqli_query($con)) {
    $last_id = mysqli_insert_id($con);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}*/


/*$sql = "INSERT INTO Bewertung (Frage1, Frage2, Frage3, Frage4, Frage5,Frage6, Frage7, Frage8, Frage9, Frage10, Frage11, Frage12, Frage13, Frage14, Frage15)
VALUES ( $frage1, $frage2, $frage3, $frage4, $frage5, $frage6, $frage7, $frage8,$frage9, $frage10, $frage11, $frage12, $frage13, $frage14, $frage15)";
$sqlResult = @mysqli_query($sql);
*/
/*$sql = "INSERT INTO Bewertung (Frage1, Frage2, Frage3)
VALUES ($frage1, $frage2, $frage3)";

$result = @mysqli_query($sql);
if (!$result) {
    $message  = 'Ungültige Abfrage: ' . mysqli_error() . "\n";
    $message .= 'Gesamte Abfrage: ' . $sql;
    die($message);
}*/
// Kommentar in Datenbanktabelle 'comments' schreiben:
/*$sql = "insert into Bewertung";
$sql .= "(idBewertung, frageNR, FrageWert) values (";s
$sql .= $articleid.", ";
$sql .= $_POST['frage'].", ";
$sql .= $_POST['mail'].", ";
$sql .= $_POST['text'].", ";
$sql .= $timestamp.")";
$sqlResult = @mysql_query($sql, $dbh);
if(!$sqlResult) // Datensatz konnte nicht gespeichert werden:
    $errorMessage .= '<div class="error">Kommentar
            konnte nicht gespeichert werden</div>';
*/
/*$statement = $con->prepare("INSERT INTO Bewertung (FrageNR, FrageWert, Frage1, Frage2, Frage3, Frage4, Frage5, Frage6, Frage7, Frage8, Frage9, Frage10, Frage11, Frage12, Frage13, Frage14, Frage15)
VALUES ('1', '1', $frage1, $frage2, $frage3, $frage4, $frage5, $frage6, $frage7, $frage8, $frage9, $frage10,
$frage11, $frage12, $frage13, $frage14, $frage15);


 $statement->execute(array( 'FrageNr' => '1',' FrageWert' => $frage1, 'Frage1' => $frage1,    'email' => 'info@php-einfach.de', 'vorname' => 'Klaus', 'nachname' => 'Neumann'));
*/


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
// Delet Row from Tabel Security where

?>