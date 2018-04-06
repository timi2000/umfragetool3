<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 01.03.18
 * Time: 14:46
 */
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
$frage15 = $_POST["group15"];
$positves =  $_POST["positves"];
$negatives = $_POST["negatives"];
echo($frage1. " " .$frage2." " .$frage3. " "  .$frage4. " ".$frage5. " " .$frage6. " ".$frage7." ".$frage8." ".$frage9." ".
$frage10." ". $frage11." ". $frage12. " ". $frage13." ". $frage14. " ".$frage15. " ".$positves. " ".$negatives);

/*$Fragenzusammenfassen = $frage15; $frage1; $frage2; $frage3; $frage4; $frage5; $frage6; $frage7; $frage8; $frage9; $frage10;
$frage11; $frage12; $frage13; $frage14;*/

/*$sql = "
  INSERT INTO `Bewertung`
  ( 
  `idBewertung` , `FrageNR` , `FrageWert` 
  
  ) 
  VALUES
  (
'1','1','1'
  );
";*/
//$db_erg = mysqli_query($db_link, $sql)
//or die("Anfrage fehlgeschlagen: " . mysqli_error());

/*$con = new PDO ("mysql:host=127.0.0.1;Port:8889;dbname=mydb@localhost",'timwidmer','root');
//$pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');
$statement = $pdo->prepare("INSERT INTO Bewertung (idBewertung, FrageWert, FrageNR) VALUES (1,1,1)");
//function mysql_connect ($server = 'ini_get("localhost")', $username = 'ini_get("root")', $password = 'ini_get("root")', $new_link = false, $client_flags = 0) {}


$statement->execute(array(1,1,1));

try{
    // code that may throw an exception
    $con = new PDO ("mysql:host=127.0.0.1;Port:8889;dbname=mydb@localhost",'timwidmer','root');
} catch(Exception $e){
    echo $e->getMessage();
}
*/
//phpinfo();


$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}



//mysqli_query($con,"SELECT Frage1, Frage2, Frage3, Frage4, Frage5, Frage6, Frage7, Frage8, Frage9, Frage10, Frage11, Frage12, Frage13, Frage14, Frage15 ,pos, neg FROM Bewertung");
mysqli_query($con,"INSERT INTO Bewertung ( Frage1, Frage2, Frage3, Frage4, Frage5, Frage6, Frage7, Frage8, Frage9, Frage10, Frage11, Frage12, Frage13, Frage14, Frage15, pos, neg) 
Values ($frage1, $frage2, $frage3, $frage4, $frage5, $frage6, $frage7, $frage8, $frage9, $frage10, $frage11, $frage12, $frage13, $frage14, $frage15 ,'$positves', '$negatives')");
//$lastid =  mysqli_insert_id($con);
mysqli_close($con);



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
$con->close();
?>