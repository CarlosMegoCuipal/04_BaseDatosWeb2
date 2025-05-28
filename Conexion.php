<?php

class conexion{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "ejemplo_web2";

    private $conexion;
    
    public function __construct() {
        $this->conexion = new mysqli($this->servername, 
                                    $this->username, 
                                    $this->password, 
                                    $this->dbname);
        if ($this->conexion->connect_error) {
            die("Conexion Fallida Error: ". $this->conexion->connect_error);
            $this->conexion->connect_error;
        }

    }  
    
    public function getConexion(){
        return $this->conexion;
    }

    public function __destuct() {
        $this->conexion -> close();
        echo "Se destruyó la conexión";
    }
}