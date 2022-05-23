<?php 
    class Registros {
        private $id;
        private $cuando;
        private $nombre;
        
        public function __construct($id, $cuando, $nombre) {
            $this->id = $id;
            $this->cuando = $cuando;
            $this->nombre = $nombre;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
            return $this;
        }

        public function getCuando() {
            return $this->cuando;
        }

        public function setCuando($cuando) {
            $this->cuando = $cuando;
            return $this;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
            return $this;
        }
    }
?>