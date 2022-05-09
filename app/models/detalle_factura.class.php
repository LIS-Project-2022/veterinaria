<?php
    class DetalleFactura extends Validator{

        //DECLARACION DE ATRIBUTOS
        private $id_servicio =  null;
        private $id_factura = null;

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

        //METODOS PARA EL CRUD

        function createDetalleFatura()
        {
            $sql = "INSERT INTO detalle_facturas(id_servicio, id_factura) VALUE (?, ?)";
            $params = array($this->id_servicio, $this->id_factura);
            return Database::executeRow($sql, $params);
        }
    }
?>