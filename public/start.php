<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 17.04.18
 * Time: 13:15
 */
session_start();
$linkid = $_GET['id'];
//$linkid = 123123;
//$linkid = $_['HAsh'];
echo "hallo glaus hallo Tim  " . $linkid."  UUUUU   ";
try {
    $db = new SQLite3("/Users/timwidmer/Desktop/Security.db3");
    $sql = "Select ID, HAsh, NName, VName, email, Tid, Semester, Klasse, StudentID, teacherVn, teacherNn, S_Date From Security WHERE HAsh = '$linkid'";
    $ergebnis = $db->query($sql);
    //echo $ergebnis;
    while ($row = $ergebnis->fetchArray()) {
        $Hashi=$row['HAsh'];
        // $_SESSION["ID"]= $bewertungid;

        echo "-----------".$row['ID']. " " . $row['HAsh'] . " " . $row['NName'] . " " .
            $row['VName'] . " " . $row['email'] . " " . $row['Tid'] . " " .
            $row['Semester'] . " " . $row['Klasse']. " ".$row['StudentID']. " ".$row['teacherVn']. " ".$row['teacherNn'];
        $dataid = $row['ID'];
        $Hashcode = $row['HAsh'];
        $nachname = $row['NName'];
        $vorname = $row['VName'];
        $emails = $row['email'];
        $idlehrer = $row['Tid'];
        $semester = $row['Semester'];
        $idderklassen = $row['Klasse'];
        $studentid = $row['StudentID'];
        $teachervn= $row['teacherVn'];
        $teachernn = $row['teacherNn'];
        $S_date =  $row['S_Date'];
    }
    $db->close();
} catch(Exception $ex){
    echo "Fehler: " . $ex->getMessage();
}

/*try{
    $con = new mysqli("127.0.0.1","root","root", "mydb", "3306");
    $sql =$con->prepare( "INSERT INTO Course ( Bewertung_idBewertung, Class_idClass, Teacher_idTeacher, Student_idStudent, Student_Class_idClass, Frage6, Frage7, Frage8, Frage9, Frage10, Frage11, Frage12, Frage13, Frage14,  pos, neg)
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
}
*/
/*
kontrolle ob id in sqlite
HAsh gleich ist wie $linkid
wenn nein seite zuweisen ihre seites konnte nicht gefunden werden
wenn ja aus Tabelle security Die werte der course tabelle heraus hollen
einzelne attribute in ein session speichern
wenn alles erledigt ist Auswertung.php aufrufen und diese Werte wieder auslesen

$_SESSION[]s

*/



$_SESSION['ID'] = $dataid;
$_SESSION['HAsh'] = $Hashcode;
$_SESSION['NName'] = $nachname;
$_SESSION['VName'] = $vorname;
$_SESSION['email'] = $emails;
$_SESSION['Tid'] = $idlehrer;
$_SESSION['Semester'] = $semester;
$_SESSION['Klasse'] = $idderklassen;
$_SESSION['StudentID'] = $studentid;
$_SESSION['teacherVn'] = $teachervn;
$_SESSION['teacherNn'] = $teachernn;
$_SESSION['S_Date']= $S_date;

if ($linkid == $Hashcode){
    echo "jaaj";
//Security Den Gabnzen daten satz löschen  der $HAshi Löschen
    /*try{
     $db = new SQLite3("/Users/timwidmer/Desktop/Security.db3");
    // $id = $db->escapeString($linkid);
     $sqldelet = "DELETE FROM Security ";
     if ($db->exec($sqldelet)){
         header( "Location:Auswertung.php?id=$Hashcode");
     }
     else {
         echo "Fuck";
     }
     $db->close();
 }catch ( Exception $ex ){
     echo "Fehler: " . $ex->getMessage();
 }
 */
    header( "Location:Auswertung.php?id=$Hashcode");



}
else {
    echo "Ein fehler ist aufgetreten";
    header( "Location:error.php");
}



?>