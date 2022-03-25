<?php
    class Propietario extends Validator{
        private $id_propietario = null;
        private $nombres = null;
        private $apellidos = null;
        private $telefono = null;
        private $estado = 1;

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
        
        public function setNombres($value)
        {
            if($this->validateAlphabetic($value, 1, 50))
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
            if($this->validateAlphabetic($value, 1, 50))
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
            if($this->validatePhone($value))
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

        public function getPropietarios(){}

        public function getPropietario()
        {
            $query = "SELECT nombres, apellidos, telefono FROM propietarios WHERE id_propietario = ?";
            $params = array($this->id_propietario);
            $propietario = Database::getRow($query, $params);
            if($propietario)
            {
                $this->nombres = $propietario['nombres'];
                $this->apellidos = $propietario['apellidos'];
                $this->telefono = $propietario['telefono'];
                return true;
            }
            else
            {
                return false;
            }
        }

        public function create()
        {
            $query = "INSERT propietarios(nombres, apellidos, telefono, estado) VALUES (?, ?, ?, ?)";
            $params = array($this->nombres, $this->apellidos, $this->telefono, $this->estado);
            $createPropietario = Database::executeRow($query, $params);
            if($createPropietario)
            {
                $this->id_propietario = Database::getLastRowId();
                return true;
            }
            else
            {
                return false;
            }
        }

        public function update()
        {
            $query = "UPDATE propietarios SET nombres = ?, apellidos = ?, telefono = ? WHERE id_propietario = ?";
            $params = array($this->nombres, $this->apellidos, $this->telefono, $this->id_propietario);
            return Database::executeRow($query, $params);
        }

        public function delete()
        {
            $query = "UPDATE propietarios SET estado = 0 WHERE id_propietario = ?";
            $params = array($this->id_propietario);
            return Database::executeRow($query, $params);
        }

        public function deleteProp()
        {
            $query = "DELETE FROM propietarios WHERE id_propietario = ?";
            $params = array($this->id_propietario);
            return Database::executeRow($query, $params);
        }
    }
?>