<?php

include_once 'Moto.php';
include_once 'Cliente.php';
include_once 'Venta.php';

class Empresa {
    private $denominacion;
    private $direccion;
    private $colMotos;
    private $colClientes;
    private $precioFinal;

    public function __construct($denominacion, $direccion, $colMotos , $colClientes , $precioFinal)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colMotos[] = $colMotos;
        $this->colClientes[] = $colClientes;
        $this->precioFinal = $precioFinal;
    }

    public function getDenominacion()
    {
            return $this->denominacion;
    }

    public function setDenominacion($denominacion)
    {
            $this->denominacion = $denominacion;
    }

    public function getDireccion()
    {
            return $this->direccion;
    }

    public function setDireccion($direccion)
    {
            $this->direccion = $direccion;
    }

    public function getColClientes()
    {
            return $this->colClientes;
    }

    public function setColClientes($colClientes)
    {
            $this->colClientes[] = $colClientes;
    }

    public function getColMotos()
    {
        return $this->colMotos;
    }

    public function setColMotos($colMotos)
    {
            $this->colMotos[] = $colMotos;
    }

    public function getprecioFinal()
    {
            return $this->precioFinal;
    }

    public function setprecioFinal($precioFinal)
    {
            $this->precioFinal = $precioFinal;
    }


    /** RETORNA LA MOTO BUSCADA CON EL CODIGO ESPECIFICO DE LA MOTO PUESTO EN PARAMETROS
     * 
     */

    public function retornarMoto($codigoMoto){
        $esMotoEncontrada = false;
        $motoEncontrada = null;
        $colMotosContenido = $this->getColMotos();
        $i = 0;
        while($i < count($colMotosContenido) && !$esMotoEncontrada){
          $moto = $colMotosContenido[$i];
          $codigoComprobar = $moto->getCodigo();
          if($codigoComprobar == $codigoMoto){
            $esMotoEncontrada = true;
            $motoEncontrada = $colMotosContenido[$i];
          }
          $i++;
        }
        return $motoEncontrada;
    }

    public function registrarVenta($colCodigosMoto, Cliente $objCliente){
        $colMotos = $this->getColMotos();
        $c = 0;
        $newVenta = null;
        while($c < count($colMotos) && !$objCliente->getEsDadoDeBaja()){
            if($colMotos[$c]->getCodigo() == $colCodigosMoto[$c] && $colMotos[$c]->getEsActivo()){
                $newVenta = new Venta(123, "20-02-2022", $objCliente, $colMotos[$c], $colMotos[$c]->darPrecioVenta());
                $this->setprecioFinal($newVenta->getPrecioFinalVenta());
            }
            $c++;
        }
        return $newVenta;
    }

    public function retornarVentasXCliente($tipo,$numDoc){
        $coleccionClientes = $this->getColClientes();
        $contador = 0;
        $ventaClientes = null;
        while($contador < count($coleccionClientes)){
            $clientObj = $coleccionClientes[0][$contador];
            $clientObjTipo = $clientObj->getTipoCliente();
            print_r($clientObjTipo);
            if($clientObjTipo == $tipo && $clientObjTipo == $numDoc){
                $ventaClientes = $coleccionClientes[$contador]->getColVentas();
            }
            $contador++;
        }
        return $ventaClientes;
    }

    public function __toString()
    {
        return "DENOMINACION: " . $this->getDenominacion() . "\n" .
        " DIRECCION: " . $this->getDireccion() . "\n" . 
        " COLECCION MOTOS: " . print_r($this->getColMotos()) . "\n" .
        " COLECCION CLIENTES: " . print_r($this->getColClientes()) . "\n" .
        " VENTAS REALIZADAS: " . print_r($this->getprecioFinal());
    }

}