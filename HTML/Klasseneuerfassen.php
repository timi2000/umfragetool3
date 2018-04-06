<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 26.03.18
 * Time: 10:42
 */

$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");

if(isset($_POST["item_nname"]))
{
    $SNname = $_POST["item_nname"];
    $SVname = $_POST["item_vname"];
    $SEmail = $_POST["item_email"];
    $klasse = $_POST["KlassenNAmen"];
    echo $klasse." ".$SNname. " " .$SVname." ". $SEmail;
    $sql = "INSERT INTO Class(c_n) VALUES ('$klasse')";
    if (mysqli_query($con,$sql)){
        $id = mysqli_insert_id($con);
        echo " Daten mit der ID $id eingetragen";
    }
    else {
        echo"  geht nicht!";
    }

    echo $sql;
    $query = '';
    for($count = 0; $count<count($SNname); $count++)
    {
        $item_nname_clean = mysqli_real_escape_string($con, $SNname[$count]);
        $item_vname_clean = mysqli_real_escape_string($con, $SVname[$count]);
        $item_item_email = mysqli_real_escape_string($con, $SEmail[$count]);
        $item_item_id = mysqli_real_escape_string($con, $id[$count]);
        if($item_nname_clean != '' && $item_vname_clean != '' && $item_item_email != '' && $item_item_id != '')
        {
            $query .= '
   INSERT INTO Student(s_vn, s_nn, s_email, Class_idClass) 
   VALUES("'.$item_nname_clean.'", "'.$item_vname_clean.'", "'.$item_item_email.'", "'.$item_item_id.'"); 
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
}














  /*  $SNname = $_POST["item_nname"];
    $SVname = $_POST["item_vname"];
    $SEmail = $_POST["item_email"];
    $klasse = $_POST["KlassenNAmen"];
    echo $klasse." ".$SNname. " " .$SVname." ". $SEmail;


    //Klasse wird in datenbank gespeichert und id wird geholt!!
     $sql = "INSERT INTO Class(c_n) VALUES ('$klasse')";
        if (mysqli_query($con,$sql)){
        $id = mysqli_insert_id($con);
        echo " Daten mit der ID $id eingetragen";
        }
        else {
             echo"  geht nicht!";
        }

echo $sql;

for($count = 0; $count<count($SNname); $count++){

 = mysqli_real_escape_string($con, $SNname[$count]);
    $SNname = mysqli_real_escape_string($con, $SVname[$count]);
    $item_email_clean = mysqli_real_escape_string($con, $item_email[$count]);

    if($item_nname_clean != '' && $item_vname_clean != '' && $item_email_clean != '' )
    {
        $SVname = mysqli_real_escape_string($con, $SVname [$count]);
        $SNname = mysqli_real_escape_string($con,  $SNname[$count]);
        $SEmail = mysqli_real_escape_string($con, $SEmail[$count]);
        $id = mysqli_real_escape_string($con, $id[$count]);
        $query .= '
   INSERT INTO Student(s_vn, s_nn, s_email, Class_idClass) 
   VALUES("'.$SVname.'", "'. $SNname.'", "'.$SEmail.'", "'.$id.'"); ';
    }
}

//$result = $con->query($Students);  $result = $sql;

while ($row = $result->fetch_assoc()) {
    /*$res = $row['s_vn'] . " " . $row['s_nn'] . " " . $row['s_email'] . " " . $Lehrer . " " . $Semester . " " . $Klassen;

    $hash = hash('sha512', $res);

    $svn = $row['s_vn'];
    $snn = $row['s_nn'];
    $semail = $row['s_email'];
*/
  /*  try {

        // $db = new SQLite3("/Users/timwidmer/Desktop/Security.db3");

        $sql = "INSERT INTO Student (s_vn, s_nn, s_email, Class_idClass)
VALUES ('$SVname', '$SNname', '$SEmail', $id)";
        echo $sql;
        if ($con->query($sql)) {
            echo "Daten eintragen.<br />";
        } else {
            echo "Fehler!";
        }
        echo $sql;
        $con->close();
    } catch (Exception $ex) {
        echo "Fehler: " . $ex->getMessage();
    }
    mysqli_close($con);

}*/
/*$item_nname = $_POST["item_nname"];
$item_vname = $_POST["item_vname"];
$item_email = $_POST["item_email"];*/
   // echo $sql;

    /*$klassenid = "Select idClass from Class Where c_n like '$klasse'";
    $ergebnisID = $con->query($klassenid);*/
   // echo "Das ISt Die Klassenid".'   '.$ergebnisID;
//$lastid =  mysqli_insert_id($con);
//mysqli_close($con);

/* $query = '';
for($count = 0; $count<count($item_nname); $count++)
{
    $item_nname_clean = mysqli_real_escape_string($con, $item_nname[$count]);
    $item_vname_clean = mysqli_real_escape_string($con, $item_vname[$count]);
    $item_email_clean = mysqli_real_escape_string($con, $item_email[$count]);

    if($item_nname_clean != '' && $item_vname_clean != '' && $item_email_clean != '' )
    {
        $query .= '
   INSERT INTO Student(s_vn, s_nn, s_email, Class_idClass) 
   VALUES("'.$item_vname_clean.'", "'. $item_nname_clean.'", "'.$item_email_clean.'", "'.$id.'"); ';
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
}*/

?>


