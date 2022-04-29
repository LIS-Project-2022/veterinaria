<?php
    class Consulta extends Validator{
        //-----------------------------------------------------------------------------------------------------------------
        //------------------------------------------- DECLARACION DE ATRIBUTOS --------------------------------------------
        //-----------------------------------------------------------------------------------------------------------------
        private $id_consulta = null;
        private $diagnostico = null;
        private $fecha = null;
        private $id_registro_animal = null;
        private $peso = null;
        private $estado = 1;

        //------------------------------------------------------------------------------------------------------------------
        //------------------------------------------ METODOS DE ENCAPSULAMIENTO --------------------------------------------
        //------------------------------------------------------------------------------------------------------------------

        //-------------------------------------------------- ID_CONSULTA ---------------------------------------------------
        //METODO SET DE ID_CONSULTA
        public function setIdConsulta($value)
        {
            if($this->validateId($value))
            {
                $this->id_consulta = $value;
                return true;
            }
            else
            {
                return false;
            }
        }
        //FIN DE METODO SET DE ID_CONSULTA

        //METODO GET DE ID_CONSULTA
        public function getIdConsulta()
        {
            return $this->id_consulta;
        }
        //FIN DE METODO GET DE ID_CONSULTA

        //-------------------------------------------------- DIAGNOSTICO ---------------------------------------------------
        //METODO SET DE DIAGNOSTICO
        public function setDiagnostico($value)
        {
            if($this->validateAlphanumeric($value, 1, 1000))
            {
                $this->diagnostico = $value;
                return true;
            }
            else
            {
                return false;
            }
        }
        //FIN DE METODO SET DE DIAGNOSTICO

        //METODO GET DE DIAGNOSTICO
        public function getDiagnostico()
        {
            return $this->diagnostico;
        }
        //FIN DE METODO GET DE DIAGNOSTICO

        //-------------------------------------------------- FECHA ---------------------------------------------------
        //METODO SET DE FECHA
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
        //FIN DE METODO SET DE FECHA

        //METODO GET DE FECHA
        public function getFecha()
        {
            return $this->fecha;
        }
        //FIN DE METODO GET DE FECHA

        //-------------------------------------------------- ID_REGISTRO_ANIMAL ---------------------------------------------------
        //METODO SET DE ID_REGISTRO_ANIMAL
        public function setIdRegistroAnimal($value)
        {
            if($this->validateId($value))
            {
                $this->id_registro_animal = $value;
                return true;
            }
            else
            {
                return false;
            }
        }
        //FIN DE METODO SET DE ID_REGISTRO_ANIMAL

        //METODO GET DE ID_REGISTRO_ANIMAL
        public function getIdRegistroAnimal()
        {
            return $this->id_registro_animal;
        }
        //FIN DE METODO GET DE ID_REGISTRO_ANIMAL

        //-------------------------------------------------- PESO ---------------------------------------------------
        //METODO SET DE PESO
        public function setPeso($value)
        {
            if($this->validateDecimal($value))
            {
                $this->peso = $value;
                return true;
            }
            else
            {
                return false;
            }
        }
        //FIN DE METODO SET DE PESO

        //METODO GET DE PESO
        public function getPeso()
        {
            return $this->peso;
        }
        //FIN DE METODO GET DE PESO

        //-------------------------------------------------- ESTADO ---------------------------------------------------
        //METODO SET DE ESTADO
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
        //FIN DE METODO SET DE ESTADO

        //METODO GET DE ESTADO
        public function getEstado()
        {
            return $this->estado;
        }
        //FIN DE METODO GET DE ESTADO

        //-----------------------------------------------------------------------------------------------------------------
        //------------------------------------------ METODOS PARA EL CRUD -------------------------------------------------
        //-----------------------------------------------------------------------------------------------------------------
        public function getPacientes()
        {
            $sql = "SELECT id_registro_animal, nombre FROM registro_animales";
            $params = array();
            return Database::getRows($sql, $params);
        }

        public function getPropietario()
        {
            $sql = "SELECT p.nombres, p.apellidos FROM registro_animales ra 
                INNER JOIN propietarios p ON ra.id_propietario = p.id_propietario 
                WHERE ra.id_registro_animal = ?";
            $params = array($this->id_registro_animal);
            return Database::getRows($sql, $params);
        }

        public function getConsultaForId()
        {
            $sql = "SELECT id_registro_animal, peso, diagnostico FROM consultas WHERE id_consulta = ?";
            $params = array($this->id_consulta);
            $consulta = Database::getRow($sql, $params);
            if($consulta)
            {
                $this->id_registro_animal = $consulta['id_registro_animal'];
                $this->peso = $consulta['peso'];
                $this->diagnostico = $consulta['diagnostico'];
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getConsultas()
        {
            $sql = "SELECT c.id_consulta, ra.nombre, CONCAT(p.nombres, ' ', p.apellidos) as propietario, c.fecha FROM consultas c 
                INNER JOIN registro_animales ra ON c.id_registro_animal = ra.id_registro_animal
                INNER JOIN propietarios p ON ra.id_propietario = p.id_propietario
                WHERE c.estado = 1";
            $params = array();
            return Database::getRows($sql, $params);
        }

        public function create()
        {
            $today = new DateTime(null, new DateTimeZone(date_default_timezone_get()));
            $sql = "INSERT INTO consultas( diagnostico, fecha, id_registro_animal, peso) VALUES (?, ?, ?, ?)";
            $params = array($this->diagnostico, $today->format('y-m-d'), $this->id_registro_animal, $this->peso);
            return Database::executeRow($sql, $params);
        }

        public function update()
        {
            $sql = "UPDATE consultas SET diagnostico = ?, id_registro_animal = ?, peso = ? WHERE id_consulta = ?";
            $params = array($this->diagnostico, $this->id_registro_animal, $this->peso, $this->id_consulta);
            return Database::executeRow($sql, $params);
        }

        public function delete()
        {
            $sql = "UPDATE consultas SET estado = 0 WHERE id_consulta = ?";
            $params = array($this->id_consulta);
            return Database::executeRow($sql, $params);
        }

        
    }
?>