<?php
$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}
/*$sql1 = "SELECT c_n FROM Class";
$result = $con->query($sql1);

$arr = Array();
while($row=mysqli_fetch_array($result))
{
    $heho = array_push($arr,$row['c_n']);
    //echo ("$heho");
}
header('Content-Type: application/json');
echo json_encode($arr);

$con->close();*/
$request = mysqli_real_escape_string($con, $_POST["query"]);
$query = "SELECT c_n FROM Class WHERE c_n LIKE '%".$request."%'";
//$query = "SELECT teachern FROM Teacher WHERE t_nn LIKE '%".$request."%'";
//$query1 =" SELECT idTeacher From Teacher ";
$result = mysqli_query($con, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        /*$heho = array_push($arr,$row['t_nn']);*/
        $data[] = $row["c_n"];
    }
    echo json_encode($data);
}

?>