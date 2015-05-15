<?php
$description = $_POST["question"];//@TODO clean these
$subjects = $_POST["subjects"];
$answer = $_POST["answer"];
$options[0] = $_POST["option1"];
$options[1] = $_POST["option2"];
$options[2] = $_POST["option3"];
$options[3] = $_POST["option4"];
$options[4] = $_POST["option5"];
$options[5] = $_POST["option6"];
$options[6] = $_POST["option7"];

echo "subjects: ";
print_r($subjects);

echo "</br>".$description."</br>";
echo "answer: ".$answer."</br>";
echo "other options: </br>";
print_r($options);

//we create a question first
$link->query("INSERT INTO questions(description) values('".$description."')");
$questionID = $link->insert_id;

//now tag the question to related subjects
foreach($subjects as $subject){
  $link->query("INSERT INTO questionrelated(idQuestion,idSubject) values('".$questionID."','".$subject."')");
}

//insert correct answer
$link->query("INSERT INTO questionoptions(idQuestion,answer) values('".$questionID."','".$answer."')");
$correctAnswerID = $link->insert_id;

//insert other options
foreach($options as $option){
  if(isset($option) && !empty($option))
    $link->query("INSERT INTO questionoptions(idQuestion,answer) values('".$questionID."','".$option."')");
}

//now update the question and point idAnswer to $correctAnswerID :D
$link->query("UPDATE questions SET idAnswer='".$correctAnswerID."' WHERE id='".$questionID."'");

setAlert('success','well, i think everything went well.i hope :p');

?>
