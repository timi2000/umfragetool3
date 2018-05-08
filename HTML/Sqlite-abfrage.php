<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 26.03.18
 * Time: 15:15
 */
session_start();
$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}

$Klassen = $_POST["Klassen"];
 $timestamp = time();

$time = Date("Y-m-d H:i:s");
$Lehrer = $_POST["Lehrer"];
$lehrerexplodiert  = explode(" ", $Lehrer);
$vn = $lehrerexplodiert[ 1 ];
$nn = $lehrerexplodiert[ 0 ];
//$Semester = $_POST["Semester"];
$subjekt = "online umfrage";
$Students = "Select St.s_vn, St.s_nn, St.s_email, St.idStudent from Student AS St, Class AS CL
Where  CL.idClass = St.Class_idClass
and CL.c_n like '$Klassen'";

// Auslesen vom teacher Klassenid
$klassenid = "Select idClass from Class  Where c_n like '$Klassen'";
$result2 = $con->query($klassenid);
while ($row = $result2->fetch_assoc()) {
    $res2 = $row['idClass'];
}

$vn = $vn.'%';
$nn = $nn.'%';
$LehrerID = "Select idTeacher from Teacher Where t_vn like '$vn' and t_nn like '$nn'";
$result3 = $con->query($LehrerID);
while ($row = $result3->fetch_assoc()) {
    $res3 = $row['idTeacher'];

}
// Auslesen vom teacher nachname
$Lehrernname = "Select t_nn from Teacher Where idTeacher like '$res3'";
$result4 = $con->query($Lehrernname);
while ($row = $result4->fetch_assoc()) {
    $res4= $row['t_nn'];

}
// Auslesen vom teacher Vorname
$Lehrervname = "Select t_vn from Teacher Where idTeacher like '$res3'";
$result5= $con->query($Lehrervname);
while ($row = $result5->fetch_assoc()) {
    $res5 = $row['t_vn'];

}

$result = $con->query($Students);
// Eintrag in Security DB

while ($row = $result->fetch_assoc()) {
   // $res = $row['s_vn']." ".$row['s_nn']." ".$row['s_email']." ". $row['idStudent']." ".$Lehrer." ".$Semester." ".$Klassen." ".$timestamp;
    $res = $row['s_vn']." ".$row['s_nn']." ".$row['s_email']." ". $row['idStudent']." ".$Lehrer." ".$Klassen." ".$timestamp;
    echo $res;
    $hash = hash('sha256', $res);
    $sid = $row['idStudent'];
    $svn = $row['s_vn'];
    $snn = $row['s_nn'];
    $semail = $row['s_email'];
     try{

        $db = new SQLite3("/Users/timwidmer/Desktop/Security.db3");

    /*$sql = "INSERT INTO Security (HAsh, NName, VName, email, Tid, Semester, Klasse, StudentID, teacherVn, teacherNn, S_Date)
VALUES ('$hash','$snn','$svn','$semail', '$res3', '$Semester','$res2','$sid','$res5','$res4','$time')";*/

    $sql = "INSERT INTO Security (HAsh, NName, VName, email, Tid, Klasse, StudentID, teacherVn, teacherNn, S_Date)
VALUES ('$hash','$snn','$svn','$semail', '$res3', '$res2','$sid','$res5','$res4','$time')";

    if($db->exec($sql)){
         echo "Daten eintragen.<br />";

     } else {
         echo "Fehler!";
     }
    echo $sql;
    $db->close();
    }catch ( Exception $ex ){
        echo "Fehler: " . $ex->getMessage();
    }

}

    try{
    $db2 = new SQLite3("/Users/timwidmer/Desktop/Security.db3");
    //$getfromDB ="Select ID, HAsh, NName, VName, email, Tid, Semester, Klasse, StudentID From Security WHERE Klasse Like $res2 AND Semester LIKE $Semester AND Tid LIKE $res3";
        $getfromDB ="Select ID, HAsh, NName, VName, email, Tid, Klasse, StudentID, S_Date From Security WHERE Klasse Like $res2  AND Tid LIKE $res3 AND 
        S_Date LIKE '$time' ";
        $ergebniss = $db2->query($getfromDB);
    while($row = $ergebniss->fetchArray()){
        $email = ($row['email']);
        $sqloperation =  "--------- ". htmlspecialchars($row['ID']) ."  - ". htmlspecialchars($row['HAsh']).
            "   -  ". htmlspecialchars($row['NName']) ."  - ". htmlspecialchars($row['VName'])." -  ".
             htmlspecialchars($row['email']) ." -  ". htmlspecialchars($row['Tid'])." -  ".
            /*htmlspecialchars($row['Semester'])*/htmlspecialchars($row['S_Date']) ."  - ". htmlspecialchars($row['Klasse'])." - ". htmlspecialchars($row['StudentID']);
echo "$sqloperation".'<br />'."\n";
$hashi = ($row['HAsh']);
$email = ($row['email']);

$subject = "Lehrer umfrage für $Lehrer ";

        //$link = "http://localhost:8888/auswertung/HTML/start.php?id=$hashi";
        $link = "http://localhost:8888/auswertung/public/start.php?id=$hashi";
        $linkganz ="<a href=\"$link"."\">".$link."</a>";


echo "//////LinkHier////////".$linkganz.'<br />'."\n";

$message = "Sehr geehrter Herr blabla bitte füllen sie diesen Link aus ";

$mail =mail($email,
    $subject,
    $message. " ".$link." ".
    "\n\nVielen Dank .",
    " ");

    }


        $db->close();
        }catch ( Exception $ex ){
    echo "Fehler: " . $ex->getMessage();
        }

$con->close();
//Löschen der datenbank sätze nach einer gewissen zeit
/*
try{
    $db = new SQLite3("/Users/timwidmer/Desktop/Security.db3");
    // $id = $db->escapeString($linkid);
    $sqldelet = "DELETE FROM Security WHERE  DELETE FROM Security";


    $db->close();
}catch ( Exception $ex ){
    echo "Fehler: " . $ex->getMessage();
}*/


echo"<form action=\"Formularabsenden.php\">
                    <div class=\"col-sm\">
                        <button type=\"submit\" class=\"btn btn-danger\">zurück</button>
                    </div>
                </form>";

?>