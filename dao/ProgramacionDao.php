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
        return json_encode($programaciones);
    }
	
	/** Inserta una programacion */
	public function insert($programacion)
    {
        $result = $this->_conexion->query("

                INSERT INTO programaciones VALUES(DEFAULT,'".$programacion->nombre."','".$programacion->descripcion."','".$programacion->hora_inicio."','".$programacion->hora_fin."','".$programacion->conductores."','".$programacion->prog_img."','".$programacion->cond_img."');
                
        ");
		$respuesta = "";
        if($result) {
			$programacion->prog_id = $this->_conexion->new_id();
            $respuesta = json_encode($programacion);
        } else {
			$res=array('error'=>"No se modificaron los datos: ".$this->_conexion->error());
			$respuesta = json_encode($res);
        }
		$this->_conexion->close();
		return $respuesta;
    }
	
	/** Modifica una programacion */
	public function update($programacion)
    {
		$sql="";
		if($programacion->prog_img=="" && $programacion->cond_img==""){
			$sql= "UPDATE programaciones SET nombre='".$programacion->nombre."', descripcion='".$programacion->descripcion."', 	hora_inicio='".$programacion->hora_inicio."', hora_fin='".$programacion->hora_fin."', conductores='".$programacion->conductores."', prog_img=prog_img, cond_img=cond_img WHERE prog_id=".$programacion->prog_id.";";
		} 
		if($programacion->prog_img=="" && $programacion->cond_img!=""){
			$sql= "UPDATE programaciones SET nombre='".$programacion->nombre."', descripcion='".$programacion->descripcion."', 	hora_inicio='".$programacion->hora_inicio."', hora_fin='".$programacion->hora_fin."', conductores='".$programacion->conductores."', prog_img=prog_img, cond_img='".$programacion->cond_img."' WHERE prog_id=".$programacion->prog_id.";";
		}
		if($programacion->prog_img!="" && $programacion->cond_img==""){
			$sql= "UPDATE programaciones SET nombre='".$programacion->nombre."', descripcion='".$programacion->descripcion."', 	hora_inicio='".$programacion->hora_inicio."', hora_fin='".$programacion->hora_fin."', conductores='".$programacion->conductores."', prog_img='".$programacion->prog_img."', cond_img=cond_img WHERE prog_id=".$programacion->prog_id.";";
		}
		if($programacion->prog_img!="" && $programacion->cond_img!=""){
			$sql= "UPDATE programaciones SET nombre='".$programacion->nombre."', descripcion='".$programacion->descripcion."', 	hora_inicio='".$programacion->hora_inicio."', hora_fin='".$programacion->hora_fin."', conductores='".$programacion->conductores."', prog_img='".$programacion->prog_img."', cond_img='".$programacion->cond_img."' WHERE prog_id=".$programacion->prog_id.";";
		}
        $resp = $this->_conexion->query($sql);
		$respuesta = "";
        if($resp) {
			$sql = "SELECT * FROM programaciones WHERE prog_id=".$programacion->prog_id;
           	$result = $this->_conexion->query($sql);
			while($prog = $result->fetch_object("Programacion")){
            	$respuesta = json_encode($prog);
			}
        } else {
			$res=array('error'=>"No se modificaron los datos: ".$this->_conexion->error());
			$respuesta = json_encode($res);
        }
		$this->_conexion->close();
		return $respuesta;
    }
	
	/** Elimina una programacion */
	public function delete($prog_id)
    {
        $result = $this->_conexion->query("

                DELETE FROM programaciones WHERE prog_id=".$prog_id.";
                
        ");
		$res = array('delete'=>true,'error'=>'');
        if($result) {
            $respuesta = json_encode($res);
        } else {
			$res['delete']=false;
			$res['error']="No se modificaron los datos: ".$this->_conexion->error();
			$respuesta = json_encode($res);
        }
		$this->_conexion->close();
		return $respuesta;
    }
}