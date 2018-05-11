<?php/*
$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}
$request = mysqli_real_escape_string($con, $_POST["query"]);
$query="SELECT t_vn, t_nn FROM Teacher WHERE t_nn LIKE '%".$request."%'";
$result = mysqli_query($con, $query);

$data = array();

if(mysqli_num_rows($result) > 0)

{
    echo "<table>";
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>",$data[] = $row["t_nn"]. " " .$row["t_vn"],"</td>";


        echo "</tr>";

    }
    echo json_encode($data);
    echo "</table>";
}
*/

?>
