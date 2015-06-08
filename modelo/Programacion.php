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
	* Conductores de la programacion.
	* @var String
	*/
	public $conductores;
	/**
	* logo del programa
	* @var String
	*/
	public $prog_img;
	/**
	* foto de los conductores
	* @var String
	*/
	public $cond_img;
	
	/**
	* Funcion toString.
	*/
	public function __toString()
	{	
		return json_encode($this);
	}
}