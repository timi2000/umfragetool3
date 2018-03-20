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
$result = $con->query($Students);

    while ($row = $result->fetch_assoc()) {
        $res = $row['s_vn']." ".$row['s_nn']." ".$row['s_email']." ".$Lehrer." ".$Semester." ".$Klassen;
        $hash = hash('sha512', $res);
        echo $row['s_vn']." ".$row['s_nn']." ".$row['s_email']. " ". $hash."<br>";
       // mail( $row['s_email'], $subject ,  $message);
    }

/*$absenden = $con->query($Students);
while ($row = $result->fetch_assoc()) {
    $res = $row['s_vn']." ".$row['s_nn']." ".$row['s_email']." ".$Lehrer." ".$Semester." ".$Klassen;
    $hash = hash('sha512', $res);
    echo $row['s_vn']." ".$row['s_nn']." ".$row['s_email']. " ". $hash."<br>";
    // mail( $row['s_email'], $subject ,  $message);
}
*/
echo($Klassen." ".$Lehrer." ".$Semester);

/*$query = "Select s_vn, s_nn s_email from Teacher as T, Course as C, Class as CL, Student AS St WHERE
T.idTeacher = C.Teacher_idTeacher and C.Class_idClass = CL.idClass and CL.idClass = St.Class_idClass  ";
echo $query;*/

//mail ( $row['s_email'], $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )

/*mail(s_email );*/
/**/

/*$empfaenger = $row['s_email'];
$betreff = "Die Mail-Funktion";
$from = "From: Nils Reimers <absender@domain.de>\n";
$from .= "Reply-To: antwort@domain.de\n";
$from .= "Content-Type: text/html\n";
$text = "Hier lernt Ihr, wie man mit <b>PHP</b> Mails
verschickt";


mail($empfaenger, $betreff, $text, $from);
*/
$con->close();




?>