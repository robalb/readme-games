<?php
require_once dirname(__FILE__). '/games/Increment.php';

//game configuration

$game = new Increment;
$gameMd = "increment.md";
$markdownLocation = "http://localhost/readme-games/markdown.php";

$productionUrl = 'https://halb.it/readme-games/';
$productionUrl = 'http://localhost/readme-games/';
$previewUrl = $productionUrl;

