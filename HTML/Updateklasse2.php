<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 11.04.18
 * Time: 08:57
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
try {
    if ($_POST["Submit"]) {
        $Nachname = $_POST['Nachname'];
        $Vorname = $_POST['Vorname'];
        $email = $_POST['email'];
        $id = $_POST['id'];
echo "try funktioniert";
        foreach ($id as $value) {
            echo "foreach funktioniert auch";
            //Unknown column 'id' in 'where clause'
            // minus value by 1 since arrays start at 0
            $item = $value ;
            echo $value;
            //update table
            // $sql="UPDATE $tbl_name SET name='$name', lastname='$lastname', email='$email' WHERE id='$id'";

            $sql = "UPDATE Student SET s_vn = '$Vorname[$item]',
      s_nn = '$Nachname[$item]',
      s_email = '$email[$item]',
      WHERE idStudent=$value";
 //Geht nichts
                      $execution = $con->query($sql);
// geht auch nicht
$con->close();
echo "daten wurden Eingetragen";
        }
    }
}
catch(Exception $ex){
    echo "Fehler: ". $ex->getMessage();
}
/*if( isset($_POST["Nachname"])&&
    isset($_POST["Vorname"])&&
    isset($_POST["email"])
    ) {

    $Nachname = $_POST['Nachname'];
    $Vorname = $_POST['Vorname'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    echo  " ".$Nachname[0]." ".$Vorname[0]." ".$email[0]." ".$id[0];
    $query = '';
    for($count = 0; $count<count($Nachname); $count++)
    {
        $Nachname_clean = mysqli_real_escape_string($con, $Nachname[$count]);
        $Vorname_clean = mysqli_real_escape_string($con, $Vorname[$count]);
        $email_clean = mysqli_real_escape_string($con, $email[$count]);
        $id_clean = mysqli_real_escape_string($con, $id[$count]);

        if($Nachname_clean != '' && $Vorname_clean != '' && $email_clean != ''  )
        {
           /* $query .= '
   INSERT INTO Student(s_vn, s_nn, s_email, Class_idClass)
   VALUES("'.$Vorname_clean.'", "'.$Nachname_clean.'", "'.$email_clean.'", "'.$id.'");
   ';*/
          /* $sql = "UPDATE Student SET
    s_vn = '$Vorname_clean',
    s_nn = '$Nachname_clean',
    s_email = '$email_clean',
    WHERE idStudent = '$id_clean'";
          /* $kommando = $con->prepare( $sql);
            $kommando->bind_param($kommando, "sssi", $Vorname, $Nachname, $email, $id);*/
     /*   }
    }
    if($sql != '')
    {
        if(mysqli_multi_query($con, $sql))
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
*/

/*if(isset($_POST["Submit"]) &&
    isset($_POST["Nachname"])&&
    isset($_POST["Vorname"])&&
    isset($_POST["email"]))
{
    var_dump($_POST);
    $sql = "UPDATE Student SET
    s_vn = ?,
    s_nn = ?,
    s_email = ?,
    WHERE idStudent = ?";

    $Nachname = $_POST['Nachname'];
    $Vorname = $_POST['Vorname'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    echo  " ".$Nachname[0]." ".$Vorname[0]." ".$email[0]." ".$id[0];
    $kommando = $con->prepare( $sql);
    $kommando->bind_param($kommando, "sssi", $Vorname, $Nachname, $email, $id);
    */
  /*  echo "Hoi tim";
    $Nachname = $_POST['Nachname'];
    echo  " ".$Nachname[0]." ";
    $Vorname = $_POST['Vorname'];
    echo  " ".$Vorname[0]." ";
    $email = $_POST['email'];
    echo " ".$email[0]." ";
    $id = $_POST['id'];
    echo " ".$id[0]." ";*/



    // loop through all array items
   /* foreach($_POST['id'] as $value)
    {
        //Unknown column 'id' in 'where clause'
        // minus value by 1 since arrays start at 0
        $item = $value;
        //update table

        $sqlvname = mysqli_query($con,"UPDATE Student SET s_vn = '$Vorname[$item]' WHERE idStudent LIKE '$value'");
        //$sqlvname = mysqli_query($con,"UPDATE Student SET s_vn = '$Vorname[$item]' WHERE idStudent = '$value'") or die(mysqli_error($con));
        /* $sqlnname = mysqli_query($con,"UPDATE Student SET s_nn='$Nachname[$item]' WHERE id='$value'") or die(mysqli_error($con));
         $sqlemail = mysqli_query($con,"UPDATE Student SET s_email='$email[$item]' WHERE id='$value'") or die(mysqli_error($con));*/
   // }




    // redirect user
    /*$_SESSION['success'] = 'Updated';
    header("location: Klassenübersicht.php");*/
    /* $_SESSION['success'] = 'Updated';
     header("location:Klassenübersicht.php");*/

?>