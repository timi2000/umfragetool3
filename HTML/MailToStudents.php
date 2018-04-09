<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 28.03.18
 * Time: 09:31
 */
include 'Sqlite-abfrage.php';

while ($row = $result->fetch_assoc()) {
    $res = $row['s_vn']." ".$row['s_nn']." ".$row['s_email']. " ".$Lehrer." ".$Semester." ".$Klassen;
}
?>