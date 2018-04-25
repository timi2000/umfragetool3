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
$timestamp = date("d.m.Y.h.i.s.u");
echo $timestamp."  ";
$Lehrer = $_POST["Lehrer"];
$lehrerexplodiert  = explode(" ", $Lehrer);
$vn = $lehrerexplodiert[ 1 ];
$nn = $lehrerexplodiert[ 0 ];
$Semester = $_POST["Semester"];
$subjekt = "online umfrage";
/*$Studentnn = "Select s_nn  from Student Where idClass = Class_idClass and c_n like '$Klassen'";
$Studentvn = "Select s_vn  from Student Where idClass = Class_idClass and c_n like '$Klassen'";
$Studentemail = "Select s_email  from Student Where idClass = Class_idClass and c_n like '$Klassen'";*/
$Students = "Select St.s_vn, St.s_nn, St.s_email, St.idStudent from Student AS St, Class AS CL
Where  CL.idClass = St.Class_idClass
and CL.c_n like '$Klassen'";

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
$Lehrernname = "Select t_nn from Teacher Where idTeacher like '$res3'";
$result4 = $con->query($Lehrernname);
while ($row = $result4->fetch_assoc()) {
    $res4= $row['t_nn'];

}
$Lehrervname = "Select t_vn from Teacher Where idTeacher like '$res3'";
$result5= $con->query($Lehrervname);
while ($row = $result5->fetch_assoc()) {
    $res5 = $row['t_vn'];

}










    /*$sql = "INSERT INTO Security (HAsh, NName, VName, email, Tid, Semester, Klasse, Lehrer)
VALUES ('Hallo ', 'Herr', 'Glaus', 'JAAAJJJ', '1','2','3','4')";*/
   /* if($db->exec($sql)){
        echo "Daten eintragen.<br />";
    } else {
        echo "Fehler!";
    }*/
    /*$db->close();*/
/* HIER Frage
$sql1 = "INSERT INTO Course(Teacher_idTeacher, Class_idClass,) Values (?,?,?)";
$kommando = $con->prepare($sql1);
$kommando->bind_param("ii", $res3, $res2);
$kommando->execute();

*/
$result = $con->query($Students);


//$result2 = $con->query($studentmail );
while ($row = $result->fetch_assoc()) {
    $res = $row['s_vn']." ".$row['s_nn']." ".$row['s_email']." ". $row['idStudent']." ".$Lehrer." ".$Semester." ".$Klassen." ".$timestamp;
echo $res;
    $hash = hash('sha256', $res);
    $sid = $row['idStudent'];
    $svn = $row['s_vn'];
    $snn = $row['s_nn'];
    $semail = $row['s_email'];

    try{

        $db = new SQLite3("/Users/timwidmer/Desktop/Security.db3");

    $sql = "INSERT INTO Security (HAsh, NName, VName, email, Tid, Semester, Klasse, StudentID, teacherVn, teacherNn)
VALUES ('$hash','$snn','$svn','$semail', '$res3', '$Semester','$res2','$sid','$res5','$res4')";
    //echo $sql;
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
/*
 $empfaenger="deine@email.de";  // den Empfänger festlegen, NICHT auslesen!
$betreff="Anmeldung";
$zahl=(array_sum($summe)*8888888888);  // hier hab ich keine ahnung was du hier machst...
$link="http://www.deine-domain.de/unterordner/" . $zahl . ".html"; // hier legst Du die Url fest und natürlich das Dateiformat
$message="Hallo $user,  \nIhr Bestätigungslink lautet: $link  \n Klicken Sie nun auf Ihre Bestätigungslink."; // den Text der eMail erstellen

mail($empfaenger,$betreff,$message,"From: $sender");  //verschicken der eMail

*/
    try{
    $db2 = new SQLite3("/Users/timwidmer/Desktop/Security.db3");
    $getfromDB ="Select ID, HAsh, NName, VName, email, Tid, Semester, Klasse, StudentID From Security WHERE Klasse Like $res2 AND Semester LIKE $Semester AND Tid LIKE $res3";
    $ergebniss = $db2->query($getfromDB);
    while($row = $ergebniss->fetchArray()){
        $email = ($row['email']);
        $sqloperation =  "--------- ". htmlspecialchars($row['ID']) ."  - ". htmlspecialchars($row['HAsh']).
            "   -  ". htmlspecialchars($row['NName']) ."  - ". htmlspecialchars($row['VName'])." -  ".
             htmlspecialchars($row['email']) ." -  ". htmlspecialchars($row['Tid'])." -  ".
            htmlspecialchars($row['Semester']) ."  - ". htmlspecialchars($row['Klasse'])." - ". htmlspecialchars($row['StudentID']);
echo "$sqloperation".'<br />'."\n";
$hashi = ($row['HAsh']);
$email = ($row['email']);

$subject = "Lehrer umfrage für $Lehrer ";
        //<a href="page2.php">Page 2</a>
        /*
         * Der RIChtige LInk ------------
         */
        //$link = "http://www.beneumfrage.ch/start.php?id = $hashe";
        //$_SESSION["HAsh"] = $hashi;
        $link = "http://localhost:8888/auswertung/html/start.php?id=$hashi";
       // $link = "start.php?id = $hashe";
        //$linkganz ="<a href=\"$link"."\">".$link."</a>";
        $linkganz ="<a href=\"$link"."\">".$link."</a>";

//"<a href=\"galery.php?galeryid=". $row['id'] ."\">". $row['gallerienamen'] ."</a>";
echo "//////LinkHier////////".$linkganz.'<br />'."\n";
//echo 'Das ist ein Text der ausgeben wird.<br />' ."\n";
$message = "Sehr geehrter Herr blabla bitte füllen sie diesen Link aus ";

//session.save_path = "/tmp"

// Mail Versenden
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



echo"<form action=\"Formularabsenden.php\">
                    <div class=\"col-sm\">
                        <button type=\"submit\" class=\"btn btn-danger\">zurück</button>
                    </div>
                </form>";
/*try{

$db = new SQLite3("/Users/timwidmer/Desktop/Security.db3");


 $sql = "INSERT INTO Security (HAsh, NName, VName, email, Tid, Semester, Klasse, Lehrer)
VALUES ('Hallo ', 'Herr', 'Glaus', 'JAAAJJJ', '1','2','3','4')";
 if($db->exec($sql)){
     echo "Daten eintragen.<br />";
 } else {
     echo "Fehler!";
 }
$db->close();
}catch ( Exception $ex ){
    echo "Fehler: " . $ex->getMessage();
}
*/
?>