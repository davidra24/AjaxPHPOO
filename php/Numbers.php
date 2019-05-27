<?php
class Numbers{
    private $numOne;
    private $numTwo;
    function __construct($numOne, $numTwo){
        $this.numOne = $numOne;
        $this.numTwo = $numTwo; 
    }
    function getNumOne(){
        return $this−>$numOne ;
    }
    function getNumTwo(){
        return $this−>$numTwo ;
    }
    function setNumOne($numOne){
        $this->$numOne = $numOne ;
    }
    function setNumTwo($numTwo){
        $this->$numTwo = $numTwo ;
    }
    function toString(){
        return '[numOne=$this−>numOne, numTwo=$this−>numTwo]';
    }
        
    private function isCuosing($n){
        $cont=2 ;
        $cousing = TRUE;
        while($cont <= $n / 2 && $cousing ){
            $cousing =! ( $n % $cont++ == 0 ) ;
        }
        return $cousing;
    }
    
    function getCousings(){
        $cousings = [] ;
        $cont = 0;
        $less = $this−>numOne < $this−>numTwo ? $this−>numOne : $this−>numTwo;
        $higher = $this−>numOne > $this−>numTwo ? $this−>numOne : $this−>numTwo;
        for($i = $less; $i <= $higher ; $i++){
            if($this−>isCuosing($i)){
                $cousings[$cont++] = $i ;
            }
        }
        return $cousings;
    }
        
}