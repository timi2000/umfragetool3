<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 19.03.18
 * Time: 10:10
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
$message = "hallo Tim ";
$Students = "Select St.s_vn, St.s_nn, St.s_email from Student AS St, Class AS CL
Where  CL.idClass = St.Class_idClass
and CL.c_n like '$Klassen'";

/*$studentmail = "Select s_email from Student, Class Where  idClass = Class_idClass
and c_n like '$Klassen'";*/


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

/*$sql ='Insert Into Security(HAsh, NName, VName, email, Tid, Semester,Klasse, Lehrer)' .
    'VALUES("hoealskdf", "tim", "Widmer", "tim@email.ch",1,1,1,1);';
//$datenbank->queryExec($sql);
if (!file_exists($datenbank)) {
    echo "dieses File Existiert";

}
else {
    echo "ein fehler ist aufgetreten";
    // Verbindung
    $db = new PDO('sqlite:' . $datenbank);
}
*/
/*if (file_exists($db)) {
    //$db = new PDO('sqlite:' . $datenbank);
    echo"hallo Tim";
    $db = new PDO('sqlite: main.Security' . $db);
    $sql = 'INSERT INTO Security( HAsh , NName, VName, email,  Tid, Semester, Klasse, Lehrer) '
        . 'VALUES(:Hajsd,:completed_date,:completed,:project_id)';
    //$result = sqlite_query($db, "SELECT * FROM Security");
   /* $db->exec("CREATE TABLE nachrichten(
  id INTEGER PRIMARY KEY,
  titel CHAR(255),
  autor CHAR(255),
  nachricht TEXT,
  datum DATE)");*/
//}


/*if (!file_exists($datenbank)) {
    $db = new PDO('sqlite:' . $datenbank);
    $db->exec("CREATE TABLE nachrichten( 
  id INTEGER PRIMARY KEY, 
  titel CHAR(255), 
  autor CHAR(255), 
  nachricht TEXT, 
  datum DATE)");
}
else {
    // Verbindung
    $db = new PDO('sqlite:' . $datenbank);
}

// Schreibrechte überprüfen
if (!is_writable($datenbank)) {
    // Schreibrechte setzen
    chmod($datenbank, 0777);
}*/

/*
 <?php
$pdo = new PDO(
    'sqlite::memory:',
    null,
    null,
    array(PDO::ATTR_PERSISTENT => true)
);
?>
 */

/*absolute Pfad
/Desktop/Security.db3
../Security.db3*/
/*/Users/timwidmer/Desktop/Security.db3
Security.db3*/


/*$db = sqlite_open("/Desktop/Security.db3");
    if (!file_exists($db)) {
   $db = new PDO('sqlite:' . $db);
    $db->exec("INSERT INTO Security (
  HAsh , NName, VName, email,  Tid, Semester, Klasse, Lehrer)
VALUES ( 'hashskef','sim','tim','tim@email.ch',1,1,1,1);");
        $result = sqlite_query($db, "SELECT * FROM Security");

        while($line = sqlite_fetch_array($result))
        {
            echo("Vorname :" . $line['HAsh'] . "<br>");

     }
}*/


/*$db = sqlite_open("Security.db3");


sqlite_close($db);*/


/*$datenbank = "/Desktop/Security.db3";

// Datenbank-Datei erstellen
if (!file_exists($datenbank)) {
   $db = new PDO('sqlite:' . $datenbank);
    $db->exec("INSERT INTO Security (
  HAsh , NName, VName, email,  Tid, Semester, Klasse, Lehrer)
VALUES ( 'hash','sim','tim','tim@email.ch',1,1,1,1);");
}*/








   /*$pdo = new PDO (
    'sqlite::memory:',
    null,
    null,
    array(PDO::ATTR_PERSISTENT => true)
);



  /*  echo "juhu";

else {
    echo "NEEEINN";
    // Verbindung
    $db = new PDO('sqlite:' . $datenbank);
}
if (!is_writable($datenbank)) {
    // Schreibrechte setzen
    echo " de tim isch super coool ";
    ///chmod($datenbank, 0777);
}
// Schreibrechte überprüfen
/*if (!is_writable($datenbank)) {
    // Schreibrechte setzen
    chmod($datenbank, 0777);
}*/





/*$pdo = new PDO (
    'sqlite::memory:',
    null,
    null,
    array(PDO::ATTR_PERSISTENT => true)
);

$colour = 'red';
$colour1 = 'green';

$insert= $pdo -> prepare("INSERT INTO Security 
         ( `HAsh`, `NName`) 
  VALUES ( :hash, :ho)");

$insert->bindValue(':hash', $colour, PDO::PARAM_STR);
$insert->bindValue(':ho', $colour1, PDO::PARAM_STR);

$insert->execute();
*/
//    /Users/timwidmer/Desktop/Security.db3



?>






