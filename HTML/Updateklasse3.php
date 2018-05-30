
<head>
    <meta charset="UTF-8">
    <title>Klassenerfassen</title>
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="../js/javaScripten.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
</head>

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
$Klassideinzeln = $_POST['Klassideinzeln'];
$Klassen = $_POST["Klassenname"];
$Nachname =$_POST['Nachname'];
$Vorname = $_POST['Vorname'];
$email = $_POST['email'];
$id = $_POST['id'];
$Classid = $_POST['ClassID'];

/*$NeuNachname = $_POST['Nachname1'];
$NeuVorname = $_POST['Vorname1'];
$NeuEmail = $_POST['email1'];*/


$sqlw = "UPDATE Class SET c_n = ? WHERE idClass = ?";
$kommando = $con->prepare($sqlw);
$kommando->bind_param("si", $Klassen, $Klassideinzeln);
$kommando->execute();

//$sql = "UPDATE Class SET c_n = '$Vorname_clean', WHERE idStudent = '$theId'";


if(isset($_POST["Submit"])) {

    $sql = '';
    for ($count = 0; $count<count($id); $count++) {
        //print_r($count);$Nachname[$count]
        $theId = ($id[$count]);

        $Nachname_clean = htmlentities(mysqli_real_escape_string($con, $Nachname[$count]));
        $Vorname_clean = htmlentities(mysqli_real_escape_string($con, $Vorname[$count]));
        $email_clean = htmlentities(mysqli_real_escape_string($con, $email[$count]));
        $Classid_clean = htmlentities(mysqli_real_escape_string($con, $Classid[$count]));

        if ($Nachname_clean != '' && $Vorname_clean != '' && $email_clean != '') {
            $sql = "UPDATE Student SET s_vn = ?, s_nn =?, s_email=?, Class_idClass = ? WHERE idStudent = ?";
            $kommando = $con->prepare($sql);
            $kommando->bind_param("sssii", $Vorname_clean, $Nachname_clean, $email_clean, $Classid_clean, $theId);
            $kommando->execute();
            // $sql = "UPDATE Student SET s_vn = '$Vorname_clean', s_nn ='$Nachname_clean', s_email='$email_clean', Class_idClass = '$Classid_clean'WHERE idStudent = '$theId'";
            // $execution = $con->query($sql);
        }
        //print_r($sql);
    }

}
if(isset($_POST["Nachname1"])&&
    isset($_POST["Vorname1"])&&
    isset($_POST["email1"])) {
    $NeuNachname = $_POST['Nachname1'];
    $NeuVorname =$_POST["Vorname1"];
    $NeuEmail=$_POST["email1"];
    $query = '';
    for ($count = 0; $count < count($NeuNachname); $count++) {

        $SNname_clean = htmlentities(mysqli_real_escape_string($con, $NeuNachname[$count]));
        $SVname_clean = htmlentities(mysqli_real_escape_string($con, $NeuVorname[$count]));
        $SEmail_clean = htmlentities(mysqli_real_escape_string($con, $NeuEmail[$count]));
        if ($SNname_clean != '' && $SVname_clean != '' && $SEmail_clean != '') {
            $query .= '
   INSERT INTO Student(s_vn, s_nn, s_email, Class_idClass) 
   VALUES("' . $SVname_clean . '", "' . $SNname_clean . '", "' . $SEmail_clean . '", "' . $Classid_clean . '"); 
   ';
        }
    }
    if ($query != '') {
        if (mysqli_multi_query($con, $query)) {
            echo 'Item Data Inserted';
        } else {
            $con->close();
        }
    }
}

/*else
{
    echo 'All Fields are Required';
}*/

/*if(isset($_POST["delet"])){
    $sql= "DELETE FROM Student WHERE idStudent= '$StID'";
}*/
echo"<form action=\"Klassenübersicht.php\">

                    <div class=\"col-sm\" Style='text-align: center; margin-top: 4%;'>
                        <button type=\"submit\" class=\"btn btn-primary\">zurück</button>
                    </div>
                   
                </form>";

?>

