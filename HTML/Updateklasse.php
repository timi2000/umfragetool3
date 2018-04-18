<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Klassenerfassen</title>
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="../js/javaScripten.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    <script>
    function deleteStudent(id) {
    $.post("delete.php" , {sid:id} , function(data){
    $("#" + id).fadeOut('slow' , function(){$(this).remove();if(data)alert(data);});
    });

    }
    </script>

    <script>
        function deleteRow(r ) {
            var i = r.parentNode.parentNode.rowIndex - 1;
            document.getElementById("tabel3").deleteRow(i);
        }

    </script>
    <script>
        function deleteverything(){


        }
    </script>
    <script type="text/javascript">
        function displayResult()
        {
            var  table=document.getElementById("tabel3");
            //var n = countrows.toString();
            var row = table.insertRow(-1);
            var countrows = document.getElementById('tabel3').rows.length;
            var cell1=row.insertCell(0);
            var cell2=row.insertCell(1);
            var cell3=row.insertCell(2);
            var cell4=row.insertCell(3);
            var cell5=row.insertCell(4);
            var cell6=row.insertCell(5);
            cell1.innerHTML="<input type=\"hidden\" name=\"ClassID1[]\"  class=\"form-control\"  readonly>";
            cell2.innerHTML="<input type=\"hidden\" name=\"id1[]\"  class=\"form-control\"  readonly>";
            cell3.innerHTML="<input type=\"text\" name=\"Nachname1[]\" class=\"form-control\" placeholder='Nachname'> ";
            cell4.innerHTML="<input type=\"text\" name=\"Vorname1[]\" class=\"form-control\" placeholder='Vorname' >";
            cell5.innerHTML="<input type=\"email\" name=\"email1[]\"  class=\"form-control\" placeholder='Email' >";
            cell6.innerHTML="<button type=\"button\" name=\"delete\" class=\"btn btn-danger\" onclick=\"deleteRow(this)\">Aus Klasse entfernen</button>";
        }
    </script>
</head>
<body>
<header>
    <div class="HeaderBenedictSeite">
        <nav class="nav">
            <a class="nav-link Schrift"  href="benedictSeite.php">Lehrer Übersicht</a>

            <a class="nav-link Schrift" href="Formularabsenden.php">Formular absenden</a>
            <a class="nav-link Schrift" href="klasseerfassen.php">Klasse erfassen</a>
            <a class="nav-link activ Schrift" href="Klassenübersicht.php">Klassenübersicht</a>
        </nav>
    </div>
</header>
<section>
<?php
/**
 * Created by PhpStorm.
 * User: timwidmer
 * Date: 09.04.18
 * Time: 17:16
 */

$con = mysqli_connect("127.0.0.1","root","root", "mydb", "3306");
if (mysqli_connect_errno())
{
    echo "failed to conect to MySQL: ".mysqli_connect_error();
}
$Klassen = $_POST["KlassenName"];
$klassenid = "Select idClass from Class  Where c_n like '$Klassen'";

$result2 = $con->query($klassenid);

while ($row = $result2->fetch_assoc()) {
    $res2 = $row['idClass'];

}

$Students = "Select St.s_vn, St.s_nn, St.s_email, St.idStudent, St.Class_idClass from Student AS St, Class AS CL
Where  CL.idClass = St.Class_idClass
and CL.c_n like '$Klassen'";

$result= $con->query($Students);
$prints ="<html>
               <h1  style=\"text-align: center; margin: 0 auto; padding-top:3%; padding-bottom: 2%; \"> $Klassen</h1>
             </html>";
echo "$prints";

echo '<form name="form1" method="post" action="Updateklasse3.php">
<div Style="margin: 0 auto; width: 90%; padding-top: 2%; padding-bottom: 3%;" >
<table class="table table-striped">';

echo '<thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col"></th>
            <th scope="col">Nachname</th>
            <th scope="col">Vorname</th>
            <th scope="col">E-mail</th>
            <th scope="col"></th>
      
            
        </tr>
        </thead> <tbody id="tabel3">';
//$rows= $result->num_rows;
while($row =$result->fetch_assoc()){
    $svn = $row['s_vn'];
    $snn = $row['s_nn'];
    $semail = $row['s_email'];
    $StID = $row['idStudent'];
    $ClassID = $row['Class_idClass'];
    //$rows = $result->affected_rows;



   //$numofrows= print_r($rows);
    //echo $counting;


    $res = $row['s_vn']." ".$row['s_nn']." ".$row['s_email']. " ".$row['idStudent'];
//print out table contents and add id into an array and email into an array
    echo '
<tr id="' . $row['idStudent'] . '">
<th><input type="hidden" name="ClassID[]"  class="form-control" value='.$ClassID.' readonly> </th>
<th><input type="hidden" name="id[]"  class="form-control" value='.$StID.' readonly> </th>

<td><input type="text" name="Nachname[]" class="form-control" value="'.$snn.'"> </td>
<td><input type="text" name="Vorname[]" class="form-control" value="'.$svn.'"> </td>
<td><input type="email" name="email[]"  class="form-control"  value="'.$semail.'"> </td>
<td><button type="button" class="btn btn-danger" name="delete" onclick="deleteStudent('.$row['idStudent'].')">Aus Klasse entfernen</button></td>
</tr> ';


}
echo'
             </tbody>
            </table >
             <a href="Klassenübersicht.php "><button style="margin-right:2%;"type="button" class="btn btn-primary" >zurück</button></a>
       <button style="margin-right:2%;" type="button" class="btn btn-secundary " onclick="displayResult()">Neue Reihe hinzufügen </button>
          <button style="margin-right:2%;" type="submit" name="Submit" value="Submit" class="btn btn-danger "  >Änderung speicher</button>
       
</form>
   
</div>';







/*if(isset($_REQUEST['delete'])) {
    $sql_s = " DELETE FROM Student WHERE idStudent='" .r . "' AND vin='" . $_REQUEST['vin'] . "' ";
}*/
/*if($_POST["Submit"])*/

/*
//start a table
echo '<form name="form1" method="post" action="">
<table width="292" border="0" cellspacing="1" cellpadding="0">';

//start header of table
echo '<tr>
<th>&nbsp;</th>
<th>Name</th>
<th>Email</th>
</tr>';

//loop through all results
while($row =$ergebnis->fetch_object()){

//print out table contents and add id into an array and email into an array
    echo '<tr>
<td><input type="hidden" name="id[]" value='.$row->idStudent.' readonly></td>
<td>'.$row->name.'</td>
<td><input name="email[]" type="text" id="price" value="'.$row->email.'"></td>
</tr>';
}

//submit button
echo'<tr>
<td colspan="3" align="center"><input type="submit" name="Submit" value="Submit"></td>
</tr>
</table>
</form>';


// if form has been submitted, process it
if($_POST["Submit"])
{
    // get data from form
    $name = $_POST['name'];
    // loop through all array items
    foreach($_POST['id'] as $value)
    {
        // minus value by 1 since arrays start at 0
        $item = $value-1;
        //update table
        $sql1 = mysqli_query("UPDATE table SET email='$email[$item]' WHERE id='$value'") or die(mysqli_error());
    }

// redirect user
    $_SESSION['success'] = 'Updated';
    header("location:index.php");
}
*/
$con->close();

?>
</section>
</body>
</html>