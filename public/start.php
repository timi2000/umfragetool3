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
}
catch(Exception $ex){
    echo "Fehler: " . $ex->getMessage();
}





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

    header( "Location:Auswertung.php?id=$Hashcode");
}
else {
    echo "Ein fehler ist aufgetreten";
    header( "Location:error.php");
}



?>