<?php
/**Clase que representa una Visita a la pagina.*/
Class Visita
{
	/**
	* Id en DB.
	* @var int
	*/
	public $vist_id;
	/**
	* @var String
	*/
	public $anio;
	/**
	* @var String
	*/
	public $mes;
	/**
	* @var String
	*/
	public $dia;
	/**
	* @var String
	*/
	public $hora;
	/**
	* @var String
	*/
	public $minuto;
	/**
	* @var String
	*/
	public $segundo;
	/**
	* @var String
	*/
	public $ip;
	/**
	* @var String
	*/
	public $navegador;
	/**
	* @var String
	*/
	public $sesion_id;
	
	/**
	* Funcion toString.
	*/
	public function __toString()
	{	
		return json_encode($this, JSON_PRETTY_PRINT);
	}
}