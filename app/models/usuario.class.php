<?php
    class Usuario extends Validator{
        private $id_usuario = null;
        private $nombres = null;
        private $apellidos = null;
        private $correo = null;
        private $telefono = null;
        private $usuario = null;
        private $password = null;
        private $newPassword = null;
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

        public function setNewPassword($value){
            if($this->validateAlphanumeric($value, 1, 60))
            {
                $this->newPassword = $value;
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

        //METODOS PARA CRUD DE USUARIO
        public function getTiposUsuario()
        {
            $query = "SELECT id_tipo_usuario, tipo_usuario FROM tipos_usuario WHERE estado = 1";
            $params = array();
            return Database::getRows($query, $params);
        }

        public function getUsuarios()
        {
            $query = "SELECT id_usuario, nombres, apellidos, correo, usuario, telefono FROM usuarios WHERE estado = 1 AND id_usuario != '".$_SESSION['auth']['id_usuario']."'";
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
            $hash = password_hash($this->password, PASSWORD_DEFAULT);
            $query = "INSERT usuarios(nombres, apellidos, correo, telefono, usuario, password, id_tipo_usuario, token, estado) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $params = array($this->nombres, $this->apellidos, $this->correo, $this->telefono, $this->usuario, $hash, $this->id_tipo_usuario, $this->token, $this->estado);
            return Database::executeRow($query, $params);
        }
        
        public function update()
        {
            $query = "UPDATE usuarios SET nombres = ?, apellidos = ?, correo = ?, telefono = ?, usuario = ?, id_tipo_usuario = ? WHERE id_usuario = ?";
            $params = array($this->nombres, $this->apellidos, $this->correo, $this->telefono, $this->usuario, $this->id_tipo_usuario, $this->id_usuario);
            return Database::executeRow($query, $params);
        }

        public function changePassword()
        {
            $hash = password_hash($this->newPassword, PASSWORD_DEFAULT);
            $query = "UPDATE usuarios SET password = ? WHERE id_usuario = ? AND password = ?";
            $params = array($hash, $this->id_usuario, $this->password);
            return Database::executeRow($query, $params);
        }
        public function delete()
        {
            $query = "UPDATE usuarios SET estado = 0 WHERE id_usuario = ?";
            $params = array($this->id_usuario);
            return Database::executeRow($query, $params);
        }

        //METODOS PARA EL LOGIN

        public function checkPassword()
        {
            $sql = 'SELECT id_usuario, password FROM usuarios WHERE correo = ?';
            $params= array($this->correo);
            $user = Database::getRow($sql, $params);
            if($user)
            {
                if(password_verify($this->password, $user['password']))
                {
                    $this->id_usuario = $user['id_usuario'];
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }

        public function getInfoSession()
        {
            $sql = 'SELECT id_usuario, nombres, apellidos, correo, usuario, id_tipo_usuario, estado FROM usuarios WHERE id_usuario = ?';
            $params = array($this->id_usuario);
            return Database::getRow($sql, $params);
        }
        
        public function logout()
        {
            return session_destroy();
        }

        //METODOS PARA EL LOGIN CON GOOGLE
        public function checkEmail()
        {
            $sql = "SELECT id_usuario FROM usuarios WHERE correo = ?";
            $params = array($this->correo);
            $user = Database::getRow($sql, $params);
            if($user)
            {
                $this->id_usuario = $user['id_usuario'];
                return true;
            }
            else
            {
                return false;
            }
        }

        //METODOS PARA RECUPERAR PASSWORD
        public function checkData()
        {
            $sql = "SELECT id_usuario FROM usuarios WHERE correo = ? AND usuario = ?";
            $params = array($this->correo, $this->usuario);
            $data = Database::getRow($sql, $params);
            if($data)
            {
                $this->id_usuario = $data['id_usuario'];
                return true;
            }
            else
            {
                return false;
            }
        }

        public function createToken()
        {
            $this->token = bin2hex( random_bytes( (60 - (60 % 2))/2 )); //Se crea token unico

            $sql = "UPDATE usuarios SET token = ? WHERE id_usuario = ?";
            $params = array($this->token, $this->id_usuario);
            return Database::executeRow($sql, $params);
        }

        public function checkToken()
        {
            $sql = "SELECT id_usuario FROM usuarios WHERE token = ?";
            $params = array($this->token);
            $data = Database::getRow($sql, $params);
            if($data)
            {
                $this->id_usuario = $data['id_usuario'];
                return true;
            }
            else
            {
                return false;
            }
        }

        public function changePass()
        {
            $hash = password_hash($this->password, PASSWORD_DEFAULT);
            
            $sql = "UPDATE usuarios SET password = ? WHERE id_usuario = ?";
            $params = array($hash, $this->id_usuario);
            return Database::executeRow($sql, $params);
        }
    }
?>