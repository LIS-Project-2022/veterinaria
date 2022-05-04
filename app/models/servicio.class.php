<?php
    class Servicio extends Validator{
        //DECLARACION DE ATRIBUTOS
        private $id_servicio = null;
        private $servicio = null;
        private $precio = null;
        private $estado = 1;

        //METODOS DE ENCAPSULAMIENTO

        //PARA ID_SERVICIO
        public function setIdServicio($value)
        {
            if($this->validateId($value))
            {
                $this->id_servicio = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getIdServicio()
        {
            return $this->id_servicio;
        }

        //PARA SERVICIO
        public function setServicio($value)
        {
            if($this->validateAlphabetic($value, 1, 100))
            {
                $this->servicio = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getServicio()
        {
            return $this->servicio;
        }

        //PARA PRECIO
        public function setPrecio($value)
        {
            if($this->validateMoney($value))
            {
                $this->precio = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getPrecio()
        {
            return $this->precio;
        }

        //PARA ESTADO
        public function setEstado($value)
        {
            if($this->validateEstado($value))
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

        //METODOS PARA EL CRUD

        public function getPrecioForId()
        {
            $sql = "SELECT precio FROM servicios WHERE id_servicio = ? AND estado = 1";
            $params = array($this->id_servicio);
            return Database::getRow($sql, $params);
        }
    }
?>