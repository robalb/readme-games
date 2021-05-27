<?php
require_once dirname(__FILE__). '/ConnectDb.php';

/**
 * this class defines the default methods called
 * by the api endpoints
 */
class Game {

  public static function getAsset($path){
    return dirname(__FILE__) . "/../../resources/" . $path;
  }

  public static function getData(){
    //instantiate the class
    $instance = ConnectDb::getInstance();
    // get the gonnection
    $conn = $instance->getConnection();
    $res = $conn->query('select game_data from game_data where id = 0');
    $res = $res->fetch();
    $data = [];
    if($res){
      $data = json_decode($res['game_data']);
    }
    return $data;
  }

  public static function writeData($data){
    $data = json_encode($data);
    //instantiate the class
    $instance = ConnectDb::getInstance();
    // get the gonnection
    $conn = $instance->getConnection();
    $res = $conn->prepare('update game_data SET game_data=? WHERE id = 0');
    $res = $res->execute([$data]);
  }

}
