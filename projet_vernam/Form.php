<?php
class Form {
    private $html = "";
    private $type = "";
    private $name = "";
    private $placeholder = "";
    private $text = "";
    public static $formEnd = "</form>";


    public function __construct($_html, $_type, $_name, $_placeholder, $_text) {
        $this->html = $_html;
        $this->type = $_type;
        $this->name = $_name;
        $this->placeholder = $_placeholder;
        $this->text = $_text;
    }

    public function makeInput() {
        echo "<{$this->html} type='{$this->type}' name='{$this->name}' placeholder='{$this->placeholder}' value='{$this->text}'>";
    }

    public static function formMaker($url) {
        return "<form action='" . $url . "' method='POST'>";
    }
}
?>