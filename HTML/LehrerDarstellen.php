<?php
$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}
$request = mysqli_real_escape_string($con, $_POST["query"]);
$query="SELECT t_vn, t_nn FROM Teacher WHERE t_nn LIKE '%".$request."%'";
$result = mysqli_query($con, $query);

$data = array();
//if ($row=mysql_fetch_row($result))
if(mysqli_num_rows($result) > 0)

{
    echo "<table>";
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>",$data[] = $row["t_nn"]. " " .$row["t_vn"],"</td>";

      //  echo "<td>",$row->[""],"</td>";
        echo "</tr>";
        // $print =  $data;
        //echo json_encode($print);

        /*$heho = array_push($arr,$row['t_nn']);*/
        /*$data[] = $row["t_nn"]. " " .$row["t_vn"];*/
    }
    echo json_encode($data);
    echo "</table>";
}

/*$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}
$sql2 = "SELECT t_vn, t_nn FROM Teacher ";
$result2 = $con->query($sql2);
while($row1 = $result2->fetch_assoc()) {

    $print = ' <a class="dropdown-item" <option value="$reihe" selected="selected">' . $row1['t_vn'] . " " . $row1['t_nn'] . '</a> </option>';
    echo ("$print");

}
*/
?>
