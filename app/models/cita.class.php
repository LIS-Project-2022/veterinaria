<?php
    class Cita extends Validator{
        //-----------------------------------------------------------------------------------------------------------------
        //------------------------------------------- DECLARACION DE ATRIBUTOS --------------------------------------------
        //-----------------------------------------------------------------------------------------------------------------
        private $id_cita = null;
        private $id_registro_animal = null;
        private $fecha = null;
        private $hora = null;
        private $id_tipo_cita = null;
        private $estado = 1;

        //------------------------------------------------------------------------------------------------------------------
        //------------------------------------------ METODOS DE ENCAPSULAMIENTO --------------------------------------------
        //------------------------------------------------------------------------------------------------------------------

        //--------------------------------------------------- ID_CITA ------------------------------------------------------
        //METODO SET DE ID_CITA
        public function setIdCita($value)
        {
            if($this->validateId($value))
            {
                $this->id_cita = $value;
                return true;
            }
            else
            {
                return false;
            }
        }
        //FIN DE METODO SET DE ID_CITA

        //METODO GET DE ID_CITA
        public function getIdCita()
        {
            $query = "SELECT citas.id_cita, registro_animales.nombre,citas.fecha,citas.hora,tipos_cita.tipo_cita FROM citas INNER JOIN registro_animales on citas.id_registro_animal = registro_animales.id_registro_animal INNER JOIN tipos_cita on citas.id_tipo_cita = tipos_cita.id_tipo_cita";
            $params = array();
            return Database::getRows($query, $params);
        }

        public function getCitabyID()
        {
            $query = "SELECT id_cita, id_registro_animal, fecha, hora, id_tipo_cita, estado FROM citas";
            $params = array();
            return Database::getRows($query, $params);
        }
        //FIN DE METODO GET DE ID_CITA

        //----------------------------------------------- ID_REGISTRO_ANIMAL -----------------------------------------------
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
        public function getIdregistroAnimal()
        {
            // return $this->id_registro_animal;
            $query = "SELECT id_registro_animal, nombre FROM registro_animales WHERE estado = 1";
            $params = array();
            return Database::getRows($query, $params);
        }
        //FIN DE METODO GET DE ID_REGISTRO_ANIMAL

        //----------------------------------------------------- FECHA ------------------------------------------------------
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

        //-------------------------------------------------------- HORA -------------------------------------------------------
        //METODO SET DE HORA
        public function setHora($value)
        {
            // if($this->validateHora($value))
            if($value)
            {
                $this->hora = $value;
                return true;
            }
            else
            {
                return false;
            }
        }
        //FIN DE METODO SET DE HORA

        //METODO GET DE HORA
        public function getHora()
        {
            return $this->hora;
        }
        //FIN DE METODO GET DE HORA

        //------------------------------------------------------ ID_TIPO_CITA -------------------------------------------------
        //METODO SET DE ID_TIPO_CITA
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
        //FIN DE METODO SET DE ID_TIPO_CITA

        //METODO GET DE ID_TIPO_CITA
        public function getIdTipoCita()
        {
            $query = "SELECT id_tipo_cita, tipo_cita FROM tipos_cita WHERE estado = 1";
            $params = array();
            return Database::getRows($query, $params);
        }
        //FIN DE METODO GET DE ID_TIPO_CITA

        //-------------------------------------------------------- ESTADO ------------------------------------------------------
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

        public function get(){}

        public function create(){
            $query = "INSERT citas( id_registro_animal, fecha, hora, id_tipo_cita, estado) 
            VALUES (?, ?, ?, ?, ?)";
            $params = array($this->id_registro_animal, $this->fecha, $this->hora, $this->id_tipo_cita, $this->estado);
            return Database::executeRow($query, $params);
        }

        public function update(){
            $query = "UPDATE citas SET id_registro_animal = ?, fecha = ?, hora = ?, id_tipo_cita = ? WHERE id_cita = ?";
            $params = array($this->id_registro_animal, $this->fecha, $this->hora, $this->id_tipo_cita, $this->id_cita);
            return Database::executeRow($query, $params);
        }

        public function delete(){
            $query = "DELETE FROM citas WHERE id_cita = ?";
            $params = array($this->id_cita);
            return Database::executeRow($query, $params);
        }
    }
?>