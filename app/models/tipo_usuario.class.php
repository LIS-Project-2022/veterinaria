<?php
    class TipoUsuario extends Validator{
        //-----------------------------------------------------------------------------------------------------------------
        //------------------------------------------- DECLARACION DE ATRIBUTOS --------------------------------------------
        //-----------------------------------------------------------------------------------------------------------------
        private $id_tipo_usuario = null;
        private $tipo_usuario = null;
        private $estado = null;

        public function setIdTipoUsuario($value)
        {
            if($this->validateId($value))
            {
                $this->id_tipo_usuario = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getIdTipoUsuario()
        {
            return $this->id_tipo_usuario;
        }

        public function setTipoUsuario($value)
        {
            if($this->validateAlphabetic($value, 1, 50))
            {
                $this->tipo_usuario = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getTipoUsuario()
        {
            return $this->tipo_usuario;
        }

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


        public function get(){}

        public function create(){}

        public function update(){}

        public function delete(){}
    }

?>