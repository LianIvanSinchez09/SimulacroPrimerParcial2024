<?php

include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'Empresa.php';

$objCliente1 = new Cliente("Lian Ivan", "Sinchez", True, "Soltero", 4353623);
$objCliente2 = new Cliente("Lautaro", "Montesino", false, "Soltero", 123456789);

$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 0.85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 0.70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 0.55, false);

$colMotos = [$objMoto1, $objMoto2, $objMoto3];
$colClientes = [$objCliente1, $objCliente2];
$colVentasRealizadas = [];
$colCodigosMoto = [$objMoto1->getCodigo(),$objMoto2->getCodigo(), $objMoto3->getCodigo()];


$empresa = new Empresa("Alta Gama", "Av Argentina 123", $colMotos, $colClientes, $colVentasRealizadas);
$empresa->registrarVenta($colCodigosMoto, $objCliente1);
$empresa->registrarVenta($colCodigosMoto[0], $objCliente1);
$empresa->registrarVenta($colCodigosMoto[2], $objCliente1);
$empresa->retornarVentasXCliente($objCliente1->getTipoCliente(), $objCliente1->getDni());
$empresa->retornarVentasXCliente($objCliente2->getTipoCliente(), $objCliente2->getDni());

echo $empresa;