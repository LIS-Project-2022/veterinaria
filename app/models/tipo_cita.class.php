<?php
    class TipoCita extends Validator{
        //DECLARACION DE ATRIBUTOS
        private $id_tipo_cita = null;
        private $tipo_cita = null;
        private $estado = 1;

        //METODOS DE ENCAPSULAMIENTO

        //PARA ID_TIPO_CITA
        public function setIdTipoCita($value)
        {
            if($this->validateId($value))
            {
                $this->id_tipo_cita = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getIdTipoCita()
        {
            return $this->id_tipo_cita;
        }

        //PARA TIPO_CITA
        public function setTipoCita($value)
        {
            if($this->validateAlphabetic($value, 1, 30))
            {
                $this->tipo_cita = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getTipoCita()
        {
            return $this->tipo_cita;
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