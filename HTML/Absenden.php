<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 13.03.18
 * Time: 16:21
 */

$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}

$sql1 = "SELECT c_n FROM Class";
$result1 = $con->query($sql1);
echo '<div class="dropdown-menu"><select name="Klassen"> ';


while($row = $result1->fetch_assoc()) {
   $print =  '<option value="'.$row['c_n'].'">'.$row['c_n'].'</option>
';
   echo ("$print");
}
$con->close();

echo '</select></div>';


?>