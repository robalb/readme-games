<?php

require_once './core/bundles/parsedown/parsedown.php';
require_once './games/games.php';


//default game
$gameId = array_key_first($games);

//set the game to the one requested via get
if(isset($_GET['g']) && !is_array($_GET['g']) && array_key_exists($_GET['g'], $games)){
  $gameId = $_GET['g'];
}

$game = $games[$gameId];

$gameMd = $game["game-md"];

$markdownFile = @file_get_contents('./games/' . $gameMd . $r);
if($markdownFile == false){
  echo "create a markdown file named test-game.md and refresh this page";
  die();
}

$config = require dirname(__FILE__).'/core/config/config.php';
$url = $config['serverBasePath'];


function replaceData($url, $file, $testFlag, $gameid){
  $test = "";
  if($testFlag)
    $test = "testing&";
  $gameid = "g=$gameid&";
  $file = str_replace('%resource%', $url . "resources.php?{$test}{$gameid}r=", $file);
  $file = str_replace('%action%', $url . "action.php?{$test}{$gameid}a=", $file);
  return $file;
}

$previewMarkdownFile = replaceData($url, $markdownFile, true, $gameId);
$productionMarkdownFile = htmlspecialchars(replaceData($url, $markdownFile, false, $gameId));


echo "<p>games: <br>";
foreach(array_keys($games) as $key){
  if($key == $gameId)
    echo "<a>[$key]</a>";
  else
    echo "<a href=\"?g=$key\"> $key </a>";
}
echo "<p>server url: $url</p>";
echo "<p>markdown location: {$game['markdown-location']}</p>";
echo "<br><h3>here is your markdown preview</h3>";

$Parsedown = new Parsedown();
echo $Parsedown->text($previewMarkdownFile);

echo "<br><h3>here is your production markdown</h3>";
echo "<pre><code>$productionMarkdownFile</code></pre>";
