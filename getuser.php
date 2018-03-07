<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 10.01.18
 * Time: 09:04
 */



// phpinfo();


$con = mysqli_connect('localhost', 'root', 'root', 'mydb', '8889'); if (!$con) {
    die('Could not connect: ' . mysqli_error($con)); }
    echo "hallo sdkf";
   // echo "----> ".$con."/br";
/*mysqli_select_db($con, "ajax_demo");
$sql = "SELECT * FROM my_db.ajax_demo WHERE id = '" . $q . ";'"; // echo $sql."</br>";
$result = mysqli_query($con, $sql);
echo "<table border='1'>
<tr>
<th>Firstname</th> <th>Lastname</th> <th>Age</th> <th>Hometown</th> <th>Job</th>
</tr>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['FirstName'] . "</td>"; echo "<td>" . $row['LastName'] . "</td>"; echo "<td>" . $row['Age'] . "</td>";
    echo "<td>" . $row['Hometown'] . "</td>"; echo "<td>" . $row['Job'] . "</td>";
    echo "</tr>";
}*/
echo "</table>"; mysqli_close($con);
?>