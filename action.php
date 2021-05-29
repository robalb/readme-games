<?php
require_once './games/games.php';

if(!isset($_GET['a']) || !isset($_GET['g']) 
  || is_array($_GET['a']) || is_array($_GET['g'])){
  die();
}

$a = $_GET['a'];
$g = $_GET['g'];

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

$data = $game::getData($g);
$writeData = $game::action($a, $data);

//if the function returned an array, and that array
//is different from the original data
if($writeData && ($writeData != $data)){
  $game::writeData($writeData, $g);
}


if(isset($_GET['testing'])){
  $config = require dirname(__FILE__).'/core/config/config.php';
  $markdownLocation = $config['serverBasePath'] . "markdown.php?g=$g";
}
else{
  $markdownLocation = $games[$g]["markdown-location"];
}

header("location: " . $markdownLocation);

