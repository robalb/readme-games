<?php
require_once './games/games.php';

if(!isset($_GET['r']) || !isset($_GET['g']) 
  || is_array($_GET['r']) || is_array($_GET['g'])){
  die();
}

$r = $_GET['r'];
$g = $_GET['g'];

//sanitize the resource name
if(strlen($r) < 1 || strlen($r) > 200){
  throw new \Exception("invalid resource name length");
  die();
}
//allow only letters, numbers, and '-'
if(!preg_match('/^[a-zA-Z0-9\-_]+$/', $r)){
  throw new \Exception("invalid resource name");
  die();
}
//sanitize the game name
if(strlen($g) < 1 || strlen($g) > 200){
  throw new \Exception("invalid game name length");
  die();
}
//allow only letters, numbers, and '-'
if(!preg_match('/^[a-zA-Z0-9\-_]+$/', $g)){
  throw new \Exception("invalid game name");
  die();
}

//check that the game context requested exists
if(!array_key_exists($g, $games)){
  throw new \Exception("game not found");
  die();
}


$game = $games[$g]['game-class'];

//return the correct image
$data = $game::getData($g);
$game::resource($r, $data);


