<?php 
class Receta extends Validator{
    // public variable
    private $id_receta = null;
    private $id_registro = null;
    private $edad = null;
    private $peso = null;
    private $fecha = null;
    private $estado = null;
    private $medicamentos = null;

    // ID RECETA
    public function setIdReceta($value){
        if($this->validateId($value)){
            $this->id_receta = $value;
            return true;
        }
        else{
            return false;
        }
    }
    public function getIdReceta(){
        return $this->id_receta;
    }
    // ID REGISTRO
    public function setIdRegistro($value){
        if($this->validateId($value)){
            $this->id_registro = $value;
            return true;
        }
        else{
            return false;
        }
    }
    public function getIdRegistro(){
        return $this->id_registro;
    }
    // EDAD
    public function setEdad($value){
        if($this->validateNumeric($value)){
            $this->edad = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getEdad(){
        return $this->edad;
    }
    // PESO
    public function setPeso($value){
        if($this->validateMoney($value)){
            $this->peso = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getPeso(){
        return $this->peso;
    }
    // FECHA
    public function setFecha($value){
        if($this->validateFecha($value)){
            $this->fecha = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getFecha(){
        return $this->fecha;
    }
    // ESTADO
    public function setEstado($value){
        if($this->validateEstado($value)){
            $this->estado = $value;
            return true;
        }else{
            return false;
        }
    }
    public function getEstado(){
        return $this->estado;
    }
    // MEDICAMENTOS
    public function setMedicamentos($value){
        $this->medicamentos = $value;
        return true;
        // if($this->validateAlphanumeric($value)){
        //     $this->medicamentos;
        //     return true;
        // }else{
        //     return false;
        // }
    }
    public function getMedicamentos(){
        return $this->medicamentos;
    }

    public function readRecetas(){
        $query = "SELECT R.id_receta as id_receta, RA.nombre as nombre_animal, RA.especie as especie, 
        RA.sexo as sexo, RA.raza as raza, CONCAT(P.nombres, ' ',P.apellidos) as nombre_propietario, 
        R.edad as edad, R.peso as peso, R.fecha as fecha_recetas, R.medicamentos as medicamentos 
        FROM recetas as R 
        INNER JOIN registro_animales as RA ON R.id_registro_animal = RA.id_registro_animal 
        INNER JOIN propietarios AS P ON P.id_propietario = RA.id_propietario WHERE R.estado = 1";
        $params = array();
        return Database::getRows($query, $params);
    }

    public function readRegistro(){
        $query = "SELECT id_registro_animal, nombre FROM registro_animales WHERE estado = 1";
        $params = array();
        return Database::getRows($query, $params);
    }

    public function readRecetaForId(){
        $query = "SELECT id_registro_animal, edad, peso, fecha, estado, medicamentos FROM recetas WHERE id_receta = ? AND estado = 1";
        $params = array($this->id_receta);
        $recetas = Database::getRow($query, $params);
        if($recetas){
            $this->id_registro = $recetas['id_registro_animal'];
            $this->edad = $recetas['edad'];
            $this->peso = $recetas['peso'];
            $this->fecha = $recetas['fecha'];
            $this->estado = $recetas['estado'];
            $this->medicamentos = $recetas['medicamentos'];
            return true;
        }else{
            return false;
        }
    }

    public function create(){
        $query = "INSERT INTO recetas (id_registro_animal, edad, peso, fecha, estado, medicamentos) VALUES (?,?,?,?,?,?)";
        $params = array($this->id_registro, $this->edad, $this->peso, $this->fecha, $this->estado, $this->medicamentos);
        return Database::executeRow($query, $params); 
    }

    public function update(){
        $query = "UPDATE recetas SET id_registro_animal = ? , edad = ? , peso = ? , fecha = ? , estado = ? , medicamentos = ? WHERE id_receta = ?";
        $params = array($this->id_registro, $this->edad, $this->peso, $this->fecha, $this->estado, $this->medicamentos, $this->id_receta);
        return Database::executeRow($query, $params);
    }

    public function delete(){
        $query = "UPDATE recetas SET estado = 0 WHERE id_receta = ?";
        $params = array($this->id_receta);
        return Database::executeRow($query, $params);
    }
}
?>