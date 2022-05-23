<?php 
    class Contraseña {
        private $id;
        private $nombre;
        private $usuario;
        private $password;
        private $url;
        private $notas;
        
        public function __construct($id, $nombre, $usuario, $password, $url, $notas) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->usuario = $usuario;
            $this->password = $password;
            $this->url = $url;
            $this->notas = $notas;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
            return $this;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
            return $this;
        }
        
        public function getUsuario() {
            return $this->usuario;
        }

        public function setUsuario($usuario) {
            $this->usuario = $usuario;
            return $this;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setPassword($password) {
            $this->password = $password;
            return $this;
        }

        public function getUrl() {
            return $this->url;
        }

        public function setUrl($url) {
            $this->url = $url;
            return $this;
        }

        public function getNotas() {
            return $this->notas;
        }

        public function setNotas($notas) {
            $this->notas = $notas;
            return $this;
        }
    }
?>