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

   // $con->query("delete FROM Student where idStudent=".$_POST['sid']);
    $id=$_POST['sid'];
    $sql = "delete FROM Student where idStudent=(?)";
    $kommando = $con->prepare($sql);
    $kommando->bind_param("i", $id);
    $kommando->execute();
    $con->close();
  /*  $sql1 = "INSERT INTO Teacher(t_vn, t_nn, t_email) Values (?,?,?)";
    $kommando1 = $con->prepare($sql1);
    $kommando1->bind_param("sss", $Nachname, $Vorname, $Email);
    $kommando->execute();
    $con->close();*/

}else echo 'Not Deleted Error Occured';
?>