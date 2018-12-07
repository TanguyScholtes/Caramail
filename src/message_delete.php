<?PHP
require "config.php";
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    die();
}

if (isset($_GET['id'])){
$message = new Message();
$message-> deleteMessage($_GET['id']);
}
header("Location:" . $_SESSION['page']);
die();
?>
