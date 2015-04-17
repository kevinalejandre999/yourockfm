<?php
/**Clase que representa una programacion de Radio.*/
Class Programacion
{
	/**
	* Id en DB.
	* @var int
	*/
	public $prog_id;
	/**
	* Nombre de Programacion.
	* @var String
	*/
	public $nombre;
	/**
	* Descripcion general.
	* @var String
	*/
	public $descripcion;
	/**
	* @var int
	*/
	public $hora_inicio;
	/**
	* @var int
	*/
	public $hora_fin;
	/**
	* define si la programacion esta actualmente al aire.
	* @var boolean
	*/
	public $en_aire;
	/**
	* Lista de los conductores de la programacion.
	* @var String
	*/
	public $conductores;
	
	/**
	* Funcion toString.
	*/
	public function __toString()
	{	
		//if($this->en_aire === "1"){ $this->en_aire = true; } else { $this->en_aire = false; }	// para colocar false o true
		return json_encode($this, JSON_PRETTY_PRINT);
	}
}