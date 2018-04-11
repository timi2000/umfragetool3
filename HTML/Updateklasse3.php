<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 11.04.18
 * Time: 11:33
 */
$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}

$Nachname = $_POST['Nachname'];
$Vorname = $_POST['Vorname'];
$email = $_POST['email'];
$id = $_POST['id'];
$Classid = $_POST['ClassID'];

if(isset($_POST["Submit"])) {

    $query = '';

    for ($count = 0; $count < count($id); $count++) {
        echo  " ".$Nachname[0]." ".$Vorname[0]." ".$email[0]." ".$id[0];
        $Nachname_clean = mysqli_real_escape_string($con, $Nachname[$count]);
        $Vorname_clean = mysqli_real_escape_string($con, $Vorname[$count]);
        $email_clean = mysqli_real_escape_string($con, $email[$count]);
        $Classid_clean = mysqli_real_escape_string($con, $Classid[$count]);
        $count = $item-1;

     /*   $sql = "UPDATE MyGuests SET lastname='Doe' WHERE sid=2";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
*/
     if ($Nachname_clean != '' && $Vorname_clean != '' && $email_clean != '') {
              $query = " UPDATE Student SET s_vn = '$Vorname_clean[$item]'s, s_nn = '$Nachname_clean[$item]', s_email = '$email_clean[$item]', Class_idClass = '$Classid[$item]' WHERE idStudent = $id";}
    }
    if ($query != '') {
        if (mysqli_multi_query($con, $query)) {
            echo 'Item Data Inserted';
        } else {
            echo 'Error';
        }
    } else {
        echo 'All Fields are Required';
    }
}
/*while ($row = $result->fetch_assoc()) {
    $res = $row['s_vn']." ".$row['s_nn']." ".$row['s_email']. " ".$Lehrer." ".$Semester." ".$Klassen;

    $hash = hash('sha512', $res);

    $svn = $row['s_vn'];
    $snn = $row['s_nn'];
    $semail = $row['s_email'];

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
}*/
?>