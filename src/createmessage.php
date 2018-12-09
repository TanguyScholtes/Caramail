<?PHP
require "config.php";
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    die();
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['new-message-content']) && isset($_POST['new-message-content']) && strlen($_POST['new-message-content']) > 0 && isset($_POST['new-message-conversation'])) {
 $message = new Message();
 $message->createMessage($_SESSION['id'], intval($_POST['new-message-conversation']), $_POST['new-message-content']);
}
header("Location: " . $_SESSION['page']);
die();

?>
