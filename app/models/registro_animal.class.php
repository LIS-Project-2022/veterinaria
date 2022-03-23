<?php
    class RegistroAnimal extends Validator{
        private $id_registro_animal = null;
        private $nombre = null;
        private $especie = null;
        private $sexo = null;
        private $raza = null;
        private $color = null;
        private $fecha_naci = null;
        private $id_propietario = null;
        private $estado = null;

        public function setIdRegistroAnimal($value)
        {
            if(validateId($value))
            {
                $this->id_registro_animal = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getIdRegistroAnimal()
        {
            return $this->id_registro_animal;
        }

        public function setNombre($value)
        {
            if(validateAlphabetic($value, 1, 50))
            {
                $this->nombre = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function setEspecie($value)
        {
            if(validateAlphabetic($value, 1, 25))
            {
                $this->especie = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getEspecie()
        {
            return $this->especie;
        }

        public function setSexo($value)
        {
            if(validateAlphabetic($value, 1, 15))
            {
                $this->sexo = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getSexo()
        {
            return $this->sexo;
        }

        public function setRaza($value)
        {
            if(validateAlphabetic($value, 1, 25))
            {
                $this->raza = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getRaza()
        {
            return $this->raza;
        }

        public function setColor($value)
        {
            if(validateAlphabetic($value, 1, 25))
            {
                $this->color = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getColor()
        {
            return $this->color;
        }

        public function setFechaNaci($value)
        {
            if(validateFecha($value))
            {
                $this->fecha_naci = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getFechaNaci()
        {
            return $this->fecha_naci;
        }

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

        public function getAnimales(){}
        public function create(){}
        public function update(){}
        public function delete(){}
    }
?>