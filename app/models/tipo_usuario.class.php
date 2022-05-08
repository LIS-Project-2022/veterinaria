<?php
    class TipoUsuario extends Validator{
        //-----------------------------------------------------------------------------------------------------------------
        //------------------------------------------- DECLARACION DE ATRIBUTOS --------------------------------------------
        //-----------------------------------------------------------------------------------------------------------------
        private $id_tipo_usuario = null;
        private $tipo_usuario = null;
        private $estado = 1;

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
            $this->tipo_usuario;
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
     
        public function getTipoUsuarios()
        {
            $query = "SELECT id_tipo_usuario, tipo_usuario FROM tipos_usuario WHERE estado = 1";
            $params = array();
            return Database::getRows($query, $params);
        }

        public function getTipoUsuarioForId()
        {
            $query = "SELECT tipo_usuario FROM tipos_usuario WHERE estado = 1 AND id_tipo_usuario = ?";
            $params = array($this->id_tipo_usuario);
            return Database::getRow($query, $params);
        }

        public function get(){}

        public function create()
        {
            $query = "INSERT tipos_usuario( tipo_usuario, estado) 
            VALUES (?, ?)";
            $params = array($this->tipo_usuario, $this->estado);
            return Database::executeRow($query, $params);
        }
        
        public function update()
        {
            $query = "UPDATE tipos_usuario SET tipo_usuario = ?, estado = ? WHERE id_tipo_usuario = ?";
            $params = array($this->tipo_usuario, $this->estado, $this->id_tipo_usuario);
            return Database::executeRow($query, $params);
        }
        public function delete()
        {
            $query = "UPDATE tipos_usuario SET estado = 0 WHERE id_tipo_usuario = ?";
            $params = array($this->id_tipo_usuario);
            return Database::executeRow($query, $params);
        }
    }

?>