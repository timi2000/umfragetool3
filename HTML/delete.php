<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 11.04.18
 * Time: 20:33
 */

if(isset($_REQUEST["sid"]))
{
    $con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
    if (mysqli_connect_errno())
    {
        echo "failed to conect to MySQL: ".mysqli_connect_error();
    }
// Löscht eine schüler aus einer klassen Liste Funktioniert mit jquery

    $id=$_POST['sid'];
    $sql = "delete FROM Student where idStudent=(?)";
    $kommando = $con->prepare($sql);
    $kommando->bind_param("i", $id);
    $kommando->execute();
    $con->close();


}else echo 'Not Deleted Error Occured';
?>