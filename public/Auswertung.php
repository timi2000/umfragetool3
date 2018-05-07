<?php
session_start();
//var_dump($_SESSION);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Auswertung</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/AuswertungCss.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="../js/javaScripten.js"></script>
    <script src="scripts.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="../js/javaScripten.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    <script>
    </script>


</head>

<header>
    <div class="container  hdiv">
        <div class="row">
            <div class="col-sm" style="margin: 0 auto; padding:0;">
                <h3 id="h31">Name:<?php echo " ".htmlspecialchars($_SESSION['VName'])." ".htmlspecialchars($_SESSION['NName']);
                    ?></h3>
            </div>
            <div class="col-sm" style="margin: 0 auto; padding:0;">
                <h3 id="h32">Semester:<?php echo" ".htmlspecialchars($_SESSION['Semester']) ?>
                </h3>
            </div>
            <div class="col-sm" style="margin: 0 auto; padding:0;">
                <h3 id="h33">Name des Lehrer:<?php echo" ".htmlspecialchars($_SESSION['teacherVn'])." ".htmlentities(htmlspecialchars($_SESSION['teacherNn']));?></h3>
            </div>
        </div>
    </div>
</header>
<body>
<?php
/*htmlentities(htmlspecialchars($_SESSION['ID']));
htmlentities(htmlspecialchars($_SESSION['HAsh']));
htmlentities(htmlspecialchars($_SESSION['NName']));
htmlentities(htmlspecialchars($_SESSION['VName']));
htmlentities(htmlspecialchars($_SESSION['email']));
htmlentities(htmlspecialchars($_SESSION['Tid']));
htmlentities(htmlspecialchars($_SESSION['Semester']));
htmlentities(htmlspecialchars($_SESSION['Klasse']));
htmlentities(htmlspecialchars($_SESSION['StudentID']));
htmlentities(htmlspecialchars($_SESSION['teacherVn']));
htmlentities(htmlspecialchars($_SESSION['teacherNn']));*/
?>
<section>

    <?php
    $Hashi=htmlentities(htmlspecialchars($_SESSION['HAsh']));
    $link = "umfrageAuswerten.php?id=$Hashi";

    ?>
    <div class="tabelle" >
        <form name="bmi" action="umfrageAuswerten.php" method="post">


            <div class="fragen">
                <table class="table table-bordered">
                    <thead >
                    <tr>
                        <th scope="col">NR</th>
                        <th scope="col">Fragen</th>
                        <th scope="col"><img id="img1"  src="../img/Happy2.PNG"></th>
                        <th scope="col"><img id="img2"   src="../img/Happy.PNG"></th>
                        <th scope="col"><img  id="img3"  src="../img/Sad.PNG"></th>
                        <th scope="col"><img  id="img4"  src="../img/Sad2.PNG"> </th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Setzt die Lehrperson das Reglement konsequent um?</td>

                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input  class="form-check-input" type="radio" name="group1" id="inlineRadio11" value="0" checked="checked">
                                </label>
                            </div>

                        </td>
                        <td>  <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group1" id="inlineRadio12" value="1">
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group1" id="inlineRadio13" value="2" >
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group1" id="inlineRadio14" value="3" >
                                </label>
                            </div></td>

                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Steht die Lehrperson positiv zur Bénédict-Schule?</td>

                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group2" id="inlineRadio21" value="0" checked="checked">
                                </label>
                            </div>

                        </td>
                        <td>  <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group2" id="inlineRadio22" value="1">
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group2" id="inlineRadio23" value="2" >
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group2" id="inlineRadio24" value="3" >
                                </label>
                            </div></td>

                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td> Bereitet sich die Lehrperson auf die Lektionen vor?</td>

                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group3" id="inlineRadio31" value="0" checked="checked">
                                </label>
                            </div>

                        </td>
                        <td>  <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group3" id="inlineRadio32" value="1">
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group3" id="inlineRadio33" value="2" >
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group3" id="inlineRadio34" value="3" >
                                </label>
                            </div></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td> Informiert die Lehrperson über den Unterrichtsablauf(Ablauf, Lernziele, Zwischenprüfungen, Hausaufgaben)?</td>

                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group4" id="inlineRadio41" value="0" checked="checked">
                                </label>
                            </div>

                        </td>
                        <td>  <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group4" id="inlineRadio42" value="1">
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group4" id="inlineRadio43" value="2" >
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group4" id="inlineRadio44" value="3" >
                                </label>
                            </div></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Hat die Lehrperson ein Schrittweisses Vorgehen? </td>

                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group5" id="inlineRadio51" value="0" checked="checked">
                                </label>
                            </div>

                        </td>
                        <td>  <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group5" id="inlineRadio52" value="1">
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group5" id="inlineRadio53" value="2" >
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group5" id="inlineRadio54" value="3" >
                                </label>
                            </div></td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td> Visualisiert die Lehrperson abwechslungsreich und spannend? </td>

                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group6" id="inlineRadio61" value="0" checked="checked">
                                </label>
                            </div>

                        </td>
                        <td>  <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group6" id="inlineRadio62" value="1">
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group6" id="inlineRadio63" value="2" >
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group6" id="inlineRadio64" value="3" >
                                </label>
                            </div></td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td> Unterrichtet die Lehrperson motiviert?</td>

                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group7" id="inlineRadio71" value="0" checked="checked">
                                </label>
                            </div>

                        </td>
                        <td>  <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group7" id="inlineRadio72" value="1">
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group7" id="inlineRadio73" value="2" >
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group7" id="inlineRadio74" value="3" >
                                </label>
                            </div></td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td> Bringt die Lehrperson Praxisbeispiele?</td>

                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group8" id="inlineRadio81" value="0" checked="checked">
                                </label>
                            </div>

                        </td>
                        <td>  <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group8" id="inlineRadio82" value="1">
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group8" id="inlineRadio83" value="2" >
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group8" id="inlineRadio84" value="3" >
                                </label>
                            </div></td>
                    </tr>
                    <tr>
                        <th scope="row" style="background-color: transparent;">9</th>
                        <td> Vermittelt die Lehrperson den Stoff klar und deutlich?</td>

                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group9" id="inlineRadio91" value="0" checked="checked">
                                </label>
                            </div>

                        </td>
                        <td>  <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group9" id="inlineRadio92" value="1">
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group9" id="inlineRadio93" value="2" >
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group9" id="inlineRadio94" value="3" >
                                </label>
                            </div></td>
                    </tr>
                    <tr>
                        <th scope="row">10</th>
                        <td> Erhalten Sie genügend Selbstlern und Übungsangebote?</td>

                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group10" id="inlineRadio101" value="0" checked="checked">
                                </label>
                            </div>

                        </td>
                        <td>  <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group10" id="inlineRadio102" value="1">
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group10" id="inlineRadio103" value="2" >
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group10" id="inlineRadio104" value="3" >
                                </label>
                            </div></td>
                    </tr>
                    <tr>
                        <th scope="row">11</th>
                        <td> Erhalten Sie regelmässig Hausaufgaben?</td>

                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group11" id="inlineRadio111" value="0" checked="checked">
                                </label>
                            </div>

                        </td>
                        <td>  <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group11" id="inlineRadio112" value="1">
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group11" id="inlineRadio113" value="2" >
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group11" id="inlineRadio114" value="3" >
                                </label>
                            </div></td>
                    </tr>
                    <tr>
                        <th scope="row">12</th>
                        <td> Können Sie das Gelernte an der Prüfung anwenden?</td>

                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group12" id="inlineRadio121" value="0" checked="checked">
                                </label>
                            </div>

                        </td>
                        <td>  <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group12" id="inlineRadio122" value="1">
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group12" id="inlineRadio123" value="2" >
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group12" id="inlineRadio124" value="3" >
                                </label>
                            </div></td>
                    </tr>
                    <tr>
                        <th scope="row">13</th>
                        <td>Geht die Lehrperson auf Ihre Fragen ein?</td>

                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group13" id="inlineRadio131" value="0" checked="checked">
                                </label>
                            </div>

                        </td>
                        <td>  <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group13" id="inlineRadio132" value="1">
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group13" id="inlineRadio133" value="2" >
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group13" id="inlineRadio134" value="3" >
                                </label>
                            </div></td>
                    </tr>
                    <tr>
                        <th scope="row">14</th>
                        <td>Kann die Lehrperson Ihre Fragen beantworten?</td>

                        <td>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group14" id="inlineRadio141" value="0" checked="checked">
                                </label>
                            </div>

                        </td>
                        <td>  <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group14" id="inlineRadio142" value="1">
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group14" id="inlineRadio143" value="2" >
                                </label>
                            </div></td>
                        <td><div class="form-check form-check-inline ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="group14" id="inlineRadio144" value="3" >
                                </label>
                            </div></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="comments">
                <div class="row ">
                    <div class="col-sm" id="Positivbar">
                        <h6 id="Positiv" style="color:green">Positives</h6>
                        <span class="input-group-btn" >
                    <input name="positves" type="text" class="form-control" placeholder="Positives"   aria-label="Search for...">
                          </span>
                    </div>
                    <div class="col-sm">
                        <h6 id="Negativ" style="color:red;">Negatives</h6>
                        <span class="input-group-btn">
                    <input name="negatives" type="text" class="form-control" placeholder="Negatives" id="Negativbar" aria-label="Search for...">
                        </span>
                    </div>
                </div>
                <p id="p1"> Nach drücken des absende Knopfes nicht mehr bearbeitbar!</p>
                <button type="submit" class="btn btn-primary" id="FormBtn" style="margin-bottom: 5%; position: relative;" >Formular absenden!</button>
            </div>
        </form>
    </div>
</section>
</body>
</html>