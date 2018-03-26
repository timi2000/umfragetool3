<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 22.03.18
 * Time: 09:48
 *
 *
 *
 */
// Pfad zur Datenbank
/*$datenbank= ("/Users/timwidmer/Desktop/Security.db3");

// Datenbank-Datei erstellen
if (!file_exists($datenbank)) {
    $db = new PDO('sqlite:' . $datenbank);
    echo "HAllO TIm";

}
else {
    // Verbindung
    $db = new PDO('sqlite:' . $datenbank);
    echo "TIm ISt Coooool";
}

// Schreibrechte überprüfen
if (!is_writable($datenbank)) {
    // Schreibrechte setzen
    chmod($datenbank, 0777);
}

if (is_readable('/Users/timwidmer/Desktop/Security.db3')) {
    echo 'File is Readable';
   // exit();
}
*/
try{
    $db=new SQLite3("/Users/timwidmer/Desktop/Security.db3");
    echo "Verbindungsaufbau erfolgreich.";
    $db->close();
} catch (Exception $ex){
    echo "fehler: " .  $ex->getMessage();
}

?>