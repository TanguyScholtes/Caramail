<?php
$servername = "localhost";

$bdd = new mysqli($servername,"", "");
if ($bdd->connect_error) {
    die("Connection failed: " . $bdd->connect_error);
}
echo "Connected successfully";








class messages {
  public $id;
  public $userID;
  public $conversationID;
  public $content;
  public $timeStamp;


  public function __construct ( $id, $userID, $conversationID, $content, $timeStamp ) {
    $this->id = $id;
    $this->userID = $userID;
    $this->conversationID = $conversationID;
    $this->content = $content;
    $this->timeStamp = $timeStamp;
  }
}

$plop = new messages(1,12,15,"blablablablabla", "19h42");

var_dump($plop);
?>
