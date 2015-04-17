<?php
/**Establece la conexion a la DB*/
class Conexion
{
	## Atributos ##
    /**
	* Host de la DB.
	* @var String
	*/
	private $_host = "localhost";
	/**
	* Usuario de la DB.
	* @var String
	*/
	private $_user = "root";
	/**
	* Password de la DB.
	* @var String
	*/
	private $_pass = "2643589rosa";
	/**
	* Nombre de la DB.
	* @var String
	*/
	private $_db_name = "yourockfm_v1";
	
	/*Referencia a conexion.*/ 
	private $_conexion;

	### Constructor ###
    public function __construct()
    {
        $this->_conexion = new mysqli($this->_host, $this->_user, $this->_pass, $this->_db_name);
        if($this->_conexion->connect_errno){
            echo "Error en la conexion: ".$this->_conexion->connect_errno." : ".$this->_conexion->connect_error;
        }
    }
	
	## Cierra la conexion, devuelve 1 se cerro con exito. ##
    public function close()
    {
        return $this->_conexion->close();
    }
	## Realiza una consulta y devuelve el resultado ##
    public function query($query)
    {
        return $this->_conexion->query($query);
    }
	## Devuelve un error. ##
    public function error()
    {
        return $this->_conexion->error;
    }
}

