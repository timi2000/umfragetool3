<?php
$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}
/*$sql1 = "SELECT t_vn, t_nn FROM Teacher Where t_nn Like '%".$request."%'";
$result = $con->query($sql1);

$arr = Array();
while($row=mysqli_fetch_array($result))
{
    $heho = array_push($arr,$row['t_vn']. "  ".$row['t_nn']);

}
header('Content-Type: application/json');
echo json_encode($arr);


*/

$request = mysqli_real_escape_string($con, $_POST["query"]);
$query = "SELECT t_nn ,t_vn FROM Teacher WHERE t_nn LIKE '%".$request."%'";
//$query = "SELECT teachern FROM Teacher WHERE t_nn LIKE '%".$request."%'";
//$query1 =" SELECT idTeacher From Teacher ";
$result = mysqli_query($con, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        /*$heho = array_push($arr,$row['t_nn']);*/
        $data[] = $row["t_nn"]. " " .$row["t_vn"];
    }
    echo json_encode($data);
}

/*$con->close();*/

//reget
?>