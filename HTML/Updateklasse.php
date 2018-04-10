<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 09.04.18
 * Time: 17:16
 */
var_dump($_POST);
$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}
$SNname = $_POST["Nachname"];
$SVname = $_POST["Vorname"];
$SEmail = $_POST["Email"];
$klasse = $_POST["KlassenNamen"];

//$idStudent = $_POST["idStudent"];

//$klassenid = "Select idClass from Class  Where c_n like '$Klassen'";

/*$SNAChname = $_POST["Nachnamerein"];*/
echo $klasse. " ".$SEmail[1];
/*
try{
    $sql = "INSERT INTO Class(c_n, Semester) VALUES (?, ?)";
    $kommando = $con->prepare($sql);
    $kommando->bind_param("si", $klasse, $Semester);
    $kommando->execute();
    //$id = mysqli_insert_id($con);¨
    $id = $con->insert_id;
    echo " Daten mit der ID $id eingetragen.<br />";
//$con->close();
}
catch(Exception $ex){
    echo "Fehler : " .$ex->getMessage();
}



if(isset($_POST["Nachname"]))
{
    $SNname = $_POST["Nachname"];
    $SVname = $_POST['Vorname'];
    $SEmail = $_POST["Email"];

    $query = '';
    for($count = 0; $count<count($SNname); $count++)
    {
        $SNname_clean = mysqli_real_escape_string($con, $SNname[$count]);
        $SVname_clean = mysqli_real_escape_string($con, $SVname[$count]);
        $SEmail_clean = mysqli_real_escape_string($con, $SEmail[$count]);

        if($SNname_clean != '' && $SVname_clean != '' && $SEmail_clean != '' )
        {
            $query .= '
   INSERT INTO Student(s_vn, s_nn, s_email, Class_idClass) 
   VALUES("'.$SVname_clean.'", "'.$SNname_clean.'", "'.$SEmail_clean.'", "'.$id.'"); 
   ';
        }
    }
    if($query != '')
    {
        if(mysqli_multi_query($con, $query))
        {
            echo 'Item Data Inserted';
        }
        else
        {
            echo 'Error';
        }
    }
    else
    {
        echo 'All Fields are Required';
    }
}*/
?>