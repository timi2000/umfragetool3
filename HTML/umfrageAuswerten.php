<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 01.03.18
 * Time: 14:46
 */
$frage1 = $_POST["inlineRadioOptions1"];
$frage2 = $_POST["inlineRadioOptions2"];
$frage3 = $_POST["inlineRadioOptions3"];
$frage4 = $_POST["inlineRadioOptions4"];
$frage5 = $_POST["inlineRadioOptions5"];
$frage6 = $_POST["inlineRadioOptions6"];
$frage7 = $_POST["inlineRadioOptions7"];
$frage8 = $_POST["inlineRadioOptions8"];
$frage9 = $_POST["inlineRadioOptions9"];
$frage10 = $_POST["inlineRadioOptions10"];
$frage11 = $_POST["inlineRadioOptions11"];
$frage12 = $_POST["inlineRadioOptions12"];
$frage13 = $_POST["inlineRadioOptions13"];
$frage14 = $_POST["inlineRadioOptions14"];
$frage15 = $_POST["inlineRadioOptions15"];
$positves =  $_POST["positves"];
$verbesserungsvorschläge = $_POST["verbesserungsvorschläge"];
echo($frage1. " " .$frage2." " .$frage3. " "  .$frage4. " ".$frage5. " " .$frage6. " ".$frage7." ".$frage8." ".$frage9." ".
$frage10." ". $frage11." ". $frage12. " ". $frage13." ". $frage14. " ".$frage15. " ".$positves. " ".$verbesserungsvorschläge);

/*$Fragenzusammenfassen = $frage15; $frage1; $frage2; $frage3; $frage4; $frage5; $frage6; $frage7; $frage8; $frage9; $frage10;
$frage11; $frage12; $frage13; $frage14;*/

/*$sql = "
  INSERT INTO `Bewertung`
  ( 
  `idBewertung` , `FrageNR` , `FrageWert` 
  
  ) 
  VALUES
  (
'1','1','1'
  );
";*/
//$db_erg = mysqli_query($db_link, $sql)
//or die("Anfrage fehlgeschlagen: " . mysqli_error());
$pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');
$statement = $pdo->prepare("INSERT INTO Bewertung (idBewertung, FrageWert, FrageNR) VALUES (1,1,1)");

$statement->execute(array(1,1,1));
?>