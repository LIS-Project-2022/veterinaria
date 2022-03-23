<?php
    class Usuario extends Validator{
        private $id_usuario = null;
        private $nombres = null;
        private $apellidos = null;
        private $correo = null;
        private $telefono = null;
        private $usuario = null;
        private $password = null;
        private $id_tipo_usuario = null;
        private $token = 0;
        private $estado = 1;

        public function setIdUsuario($value)
        {
            if($this->validateId($value))
            {
                $this->id_usuario = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getIdUsuario()
        {
            return $this->id_usuario;
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

        public function setCorreo($value)
        {
            if($this->validateEmail($value))
            {
                $this->correo = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getCorreo()
        {
            return $this->correo;
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

        public function setUsuario($value)
        {
            if($this->validateAlphanumeric($value, 1, 50))
            {
                $this->usuario = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getUsuario()
        {
            return $this->usuario;
        }

        public function setPassword($value)
        {
            if($this->validateAlphanumeric($value, 1, 60))
            {
                $this->password = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getPassword()
        {
            return $this->password;
        }
        
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

        public function setToken($value)
        {
            if($this->validateAlphanumeric($value, 1, 200))
            {
                $this->token = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getToken()
        {
            return $this->token;
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

        public function getTiposUsuario()
        {
            $query = "SELECT id_tipo_usuario, tipo_usuario FROM tipos_usuario WHERE estado = 1";
            $params = array();
            return Database::getRows($query, $params);
        }

        public function getUsuarios()
        {
            $query = "SELECT id_usuario, nombres, apellidos, correo, usuario, telefono FROM usuarios WHERE estado = 1";
            $params = array();
            return Database::getRows($query, $params);
        }

        public function getUsuarioForId()
        {
            $query = "SELECT nombres, apellidos, correo, usuario, telefono, id_tipo_usuario FROM usuarios WHERE id_usuario = ?";
            $params = array($this->id_usuario);
            $usuarioI = Database::getRow($query, $params);
            if($usuarioI)
            {
                $this->nombres = $usuarioI['nombres'];
                $this->apellidos = $usuarioI['apellidos'];
                $this->correo = $usuarioI['correo'];
                $this->usuario = $usuarioI['usuario'];
                $this->telefono = $usuarioI['telefono'];
                $this->id_tipo_usuario = $usuarioI['id_tipo_usuario'];
                return true;
            }
            else
            {
                return false;
            }
        }

        public function create()
        {
            $query = "INSERT usuarios(nombres, apellidos, correo, telefono, usuario, password, id_tipo_usuario, token, estado) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $params = array($this->nombres, $this->apellidos, $this->correo, $this->telefono, $this->usuario, $this->password, $this->id_tipo_usuario, $this->token, $this->estado);
            return Database::executeRow($query, $params);
        }
        
        public function update()
        {
            $query = "UPDATE usuarios SET nombres = ?, apellidos = ?, correo = ?, telefono = ?, usuario = ?, password = ?, id_tipo_usuario = ? WHERE id_usuario = ?";
            $params = array($this->nombres, $this->apellidos, $this->correo, $this->telefono, $this->usuario, $this->password, $this->id_tipo_usuario, $this->id_usuario);
            return Database::executeRow($query, $params);
        }
        public function delete()
        {
            $query = "UPDATE usuarios SET estado = 0 WHERE id_usuario = ?";
            $params = array($this->id_usuario);
            return Database::executeRow($query, $params);
        }
    }
?>