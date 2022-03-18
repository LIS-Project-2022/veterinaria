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
            if(validateId($value))
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
            if(validateAlphanumeric($value, 1, 1000))
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

        //-------------------------------------------------- ID_REGISTRO_ANIMAL ---------------------------------------------------
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
        public function getIdRegistroAnimal()
        {
            return $this->id_registro_animal;
        }
        //FIN DE METODO GET DE ID_REGISTRO_ANIMAL

        //-------------------------------------------------- PESO ---------------------------------------------------
        //METODO SET DE PESO
        public function setPeso($value)
        {
            if(validateDecimal($value))
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