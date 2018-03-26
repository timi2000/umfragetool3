<?php
$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}
$Nachname = $_POST["TeacherNName"];
$Vorname = $_POST["TeacherVName"];
$Email = $_POST["TeacherEmail"];
echo($Nachname. " ".$Vorname." ". $Email);


mysqli_query($con,"SELECT t_vn,t_nn,t_email FROM Teacher");
mysqli_query($con,"INSERT INTO Teacher (t_vn, t_nn, t_email ) 
Values ('$Vorname', '$Nachname', '$Email')");
//$lastid =  mysqli_insert_id($con);
mysqli_close($con);

/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 26.03.18
 * Time: 09:42
 */
?>