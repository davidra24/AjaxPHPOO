<?php 
    namespace php\models;
    class Lugar{
        private $code;
        private $name;
        public function __construct(){

        }
        public function setCode($_code){
            $this->code = $_code;
        }
        public function setName($_name){
            $this->name = $_name;
        }
        public function getCode(){
            return $this->code;
        }
        public function getName(){
            return $this->name;
        }
        public function jsonSerialize(){
            $vars = get_object_vars($this);
            return $vars;
        }  
    }