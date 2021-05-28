<?php
//import here all the games defined in this folder
require_once dirname(__FILE__). '/Increment.php';


$games = [
  "increment-github" => [
    "game-class" => new Increment,
    //the name of the markdown file associated to the game
    "game-md" => "increment.md",
    //the url where the markdown game file will be hosted
    "markdown-location" => "https://github.com/robalb"
  ],
];
