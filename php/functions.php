<?php
if(!isset($isIndex))die('');
// Strips nasty tags from code..
function cleanEvilTags($data) {
  $data = preg_replace("/javascript/i", "j&#097;v&#097;script",$data);
  $data = preg_replace("/alert/i", "&#097;lert",$data);
  $data = preg_replace("/about:/i", "&#097;bout:",$data);
  $data = preg_replace("/onmouseover/i", "&#111;nmouseover",$data);
  $data = preg_replace("/onclick/i", "&#111;nclick",$data);
  $data = preg_replace("/onload/i", "&#111;nload",$data);
  $data = preg_replace("/onsubmit/i", "&#111;nsubmit",$data);
  $data = preg_replace("/<body/i", "&lt;body",$data);
  $data = preg_replace("/<html/i", "&lt;html",$data);
  $data = preg_replace("/document\./i", "&#100;ocument.",$data);
  $data = preg_replace("/<script/i", "&lt;&#115;cript",$data);
  return strip_tags(trim($data));
}

function G4K_MD5($input){
  return md5("d7a".$input."s05");//this is salted md5. to make it harder for hackers :) / nice  
}

// Cleans output data..
function cleanData($data) {
  $data = str_replace(' & ', ' &amp; ', $data);
  return (get_magic_quotes_gpc() ? stripslashes($data) : $data);
}

function multiDimensionalArrayMap($func,$arr) {
  $newArr = array();
  if (!empty($arr)) {
    foreach($arr AS $key => $value) {
      $newArr[$key] = (is_array($value) ? multiDimensionalArrayMap($func,$value) : $func($value));
    }
  }
  return $newArr;
}

function redirect($location){ ?>
	<script type='text/javascript'>window.location.replace('<?php echo $location; ?>');</script>
	<a href='<?php echo $location; ?>'><p>if you are not redirected. please click here.</p></a>
<?php }

function setAlert($alert_type,$alert_content){
  if(!isset($_SESSION['alert_type']) || empty($_SESSION['alert_type'])){
    $_SESSION['alert_type'] = $alert_type;
    $_SESSION['alert_content'] = $alert_content;
  }
}

function printAlert(){
  if(!empty($_SESSION['alert_type'])){
  $alert_type = $_SESSION['alert_type'];//TODO clean from bad input
  $alert_content = $_SESSION['alert_content'];//TODO clean from bad input
  $_SESSION['alert_type'] = '';
  $_SESSION['alert_content'] = '';
?>
<script type='text/javascript'>
  $(document).ready(function(){
    var $alertBox = $('<div>',{
      class:'alert custom-alert alert-dismissible alert-<?php echo $alert_type ?>'
    });
    var $alertExit = $('<button>',{
      type:'button',
      class:'close',
      'data-dismiss':'alert'
    });$alertExit.html('×');
    $alertExit.appendTo($alertBox);
    $alertBox.append('<?php echo $alert_content ?>');
    $alertBox.appendTo('body');
    $alertBox.slideDown();
    window.setTimeout(function(){//not a fancy solution, but hey, later.. TODO, make it better
      $alertBox.slideUp('slow');
    }, 2000);
  });
</script>
<?php
  }
}
