


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
$Nachname = $_POST['Nachname'];
$Vorname = $_POST['Vorname'];
$email = $_POST['email'];
$id = $_POST['id'];
$Classid = $_POST['ClassID'];
$NeuNachname = $_POST['Nachname1'];
$NeuVorname = $_POST['Vorname1'];
$NeuEmail = $_POST['email1'];
//print_r ($NeuNachname." ".$NeuVorname." ".$NeuEmail);
if(isset($_POST["Submit"])) {
    //print_r ($id);
    $sql = '';
    for ($count = 0; $count<count($id); $count++) {
        //print_r($count);$Nachname[$count]
        $theId = ($id[$count]);
        print_r ($theId."   ");
        print_r ($Nachname[$count]."   ");
        $Nachname_clean = mysqli_real_escape_string($con, $Nachname[$count]);
        $Vorname_clean = mysqli_real_escape_string($con, $Vorname[$count]);
        $email_clean = mysqli_real_escape_string($con, $email[$count]);
        $Classid_clean = mysqli_real_escape_string($con, $Classid[$count]);
        print_r($Nachname_clean." ");
        print_r($Vorname_clean." ");
        print_r($email_clean." ");
        print_r($Classid_clean." ");
        if ($Nachname_clean != '' && $Vorname_clean != '' && $email_clean != '') {
                 $sql = "UPDATE Student SET s_vn = '$Vorname_clean', s_nn ='$Nachname_clean', s_email='$email_clean', Class_idClass = '$Classid_clean'WHERE idStudent = '$theId'";
            $execution = $con->query($sql);
        }
        print_r($sql);
       }
        /*if ($sql != '') {
            if ($execution = $con->query($sql)) {
                echo 'Item Data Inserted';
            } else {
                echo 'Error';
            }
        } else {
            echo 'All Fields are Required';
        }*/
    }
if(isset($_POST["Nachname1"])&&
    isset($_POST["Vorname1"])&&
    isset($_POST["email1"])){
    $query = '';
    for($count = 0; $count<count($NeuNachname); $count++)
    {
        /*print_r($NeuNachname);
        print_r($SNname_clean);*/
        $SNname_clean = mysqli_real_escape_string($con, $NeuNachname[$count]);
        $SVname_clean = mysqli_real_escape_string($con, $NeuVorname[$count]);
        $SEmail_clean = mysqli_real_escape_string($con, $NeuEmail[$count]);
        if($SNname_clean != '' && $SVname_clean != '' && $SEmail_clean != '' )
        {
            $query .= '
   INSERT INTO Student(s_vn, s_nn, s_email, Class_idClass) 
   VALUES("'.$SVname_clean.'", "'.$SNname_clean.'", "'.$SEmail_clean.'", "'.$Classid_clean.'"); 
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
if(isset($_POST["delet"])){
    $sql= "DELETE FROM Student WHERE idStudent= '$StID'";
}
echo"<form action=\"Klassenübersicht.php\">
                    <div class=\"col-sm\">
                        <button type=\"submit\" class=\"btn btn-primary\">zurück</button>
                    </div>
                </form>";
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
