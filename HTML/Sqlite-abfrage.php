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
$Semester = $_POST["Semester"];
$subjekt = "online umfrage";
$Studentnn = "Select s_nn  from Student Where idClass = Class_idClass and c_n like '$Klassen'";
$Studentvn = "Select s_vn  from Student Where idClass = Class_idClass and c_n like '$Klassen'";
$Studentemail = "Select s_email  from Student Where idClass = Class_idClass and c_n like '$Klassen'";


$Students = "Select St.s_vn, St.s_nn, St.s_email from Student AS St, Class AS CL
Where  CL.idClass = St.Class_idClass
and CL.c_n like '$Klassen'";


$result = $con->query($Students);
//$result2 = $con->query($studentmail );
while ($row = $result->fetch_assoc()) {
    $res = $row['s_vn']." ".$row['s_nn']." ".$row['s_email']." ".$Lehrer." ".$Semester." ".$Klassen;
    $hash = hash('sha512', $res);
    echo $row['s_vn']." ".$row['s_nn']." ".$row['s_email']. " ". $hash."<br>";
    // mail( $row['s_email'], $subject ,  $message);
    echo mail($row['s_email'],"Hallo" ,"adasd","parameters");

}

$con->close();

//try{

    /* $sql = "CREATE TABLE Security (
        ID INTEGER PRIMARY KEY,
      HAsh VARCHAR(100),
      NName  VARCHAR (100),
      VName VARCHAR (100),
      email  VARCHAR (100),
      Tid INTEGER,
      Semester INTEGER,
      Klasse INTEGER,
      Lehrer INTEGER 
    )";
 if ($db->exec($sql)) {
     echo "Tabelle Angelegt.<br />";

 } else {
     echo "Fehler!";
 }*/
 $sql = "INSERT INTO Security (HAsh, NName, VName, email, Tid, Semester, Klasse, Lehrer)
VALUES ($hash, $Studentnn, $Studentvn , $Studentemail , '1','2','3','4')";
 if($db->exec($sql)){
     echo "Daten eintragen.<br />";
 } else {
     echo "Fehler!";
 }
 /*$db->close();
}catch ( Exception $ex ){
    echo "Fehler: " . $ex->getMessage();
}*/

?>