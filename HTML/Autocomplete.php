<?php

$con =  mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}

$sql = "SELECT c_n FROM Class WHERE c_n LIKE ?";
$kommando = $con->prepare($sql);
$query = "%" . $_POST["query"] . "%";
$kommando->bind_param("s", $query);
$kommando->execute();

$result = $kommando->get_result();
while($row = $result->fetch_assoc())
{
    $data[] = $row["c_n"];


}
echo json_encode($data);

$con->close();
?>