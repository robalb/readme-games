<?php
require_once dirname(__FILE__) . '/../core/classes/Game.php';

class LiveCode extends Game{

  public static function initData($data){
    //init data if this is the first time being used
    if(!is_array($data) || !array_key_exists("count", $data)){
      $data = [
        "count" => 0,
        "lastclick" => "",
      ];
    }
    return $data;
  }

  /**
   * image resource endpoint
   * @param $resource String - the resource name requested
   * @param $data mixed array - the stored game data
   * this function must contain code that sends an image to the client
   */
  public static function resource($resource, $data){
    $data = self::initData($data);
    if($resource === "counter"){
      $count = $data['count'];
      $text = "Counter value: $count";
      $img = imagecreate(390, 38);
      imagesavealpha($img, true);
      $color = imagecolorallocatealpha($img, 0, 0, 0, 127);
      imagefill($img, 0, 0, $color);
      $fontcolor = imagecolorallocate($img, 153, 153, 153);
      imagestring($img, 80, 10, 10, $text, $fontcolor);
      header("Content-Type: image/png");
      header("Cache-Control: private, max-age=0, no-cache");
      imagepng($img);
      imagedestroy($img);
    }
    else if($resource === "htmlbt"){
      $filePath = self::getAsset("live-code/htmlbutton-smaller.png");
      // open the file in a binary mode
      $fp = fopen($filePath, 'rb');

      // send the right headers
      header("Content-Type: image/png");
      /* header("Cache-Control: no-store"); */
      header("Content-Length: " . filesize($filePath));

      // dump the picture and stop the script
      fpassthru($fp);
    }

    exit;
  }

  /**
   * action endpoint
   * @param $action String - the action performed
   * @param $data mixed array - the stored game data
   * @return mixed array - the data to write back in permanent storage
   */
  public static function action($action, $data){
    $data = self::initData($data);
    $data['count'] ++;
    $data['lastclick'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    return $data;
  }
}

