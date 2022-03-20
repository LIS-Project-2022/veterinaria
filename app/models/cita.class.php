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
            if(validateId($value))
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
            return $this->id_cita;
        }
        //FIN DE METODO GET DE ID_CITA

        //----------------------------------------------- ID_REGISTRO_ANIMAL -----------------------------------------------
        //METODO SET DE ID_REGISTRO_ANIMAL
        public function setIdRegistroAnimal($value)
        {
            if(validateId($value))
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
            return $this->id_registro_animal;
        }
        //FIN DE METODO GET DE ID_REGISTRO_ANIMAL

        //----------------------------------------------------- FECHA ------------------------------------------------------
        //METODO SET DE FECHA
        public function setFecha($value)
        {
            if(validateFecha($value))
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
            if(validateFecha($value))
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
        public function setIdTipoFecha($value)
        {
            if(validateId($value))
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
        public function getIdTipoFecha()
        {
            return $this->id_tipo_cita;
        }
        //FIN DE METODO GET DE ID_TIPO_CITA

        //-------------------------------------------------------- ESTADO ------------------------------------------------------
        //METODO SET DE ESTADO
        public function setEstado($value)
        {
            if(validateFecha($value))
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

        public function create(){}

        public function update(){}

        public function delete(){}
    }
?>