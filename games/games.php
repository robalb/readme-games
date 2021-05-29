<?php
//import here all the games defined in this folder
require_once dirname(__FILE__). '/Increment.php';
require_once dirname(__FILE__). '/UselessButton.php';
require_once dirname(__FILE__). '/LiveCode.php';


$games = [
  "increment-github" => [
    //game driver class
    "game-class" => new Increment,
    //the name of the markdown file associated to the game
    "game-md" => "increment.md",
    //the url where the markdown game file will be hosted
    "markdown-location" => "https://github.com/robalb"
  ],
  "useless-button-github" => [
    "game-class" => new UselessButton,
    "game-md" => "uselessbutton.md",
    "markdown-location" => "https://github.com/robalb"
  ],
  "live-code-github" => [
    "game-class" => new LiveCode,
    "game-md" => "livecode.md",
    "markdown-location" => "https://github.com/robalb"
  ],
];
