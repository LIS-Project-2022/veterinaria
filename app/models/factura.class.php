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

        public function getFacturas()
        {
            $sql = "SELECT f.id_factura, f.fecha, CONCAT(p.nombres, ' ', p.apellidos) as propietario, total FROM facturas f 
                INNER JOIN propietarios p ON f.id_propietario = p.id_propietario
                WHERE f.estado = 1";
            $params = array();
            return Database::getRows($sql, $params);
        }

        public function getFactura()
        {
            $sql = "SELECT * FROM facturas WHERE id_factura = ? AND estado = 1";
            $params = array($this->id_factura);
            return Database::getRows($sql, $params);
        }

        public function getServicios()
        {
            $sql = "SELECT id_servicio, servicio FROM servicios WHERE estado = 1";
            $params = array();
            return Database::getRows($sql, $params);
        }

        public function createFactura()
        {
            $today = new DateTime(null, new DateTimeZone(date_default_timezone_get()));
            $sql = "INSERT INTO facturas(id_propietario, fecha, total) VALUES (?, ?, ?)";
            $params = array($this->id_propietario, $today->format('y-m-d'), $this->total);
            $factura = Database::executeRow($sql, $params);
            if($factura)
            {
                $this->id_factura = Database::getLastRowId();
                return true;
            }
            else
            {
                return false;
            }
        }

        public function deleteFactura()
        {
            $sql = "UPDATE facturas SET estado = 0 WHERE id_factura = ?";
            $params = array($this->id_factura);
            return Database::executeRow($sql,  $params);
        }

        //METODOS PARA PDF
        public function getInfoPDF()
        {
            $sql = "SELECT f.id_factura, f.fecha, f.total, CONCAT(p.nombres, ' ', p.apellidos) as propietario FROM facturas f 
                INNER JOIN propietarios p ON f.id_propietario = p.id_propietario 
                WHERE f.id_factura = ? AND f.estado = 1";
            $params = array($this->id_factura);
            return Database::getRow($sql, $params);
        }

        public function getInfoDetallePDF()
        {
            $sql = "SELECT s.servicio, s.precio FROM detalle_facturas df 
                INNER JOIN servicios s ON df.id_servicio = s.id_servicio
                WHERE df.id_factura = ?";
            $params = array($this->id_factura);
            return Database::getRows($sql, $params);
        }
    }
?>