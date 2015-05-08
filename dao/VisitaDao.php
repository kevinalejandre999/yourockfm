<?php
require_once("Conexion.php");
/** 
* Realiza las consultas.
* Utiliza la conexion que es optenida a traves del constructor por parametro
* y la programacion que es instanciada utilizando los datos recuperados
*/
class VisitaDao
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
	
	 /** Devuelve un array de Visistas */
	  public function get_all()
    {
        $visitas = array();
        $sql = "SELECT * FROM visitas ORDER BY vist_id DESC LIMIT 100;";
        $result = $this->_conexion->query($sql);
        while($visit = $result->fetch_object("Visita")){
            $visitas[] = $visit;
        }
		$this->_conexion->close();
        return json_encode($visitas,JSON_PRETTY_PRINT);
    }
	
	/** Inserta una visita */
	public function insert($visita)
    {
        $result = $this->_conexion->query("

                INSERT INTO visitas VALUES(DEFAULT,'".$visita->anio."','".$visita->mes."','".$visita->dia."','".$visita->hora."','".$visita->minuto."','".$visita->segundo."','".$visita->ip."','".$visita->navegador."','".$visita->sesion_id."');
                
        ");
		$respuesta = "";
        if($result) {
			$visita->vist_id = $this->_conexion->new_id();
            $respuesta = json_encode($visita,JSON_PRETTY_PRINT);
        } else {
			$res=array('error'=>"No se guardaron los datos: ".$this->_conexion->error());
			$respuesta = json_encode($res,JSON_PRETTY_PRINT);
        }
		$this->_conexion->close();
		return $respuesta;
    }
}