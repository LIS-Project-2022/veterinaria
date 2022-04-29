<?php
    class Factura extends Validator{
        //DECLARACION DE ATRIBUTOS
        private $id_factura = null;
        private $id_propietario = null;
        private $fecha = null;
        private $total = null;
        private $estado = 1;

        //METODOS DE ENCAPSULAMIENTO

        //PARA ID_FACTURA
        public function setIdFactura($value)
        {
            if($this->validateId($value))
            {
                $this->id_factura = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getIdFactura()
        {
            return $this->id_factura;
        }

        //PARA ID_PROPIETARIO
        public function setIdPropietario($value)
        {
            if($this->validateId($value))
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

        //PARA FECHA
        public function setFecha($value)
        {
            if($this->validateFecha($value))
            {
                $this->fecha = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getFecha()
        {
            return $this->fecha;
        }

        //PARA TOTAL
        public function setTotal($value)
        {
            if($this->validateMoney($value))
            {
                $this->total = $value;
                return true;
            }
            else
            {
                return false;
            }
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

    }
?>