<?php

include_once 'Venta.php';

class Moto {
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcionMoto;
    private $porcentajeIncAnual;
    private $esActivo; //atributo que va a ser true si esta disponible para la venta, caso contrario false

    public function __construct($codigo, $costo, $anioFabricacion, $descripcionMoto, $porcentajeIncAnual, $esActivo)
    {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcionMoto = $descripcionMoto;
        $this->porcentajeIncAnual = $porcentajeIncAnual;
        $this->esActivo = $esActivo;
    }


    public function getCodigo()
    {
            return $this->codigo;
    }


    public function getCosto()
    {
            return $this->costo;
    }


    public function getAnioFabricacion()
    {
            return $this->anioFabricacion;
    }


    public function getDescripcionMoto()
    {
            return $this->descripcionMoto;
    }


    public function getPorcentajeIncAnual()
    {
            return $this->porcentajeIncAnual;
    }


    public function getEsActivo()
    {
            return $this->esActivo;
    }


    public function setCodigo($codigo)
    {
            $this->codigo = $codigo;
    }


    public function setCosto($costo)
    {
            $this->costo = $costo;
    }


    public function setAnioFabricacion($anioFabricacion)
    {
            $this->anioFabricacion = $anioFabricacion;
    }

 
    public function setDescripcionMoto($descripcionMoto)
    {
            $this->descripcionMoto = $descripcionMoto;
    }


    public function setPorcentajeIncAnual($porcentajeIncAnual)
    {
            $this->porcentajeIncAnual = $porcentajeIncAnual;
    }

 
    public function setEsActivo($esActivo)
    {
            $this->esActivo = $esActivo;

    }

    public function darPrecioVenta(){
        $precioFinal = 0;
        $disponibilidad = $this->getEsActivo();
        if(!$disponibilidad){
            $precioFinal = -1;
        }else{
            $costoMoto = $this->getCosto();
            $precioFinal = $costoMoto + $costoMoto * ($this->getAnioFabricacion() * $this->getPorcentajeIncAnual());
        }
        return $precioFinal;
    }

    public function __toString()

    {
        if($this->getEsActivo()){
            $status = "SI";
        }else{
            $status = "NO";
        }
        if($this->darPrecioVenta() == -1){
            $statusPrecio = "NO DISPONIBLE";
        }else {
            $statusPrecio = $this->darPrecioVenta();
        }
        return "\n-----------------------------------\n" 
        . "CODIGO: " . $this->getCodigo() . "\n" .
        "COSTO SIN INCREMENTO: " . $this->getCosto()	 . "\n" .
        "COSTO INCREMENTADO (porcentaje incremento anual): " . $statusPrecio . "\n" .
        "AÑO DE FABRICACION: " . $this->getAnioFabricacion() . "\n" .
        "DESCRIPCION: " . $this->getDescripcionMoto() . "\n" .
        "PORCENTAJE DE INCREMENTO ANUAL: " . $this->getPorcentajeIncAnual() . "\n" .
        "ESTÁ DISPONIBLE: " . $status . "\n";
    }
}