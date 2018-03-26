<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 26.03.18
 * Time: 15:15
 */
try{
    $db=new SQLite3("Security.db3");
    $sql = "CREATE TABLE Security (
        ID INTEGER PRIMARY KEY,
      HAsh /*TEXT*/ VARCHAR(100)/*VARCHAR 100*/,
      /*NName TEXT /*VARCHAR 100*/,
      VName TEXT /*VARCHAR 100*/,
      email TEXT /*VARCHAR 100*/,
      Tid INTEGER /*VARCHAR 100*/,
      Semester INTEGER /*VARCHAR 100*/,
      Klasse INTEGER /*VARCHAR 100*/,
      Lehrer INTEGER /*VARCHAR 100*/*/
    )";
 if ($db->exec($sql)) {
     echo "Tabelle Angelegt.<br />";

 } else {
     echo "Fehler!";
 }
 $sql = "INSERT INTO Security (HAsh) VALUES ('Wert1')";
 if($db->exec($sql)){
     echo "Daten eintragen.<br />";
 } else {
     echo "Fehler!";
 }
 $db->close();
}catch ( Exception $ex ){
    echo "Fehler: " . $ex->getMessage();
}

?>