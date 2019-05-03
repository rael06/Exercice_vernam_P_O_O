<?php
session_start();
require "Decoder.php";
if (isset($_POST["clef"]) && !empty($_POST["clef"])) {
    $encodedMessage = $_SESSION["encodedMessage"];
    $key = $_SESSION["key"];
    $decodedMessage = new Decoder($encodedMessage, $key);
    echo "message décodé : " . $decodedMessage->getDecodedMessage();
?>
<br>
<a href="./index.php"><button>Retour</button></a>
<?php
} else {
    require "form_clef.php";
}
?>