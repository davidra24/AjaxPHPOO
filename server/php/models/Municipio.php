<?php
    namespace php\models;
    class Municipio extends Lugar{
        private $department;
        public function setDepartment($_department){
            $this->department = $_department;
        }
        public function getDepartment(){
            return $this->department;
        }
         
    }