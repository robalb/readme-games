<?php
//import here all the games defined in this folder
require_once dirname(__FILE__). '/Increment.php';
require_once dirname(__FILE__). '/UselessButton.php';
require_once dirname(__FILE__). '/LiveCode.php';


$games = [
  "increment-github" => [
    "game-class" => new Increment,
    //the name of the markdown file associated to the game
    "game-md" => "increment.md",
    //the url where the markdown game file will be hosted
    "markdown-location" => "https://github.com/robalb"
  ],
  "useless-button-github" => [
    "game-class" => new UselessButton,
    //the name of the markdown file associated to the game
    "game-md" => "uselessbutton.md",
    //the url where the markdown game file will be hosted
    "markdown-location" => "https://github.com/robalb"
  ],
  "live-code-github" => [
    "game-class" => new LiveCode,
    //the name of the markdown file associated to the game
    "game-md" => "livecode.md",
    //the url where the markdown game file will be hosted
    "markdown-location" => "https://github.com/robalb"
  ],
];
