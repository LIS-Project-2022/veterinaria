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
        private $token = null;
        private $estado = null;

        public function setIdUsuario($value)
        {
            if(validateId($value))
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
            if(validateAlphabetic($value, 1, 50))
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
            if(validateAlphabetic($value, 1, 50))
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
            if(validateEmail($value))
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
            if(validatePhone($value))
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
            if(validateAlphanumeric($value, 1, 50))
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
            if(validateAlphanumeric($value, 1, 60))
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
            if(validateId($value))
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
            if(validateAlphanumeric($value, 1, 200))
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

        public function get(){}
        public function create(){}
        public function update(){}
        public function delete(){}
    }
?>