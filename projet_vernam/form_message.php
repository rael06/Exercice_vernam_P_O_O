<?php
require "Form.php";
$inputMessage = new Form("input", "password", "message", "Entrez votre message", null);
$submit = new Form("input", "submit", null, null, "Envoyer");
echo Form::formMaker("./message.php");
echo $inputMessage->makeInput();
echo $submit->makeInput();
echo Form::$formEnd;
?>