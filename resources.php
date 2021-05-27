<?php
require_once './main.php';

if(!isset($_GET['r'])){
  die();
}

$r = $_GET['r'];

//sanitize the resource name
if(strlen($r) < 5 || strlen($r) > 200){
  throw new \Exception("invalid resource name length");
  die();
}
//allow only letters, numbers, and '-'
if(!preg_match('/^[a-zA-Z0-9\-_]+$/', $r)){
  throw new \Exception("invalid resource name");
  die();
}


//return the correct image
$data = $game::getData();
$game::resource($r, $data);


