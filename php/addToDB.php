<?php
$description = $_POST["question"];
$Subject =$_POST["Subjects"];
$Answer = $_POST["Answer"];
$option1 = $_POST["option1"];
$option2 = $_POST["option2"];
$option3 = $_POST["option3"];
$option4 = $_POST["option4"];
$option5 = $_POST["option5"];
$option6 = $_POST["option6"];
$option7 = $_POST["option7"];
//i got lost 
$link->query("INSERT into questions(description,idAnswer,idRelated) VALUES('$description','$idAnswer','$idRelated')");
$link->query("INSERT into questionrelated(idQuestion,idSubject) VALUES('$idQuestion','$idSubject')");

$idAnswer = $_POST["idAnswer"];
$idRelated = $_POST["idRelated"];
?>