<?php
require_once("Conexion.php");
/** 
* Realiza las consultas.
* Utiliza la conexion que es optenida a traves del constructor por parametro
* y la programacion que es instanciada utilizando los datos recuperados
*/
class ProgramacionDao
{
	## Atributos ##
	/**
	* Referencia a la conexion.
	*/
	private $_conexion;
	
	## Constructor ##
	public function __construct($conexion)
	{
		$this->_conexion = $conexion;
	}
	
	 /** Devuelve un array de Programacion */
	  public function get_all()
    {
        $programaciones = array();
        $sql = "SELECT * FROM programaciones ORDER BY prog_id DESC;";
        $result = $this->_conexion->query($sql);
        while($dep = $result->fetch_object("Programacion")){
            $programaciones[] = $dep;
        }
		$this->_conexion->close();
        return json_encode($programaciones,JSON_PRETTY_PRINT);
    }
	
	/** Inserta una programacion */
	public function insert($programacion)
    {
        $result = $this->_conexion->query("

                INSERT INTO programaciones VALUES(DEFAULT,'".$programacion->nombre."','".$programacion->descripcion."','".$programacion->hora_inicio."','".$programacion->hora_fin."','".$programacion->conductores."');
                
        ");
		$respuesta = "";
        if($result) {
			$programacion->prog_id = $this->_conexion->new_id();
            $respuesta = json_encode($programacion,JSON_PRETTY_PRINT);
        } else {
			$respuesta = "No se insertaron los datos: ".$this->_conexion->error();
        }
		$this->_conexion->close();
		return $respuesta;
    }
}