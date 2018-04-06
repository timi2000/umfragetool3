<?php
var_dump($_POST);
//$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
$con = new MySQli("127.0.0.1", "root", "root", "mydb", "3306");
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 04.04.18
 * Time: 11:54
 */
$SNname = $_POST["Nachname"];
$SVname = $_POST['Vorname'];
$SEmail = $_POST["Email"];
$klasse = $_POST["KlassenNamen"];
$Semester = 1;
/*$SNAChname = $_POST["Nachnamerein"];*/
echo $klasse. "   ";
/*print_r($SNname);
print_r($SVname);
print_r($SEmail);*/



try{
    $sql = "INSERT INTO Class(c_n, Semester) VALUES ('$klasse', $Semester)";
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
}





/*
foreach ($SVname as $vorname) {
    print $vorname . "<br />";

    $putIn = "INSERT INTO Student ( s_vn, Class_idClass )
  VALUES ('$vorname', $id )";
     $con->query($putIn);
    echo "Vorname eintragen .<br />";
}

foreach ($SNname as $nachname) {
        print $nachname . "<br />";
        $testsdn  =
        $putIn = "INSERT INTO Student ( s_nn, Class_idClass )
  VALUES ('$nachname', $id )";
       $con->query($putIn);

        echo "nachname eintragen .<br />";
        }

foreach ($SEmail as $email) {
    print $email . "<br />";

    $putIn = "INSERT INTO Student ( s_email, Class_idClass )
  VALUES ('$email', $id )";
     $con->query($putIn);

    echo "email eintragen .<br />";
}

*/





/*$putIn = "INSERT INTO Student (s_nn, Class_idClass )
  VALUES ('$nachname', $id)";
//$con->query($putIn) ;
echo "Daten eintragen.<br />";
*/

 /*for ($i = 0; $i < count($SNname); $i++){
     $nachname = $SNname[$i];
    print $nachname . "<br/>". $con->query($putIn) ;
}*/
/*foreach ($SVname as $vorname ) {
    print $vorname . "<br />";
   /* $putIn2 = "INSERT INTO Student (s_vn, Class_idClass ) WHERE idStudent LIKE
  VALUES ('$vorname', $id)";
    $con->query($putIn2);
    echo "Daten eintragen.<br />";*/
//}
 /*$wee = "Super Timi ";
 foreach ($SNname as $nachname){
    print $nachname . "<br />";
    /* $putIn = "INSERT INTO Student (s_nn, Class_idClass )
  VALUES ('$nachname', $id)";
      $con->query($putIn) ;
     echo "Daten eintragen.<br />";*/

   /* $putIn = "INSERT INTO Student (s_vn, s_nn, Class_idClass )
  VALUES ('$vorname','$nachname', $id )";
     $con->query($putIn) ;
     echo "Daten eintragen.<br />";

}

/*foreach ($SVname as $vorname  ) {
    print $vorname . "<br />";

}
*/

/*foreach( $SVname as $key => $value){
    $string = $value.',';
}

echo $string;
*/

/*foreach ($SVname as $vorname ) {
    print $vorname . "<br />";
    /* $putIn2 = "INSERT INTO Student (s_vn, Class_idClass ) WHERE idStudent LIKE
   VALUES ('$vorname', $id)";
     $con->query($putIn2);
     echo "Daten eintragen.<br />";
}*/
//$StudentID = "Select  ";

/*foreach ($SVname as $vorname ){
    print $vorname . "<br />";
    $putIn2 = "INSERT INTO Student (s_vn, Class_idClass ) WHERE idStudent LIKE 
  VALUES ('$vorname', $id)";
    $con->query($putIn2) ;
    echo "Daten eintragen.<br />";
}*/
/*

foreach ($SEmail as $email ){
    print $email . "<br />";
}
*/



/*$putIn = "INSERT INTO Student (s_vn, Class_idClass )
  VALUES ('$vorname', $id)";
 $con->query($putIn) ;
    echo "Daten eintragen.<br />";

*/

/*try{
    $sql = "INSERT INTO Class(c_n, Semester) VALUES ('$klasse', $Semester)";
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

*/

//prepare statment
//Klasse wird in datenbank gespeichert und id wird geholt!!


 /*$putIn = "INSERT INTO Student (s_vn, s_nn, s_email, Class_idClass)
  VALUES ($SVname, $SNname, $SEmail, $id)";
if ($con->query($putIn)) {
    echo "Daten eintragen.<br />";
}*/
/*$stmt->bindParam(1, $name);

$stmt = $dbh->prepare("INSERT INTO REGISTRY (name, value) VALUES (?, ?)");*/


/*$sql  = "INSERT INTO Class(c_n) VALUES ('$klasse')";
$kommando_1 = mysqli_prepare($con, $sql);
$parodieren = mysqli_stmt_bind_param($kommando_1, "s", $klasse);
if(mysqli_stmt_execute($kommando_1)){
    $id = mysqli_insert_id($con);
    echo " Daten mit der ID $id eingetragen";
}
else {
    echo"  geht nicht!";
}
*/

//$sql = "INSERT INTO Class(c_n) VALUES ('$klasse')";
/*if (mysqli_query($con,$sql)){
    $id = mysqli_insert_id($con);
    echo " Daten mit der ID $id eingetragen";
}
else {
    echo"  geht nicht!";
}
*/




/*$putIn = "INSERT INTO Student (s_vn, s_nn, s_email, Class_idClass)
  VALUES ('$SVname', '$SNname', '$SEmail', $id)";
     if ($con->query($sql)) {
         echo "Daten eintragen.<br />";
     }*/



/*$query = "SELECT  FROM uploads";
if ($result = $con->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
return $data;
*/
//$result = $con->query($Students);  $result = $sql;

/*while ($row = $result->fetch_assoc()) {
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

  }
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
    //mysqli_close($con)
    ?>