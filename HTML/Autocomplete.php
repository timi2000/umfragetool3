<?php
$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}

$request = mysqli_real_escape_string($con, $_POST["query"]);
$query = "SELECT c_n FROM Class WHERE c_n LIKE '%".$request."%'";

$result = mysqli_query($con, $query);
$data = array();

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row["c_n"];
    }
    echo json_encode($data);
}

/*$request = mysqli_real_escape_string($con, $_POST["query"]);

try{
    $query = "SELECT c_n FROM Class WHERE c_n LIKE (?)";
    $kommando = $con->prepare($query);
    $kommando->bind_param("s", $request);
    $data = array();
    if(mysqli_num_rows($kommando) > 0)
    {
        while($row = mysqli_fetch_assoc($kommando))
        {
            $data[] = $row["c_n"];
        }
        echo json_encode($data);
    }

    //$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
    //$sql = "INSERT INTO Teacher(t_vn, t_nn, t_email) Values (?,?,?)";
    //$kommando->bind_param("sss", $Vorname, $Nachname, $Email);
    $kommando->execute();
    $con->close();
    echo "Daten wurden erfolgreich eingetragen";
    echo'<h1>Lehrer Wurde Erfasst</h1>
    <a href="neuerLehrer.html"><button style="margin-right:2%;"type="button" class="btn btn-primary" >zurück</button></a>';

}
catch(Exception $ex){
    echo"Fehler: ". $ex->getMessage();
}*/

?>