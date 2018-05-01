<?php
$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}
$request = mysqli_real_escape_string($con, $_POST["query"]);
$query = "SELECT t_nn ,t_vn FROM Teacher WHERE t_nn LIKE '%".$request."%'";
$result = mysqli_query($con, $query);
$data = array();

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row["t_nn"]. " " .$row["t_vn"];
    }
    echo json_encode($data);
}
?>