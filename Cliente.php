<?php

class Cliente {
    private $nombreCliente;
    private $apellido;
    private $esDadoDeBaja;
    private $tipoCliente;
    private $dni;

    public function __construct($nombreCliente, $apellido, $esDadoDeBaja, $tipoCliente, $dni)
    {
        $this->nombreCliente = $nombreCliente;
        $this->apellido = $apellido;
        $this->esDadoDeBaja = $esDadoDeBaja;
        $this->tipoCliente = $tipoCliente;
        $this->dni = $dni;
    }

    public function getNombreCliente(){
        return $this->nombreCliente;
    }

    public function getApellido()
    {
            return $this->apellido;
    }

    public function getEsDadoDeBaja()
    {
            return $this->esDadoDeBaja;
    }

    public function getTipoCliente()
    {
            return $this->tipoCliente;
    }

    public function getDni()
    {
            return $this->dni;
    }

    public function setNombreCliente($nombreCliente)
    {
        $this->nombreCliente = $nombreCliente;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setTipoCliente($tipoCliente)
    {
        $this->tipoCliente = $tipoCliente;
    }

    public function setEsDadoDeBaja($esDadoDeBaja)
    {
        $this->esDadoDeBaja = $esDadoDeBaja;
    }

    public function setDNI($dni)
    {
        $this->dni = $dni;
    }

    public function __toString()
    {
        return "NOMBRE CLIENTE: " . $this->getNombreCliente() . "\n" . 
        "APELLIDO DEL CLIENTE: " . $this->getApellido() . "\n" .
        "FUE DADO DE BAJA: " . $this->getEsDadoDeBaja() . "\n" . 
        "TIPO DE CLIENTE: " . $this->getTipoCliente() . "\n" .
        "DNI: " . $this->getDni()
        ;
    }
}