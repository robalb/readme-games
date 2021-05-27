<?php
require_once './main.php';

if(!isset($_GET['a'])){
  die();
}

$a = $_GET['a'];

//sanitize the resource name
if(strlen($a) < 1 || strlen($a) > 200){
  throw new \Exception("invalid resource name length");
  die();
}
//allow only letters, numbers, and '-'
if(!preg_match('/^[a-zA-Z0-9\-_]+$/', $a)){
  throw new \Exception("invalid resource name");
  die();
}

$data = $game::getData();
$writeData = $game::action($a, $data);

//if the function returned an array, and that array
//is different from the original data
if($writeData && ($writeData != $data)){
  $game::writeData($writeData);
}


header("location: " . $markdownLocation);

