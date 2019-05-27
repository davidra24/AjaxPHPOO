<?php
    namespace php\api;
    use php\models\Departamento;
    use php\models\Municipio;
    class Api{
        private $opt;
        private $dpto;
        private $urlDptos;
        private $urlTowns;
        public function __construct(){
            $this->urlDptos = '../resources/department.json';
            $this->urlTowns = '../resources/towns.json';
        }
        public function setDpto($_dpto){
            $this->dpto = $_dpto;
        }
        public function getDpto(){
            return $this->dpto;
        }
        public function setOpt($_opt){
            $this->opt = $_opt;
        }
        public function getOpt(){
            return $this->opt;
        }
        public function getDepartments(){
            $file = fopen($this->urlDptos, 'r');
            $content = fread($file, filesize($this->urlDptos));
            return $content;
        }   
        public function getTowns(){
            $file = fopen($this->urlTowns, 'r');
            $content = fread($file, filesize($this->urlTowns));
            $municipios = json_decode($content);
            $_municipios = array();
            for ($i=0; $i < count($municipios) ; $i++) { 
                $municipio = $municipios[$i];
                if($municipio->department==$this->dpto){
                    $auxMun = new Municipio();
                    $auxMun->setCode($municipio->code);
                    $auxMun->setName($municipio->name);
                    $auxMun->setDepartment($municipio->department);
                    array_push($_municipios, $auxMun->jsonSerialize());
                    
                }
            }
            $result = json_encode($_municipios);
            return $result;
        }    
        public function _get(){
            if($this->opt == 1){
                return $this->getDepartments();
            }else {
                return $this->getTowns();
            }
        }
    }