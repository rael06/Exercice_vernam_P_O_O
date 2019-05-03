<?php
class Encoder {

    /**
     * Le message à déchiffrer
     *
     * @var string
     */
    private $word = "";

    /**
     * La clef de déchiffrage
     *
     * @var string
     */
    private $key = "";
    
    /**
     * Le message chiffré (encodé)
     *
     * @var string
     */
    private $encodedWord = "";


    /**
     * Le tableau des caractères du message
     *
     * @var array
     */
    private $letterArray = [];

    /**
     * Le tableau des caractères de la clef
     *
     * @var array
     */
    private $keyLetterArray = [];

    /**
     * Le tableau des caractères du message chiffré
     *
     * @var array
     */
    private $encodedLetterArray = [];


    public function __construct($_word) {
        $this->word = $_word;
        $this->letterArray = str_split($this->word);
        $this->keyLetterArray = $this->createKeyArray();
        $this->encodedLetterArray = $this->createEncodedLetterArray();
        $this->key = implode($this->keyLetterArray);
        $this->encodedWord = implode($this->encodedLetterArray);
    }


    /**
     * Retourne un caractère aléatoire ayant le code ascii compris entre 32 et 95 inclus
     *
     * @return void
     */
    private function randomLetter() {
        $randomNumber = rand(32, 95);
        return chr($randomNumber);
    }

    /**
     * Retourne le tableau des caractères aléatoires de la clef
     *
     * @return void
     */
    private function createKeyArray() {
        for ($i = 0; $i < count($this->letterArray); $i++) {
            $this->keyLetterArray[] = $this->randomLetter();
        }
        return $this->keyLetterArray;
    }

    /**
     * Retourne le tableau des caractères du message chiffré
     *
     * @return void
     */
    private function createEncodedLetterArray() {
        for ($i = 0; $i < count($this->letterArray); $i++) {
            $sumLetters = ord($this->letterArray[$i]) + ord($this->keyLetterArray[$i]);
            // if ($sumLetters > 127) {
            //     $sumLetters -= 95;
            // }
            $this->encodedLetterArray[] = chr($sumLetters);
            // echo "mot : ". ord($this->letterArray[$i]) . " - clef : " . ord($this->keyLetterArray[$i]) . " - code : " . $sumLetters . "<br>";
        }
        return $this->encodedLetterArray;
    }

    // GETTERS AND SETTERS -----------------------------------------

    /**
     * Get the value of encodedWord
     */ 
    public function getEncodedWord()
    {
        return $this->encodedWord;
    }

    /**
     * Set the value of encodedWord
     *
     * @return  self
     */ 
    public function setEncodedWord($encodedWord) {
        $this->encodedWord = $encodedWord;
        return $this;
    }

    /**
     * Get the value of key
     */ 
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the value of key
     *
     * @return  self
     */ 
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get le tableau des caractères du message
     *
     * @return  array
     */ 
    public function getLetterArray()
    {
        return $this->letterArray;
    }

    /**
     * Set le tableau des caractères du message
     *
     * @param  array  $letterArray  Le tableau des caractères du message
     *
     * @return  self
     */ 
    public function setLetterArray(array $letterArray)
    {
        $this->letterArray = $letterArray;

        return $this;
    }
}
?>