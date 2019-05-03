<?php
require_once "Form.php";
$inputKey = new Form("input", "text", "clef", "Entrez votre clef", null);
$submit = new Form("input", "submit", null, null, "Envoyer");
echo Form::formMaker("./clef.php");
echo $inputKey->makeInput();
echo $submit->makeInput();
echo Form::$formEnd;
echo "Votre clef : " . $_SESSION["key"];
?>