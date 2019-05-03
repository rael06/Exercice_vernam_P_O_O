<?php
session_start();
require_once "Encoder.php";
if (isset($_POST["message"]) && !empty($_POST["message"])) {
    $_message = new Encoder($_POST["message"]);
    $_SESSION["encodedMessage"] = $_message->getEncodedWord();
    $_SESSION["key"] = $_message->getKey();
    require "form_clef.php";
} else {
    require "form_message";
}
?>