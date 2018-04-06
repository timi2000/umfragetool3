<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 26.03.18
 * Time: 15:15
 */
$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}

$Klassen = $_POST["Klassen"];

$Lehrer = $_POST["Lehrer"];
$lehrerexplodiert  = explode(" ", $Lehrer);
$vn = $lehrerexplodiert[ 1 ];
$nn = $lehrerexplodiert[ 0 ];
$Semester = $_POST["Semester"];
$subjekt = "online umfrage";
$Studentnn = "Select s_nn  from Student Where idClass = Class_idClass and c_n like '$Klassen'";
$Studentvn = "Select s_vn  from Student Where idClass = Class_idClass and c_n like '$Klassen'";
$Studentemail = "Select s_email  from Student Where idClass = Class_idClass and c_n like '$Klassen'";
$Students = "Select St.s_vn, St.s_nn, St.s_email from Student AS St, Class AS CL
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








    /*$sql = "INSERT INTO Security (HAsh, NName, VName, email, Tid, Semester, Klasse, Lehrer)
VALUES ('Hallo ', 'Herr', 'Glaus', 'JAAAJJJ', '1','2','3','4')";*/
   /* if($db->exec($sql)){
        echo "Daten eintragen.<br />";
    } else {
        echo "Fehler!";
    }*/
    /*$db->close();*/



$result = $con->query($Students);


//$result2 = $con->query($studentmail );
while ($row = $result->fetch_assoc()) {
    $res = $row['s_vn']." ".$row['s_nn']." ".$row['s_email']. " ".$Lehrer." ".$Semester." ".$Klassen;

    $hash = hash('sha512', $res);
    //echo $row['s_vn']." ".$row['s_nn']." ".$row['s_email']." ". $hash."<br>";
    // mail( $row['s_email'], $subject ,  $message);
   // echo mail($row['s_email'],"Hallo" ,"adasd","parameters");
    $svn = $row['s_vn'];
    $snn = $row['s_nn'];
    $semail = $row['s_email'];
    //$Tid= $row[idTeacher];
    try{

        $db = new SQLite3("/Users/timwidmer/Desktop/Security.db3");

    $sql = "INSERT INTO Security (HAsh, NName, VName, email, Tid, Semester, Klasse)
VALUES ('$hash','$snn','$svn','$semail', '$res3', '$Semester','$res2')";
    echo $sql;
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


$con->close();

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