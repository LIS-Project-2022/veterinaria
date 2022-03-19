<?php
    class Propietario extends Validator{
        private $id_propietario = null;
        private $nombres = null;
        private $apellidos = null;
        private $telefono = null;
        private $estado = null;

        public function setIdPropietario($value)
        {
            if(validateId($value))
            {
                $this->id_propietario = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getIdPropietario()
        {
            return $this->id_propietario;
        }
        
        public function setNombres($value)
        {
            if(validateAlphabetic($value, 1, 50))
            {
                $this->nombres = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getNombres()
        {
            return $this->nombres;
        }

        public function setApellidos($value)
        {
            if(validateAlphabetic($value, 1, 50))
            {
                $this->apellidos = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getApellidos()
        {
            return $this->apellidos;
        }

        public function setTelefono($value)
        {
            if(validatePhone($value))
            {
                $this->telefono = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getTelefono()
        {
            return $this->telefono;
        }

        public function setEstado($value)
        {
            if(validateEstado($value))
            {
                $this->estado = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getEstado()
        {
            return $this->estado;
        }
    }
?>