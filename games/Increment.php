<?php
require_once dirname(__FILE__) . '/../core/classes/Game.php';

class Increment extends Game{

  /**
   * image resource endpoint
   * @param $resource String - the resource name requested
   * @param $data mixed array - the stored game data
   * must send an image to the client
   */
  public static function resource($resource, $data){
    //return an image here, based on the resource requested and the data in $data
    $text = "This button has been pressed $data times";
    if($resource === "counter"){
      $img = imagecreate(390, 38);
      imagesavealpha($img, true);
      $color = imagecolorallocatealpha($img, 0, 0, 0, 127);
      imagefill($img, 0, 0, $color);
      /* $bgcolor = imagecolorallocate($img, 49, 109, 202); */
      /* $bgcolor = imagecolorallocate($img, 150, 200, 180); */
      $fontcolor = imagecolorallocate($img, 255,255,255);
      $fontcolor = imagecolorallocate($img, 120, 60, 200);
      $fontcolor = imagecolorallocate($img, 49, 109, 202);
      imagestring($img, 80, 10, 10, $text, $fontcolor);
      header("Content-Type: image/png");
      header("Cache-Control: private, max-age=0, no-cache");
      imagepng($img);
      imagedestroy($img);
    }
    else if($resource === "increment_bt"){
      $filePath = self::getAsset("increment/green-bt-sized2.png");
      // open the file in a binary mode
      $fp = fopen($filePath, 'rb');

      // send the right headers
      header("Content-Type: image/png");
      header("Cache-Control: no-store");
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
    //perform here some action that changes $data based on $action
    if(!is_numeric($data)){
      $data = 0;
    }
    return $data+1;
  }
}
