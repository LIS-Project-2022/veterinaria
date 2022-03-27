<?php
    class RegistroAnimal extends Validator{
        private $id_registro_animal = null;
        private $nombre = null;
        private $especie = null;
        private $sexo = null;
        private $raza = null;
        private $color = null;
        private $fecha_naci = null;
        private $id_propietario = null;
        private $estado = null;

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

        public function getIdRegistroAnimal()
        {
            return $this->id_registro_animal;
        }

        public function setNombre($value)
        {
            if($this->validateAlphabetic($value, 1, 50))
            {
                $this->nombre = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function setEspecie($value)
        {
            if($this->validateAlphabetic($value, 1, 25))
            {
                $this->especie = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getEspecie()
        {
            return $this->especie;
        }

        public function setSexo($value)
        {
            if($this->validateAlphabetic($value, 1, 15))
            {
                $this->sexo = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getSexo()
        {
            return $this->sexo;
        }

        public function setRaza($value)
        {
            if($this->validateAlphabetic($value, 1, 25))
            {
                $this->raza = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getRaza()
        {
            return $this->raza;
        }

        public function setColor($value)
        {
            if($this->validateAlphabetic($value, 1, 25))
            {
                $this->color = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getColor()
        {
            return $this->color;
        }

        public function setFechaNaci($value)
        {
            if($this->validateFecha($value))
            {
                $this->fecha_naci = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getFechaNaci()
        {
            return $this->fecha_naci;
        }

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

        public function getAnimales()
        {
            $query = "SELECT RA.id_registro_animal, RA.nombre, CONCAT(P.nombres, ' ', P.apellidos), P.telefono, RA.sexo, RA.especie FROM registro_animales RA 
            INNER JOIN propietarios P ON RA.id_propietario = P.id_propietario WHERE RA.estado = 1";
            $params = array();
            return Database::getRows($query, $params);
        }

        public function getAnimal()
        {
            $query = "SELECT nombre, sexo, especie, raza, color, fecha_naci, id_propietario FROM registro_animales WHERE id_registro_animal = ?";
            $params = array($this->id_registro_animal);
            $animal = Database::getRow($query, $params);
            if($animal)
            {
                $this->id_propietario = $animal['id_propietario'];
                $this->nombre = $animal['nombre'];
                $this->especie = $animal['especie'];
                $this->sexo = $animal['sexo'];
                $this->raza = $animal['raza'];
                $this->color = $animal['color'];
                $this->fecha_naci = $animal['fecha_naci'];
                return true;
            }
            else
            {
                return false;
            }
        }

        public function create()
        {
            $query = "INSERT registro_animales(nombre, especie, sexo, raza, color, fecha_naci, id_propietario) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $params = array($this->nombre, $this->especie, $this->sexo, $this->raza, $this->color, $this->fecha_naci, $this->id_propietario);
            return Database::executeRow($query, $params);
        }
        public function update()
        {
            $query = "UPDATE registro_animales SET nombre = ?, especie = ?, sexo = ?, raza = ?, color = ?, fecha_naci = ? WHERE id_registro_animal = ?";
            $params = array($this->nombre, $this->especie, $this->sexo, $this->raza, $this->color, $this->fecha_naci, $this->id_registro_animal);
            return Database::executeRow($query, $params);
        }

        public function delete()
        {
            $query = "UPDATE registro_animales SET estado = 0 WHERE id_registro_animal = ?";
            $params = array($this->id_registro_animal);
            return Database::executeRow($query, $params);
        }
    }
?>