<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 13.03.18
 * Time: 16:21
 */
//echo("halloTIM ");
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
/*$sql = "SELECT s_vn FROM Student WHERE Class_idClass = 1";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "   " . $row["s_vn"] ."<br>";
    }
} else {
    echo "0 results";
}
*/


/*$sql1 = "SELECT s_vn FROM Student WHERE Class_idClass = 1";
$result = $con->query($sql1);*/
/*$dname_list = array();

while($row = mysqli_fetch_array($result1))
    {
        $dname_list[] = $row['c_n']. "<br>";
    }
    echo json_encode($dname_list);

*/

?>