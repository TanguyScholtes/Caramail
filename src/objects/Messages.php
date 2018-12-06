<?php

require 'Model.php';

class messages extends Model {
  public $id;
  public $userID;
  public $conversationID;
  public $content;
  public $timeStamp;


  public function __construct ($id, $userID, $conversationID, $content, $timeStamp) {
    $this->id = $id;
    $this->userID = $userID;
    $this->conversationID = $conversationID;
    $this->content = $content;
    $this->timeStamp = $timeStamp;
  }
}

?>
