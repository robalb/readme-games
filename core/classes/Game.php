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

  private static function createRecord($id){
    $instance = ConnectDb::getInstance();
    $conn = $instance->getConnection();
    $res = $conn->prepare('insert into game_data values (?, ?)');
    $success = $res->execute([$id, "null"]);
  }

  public static function getData($id){
    //instantiate the class
    $instance = ConnectDb::getInstance();
    // get the gonnection
    $conn = $instance->getConnection();
    $res = $conn->prepare('select game_data from game_data where id = ?');
    $success = $res->execute([$id]);
    $res = $res->fetch();
    $data = [];
    //if the query worked, return the data json decoded
    if($res){
      $data = json_decode($res['game_data']);
    }
    //attempt to create the record in the db
    else if($success){
      self::createRecord($id);
    }
    return $data;
  }

  public static function writeData($data, $id){
    $data = json_encode($data);
    //instantiate the class
    $instance = ConnectDb::getInstance();
    // get the gonnection
    $conn = $instance->getConnection();
    $res = $conn->prepare('update game_data SET game_data=? WHERE id = ?');
    $res = $res->execute([$data, $id]);
  }

}
