<?php
$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}
$request = mysqli_real_escape_string($con, $_POST["query"]);
$query = "SELECT c_n FROM Teacher WHERE t_nn LIKE '%".$request."%'";
//$query = "SELECT teachern FROM Teacher WHERE t_nn LIKE '%".$request."%'";
//$query1 =" SELECT idTeacher From Teacher ";
$result = mysqli_query($con, $query);

$data = array();


if(mysqli_num_rows($result) > 0)
    echo "<table border=\"1\">\n";
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo"<tr>";
        /*$heho = array_push($arr,$row['t_nn']);*/
    $data[] = $row["t_nn"]. " " .$row["t_vn"];
         echo"</tr>\n";
    }
    echo json_encode($data);
    echo "</table>\n";
}

/*$con->close();*/

?>