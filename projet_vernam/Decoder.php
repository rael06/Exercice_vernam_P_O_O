<?php
class Decoder {

    /**
     * Message à déchiffrer
     *
     * @var string
     */
    private $messageToDecode = "";

    /**
     * Clef de déchiffrage
     *
     * @var string
     */
    private $key = "";

    /**
     * Tableau des caractères du message à déchiffrer
     *
     * @var array
     */
    private $messageToDecodeSplitted = [];

    /**
     * Tableau des caractères de la clef
     *
     * @var array
     */
    private $keySplitted = [];

    /**
     * Tableau du code ascii des caractères du message
     *
     * @var array
     */
    private $messageToDecodeSplittedNumbered = [];

    /**
     * Tableau du code ascii des caractères de la clef
     *
     * @var array
     */
    private $keySplittedNumbered = [];

    /**
     * Message déchiffré
     *
     * @var string
     */
    private $decodedMessage = "";
    
    public function __construct($toDecode, $_key) {
        $this->messageToDecode = $toDecode;
        $this->key = $_key;
        $this->messageToDecodeSplitted = str_split($this->messageToDecode);
        $this->keySplitted = str_split($this->key);
        $this->messageToDecodeSplittedNumbered = $this->toOrd($this->messageToDecodeSplitted);
        $this->keySplittedNumbered = $this->toOrd($this->keySplitted);
        $this->decodedMessage = $this->decoder();
    }

    /**
     * Retourne le tableau du code ascii des caractères de l'argument
     *
     * @param array $_toOrd
     * @return void
     */
    private function toOrd($_toOrd) {
        $newArray = [];
        foreach($_toOrd as $character) {
            $newArray[] = ord($character);
        }
        return $newArray;
    }

    private function decoder() {
        $decodedAsciiArray = [];
        for ($i = 0; $i < count($this->messageToDecodeSplittedNumbered); $i++) {
            $ascii = $this->messageToDecodeSplittedNumbered[$i] - $this->keySplittedNumbered[$i];
            // echo $this->messageToDecodeSplittedNumbered[$i] . " - " . $this->keySplittedNumbered[$i] . " = " . ($this->messageToDecodeSplittedNumbered[$i] - $this->keySplittedNumbered[$i]) . "<br>";
            // if ($ascii < 32) {
            //     $ascii += 95;
            // }
            // echo $this->messageToDecodeSplittedNumbered[$i] . " - " . $this->keySplittedNumbered[$i] . " = " . $ascii . " : " . chr($ascii) . "<br>";
            $decodedAsciiArray[] = chr($ascii);
        }
        return implode($decodedAsciiArray);
    }

    /**
     * Get message déchiffré
     *
     * @return  string
     */ 
    public function getDecodedMessage()
    {
        return $this->decodedMessage;
    }

    /**
     * Set message déchiffré
     *
     * @param  string  $decodedMessage  Message déchiffré
     *
     * @return  self
     */ 
    public function setDecodedMessage(string $decodedMessage)
    {
        $this->decodedMessage = $decodedMessage;

        return $this;
    }
}
?>