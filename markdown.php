<?php

require_once './core/bundles/parsedown/parsedown.php';
require_once './main.php';

$markdownFile = @file_get_contents('./games/' . $gameMd . $r);
if($markdownFile == false){
  echo "create a markdown file named test-game.md and refresh this page";
  die();
}

function replaceData($url, $file){
  $file = str_replace('%resource%', $url . 'resources.php?r=', $file);
  $file = str_replace('%action%', $url . 'action.php?a=', $file);
  return $file;
}

$previewMarkdownFile = replaceData($previewUrl, $markdownFile);
$productionMarkdownFile = htmlspecialchars(replaceData($productionUrl, $markdownFile));

echo "<p>production url: $productionUrl</p>";
echo "<p>preview url: $previewUrl</p>";
echo "<br><h3>here is your markdown preview</h3>";

$Parsedown = new Parsedown();
echo $Parsedown->text($previewMarkdownFile);

echo "<br><h3>here is your production markdown</h3>";
echo "<pre><code>$productionMarkdownFile</code></pre>";
