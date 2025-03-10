<?php
// Definición de la clase empleado
class empleado {
    private static $idEmpleado = 0;
    private $nombre;
    private $apellido;
    private $isss;
    private $renta;
    private $afp;
    private $sueldoNominal;
    private $sueldoLiquido;
    private $pagoxhoraextra;
    private $prestamo;

    // Declaración de constantes para los descuentos del empleado
    const descISSS = 0.03;
    const descRENTA = 0.075;
    const descAFP = 0.0625;

    function __construct(){
        self::$idEmpleado++;
        $this->nombre = "";
        $this->apellido = "";
        $this->sueldoLiquido = 0.0;
        $this->pagoxhoraextra = 0.0;
        $this->prestamo = 0.0;
    }

    function obtenerSalarioNeto($nombre, $apellido, $salario, $horasextras, $pagoxhoraextra=0.0, $prestamo=0.0){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->pagoxhoraextra = $horasextras * $pagoxhoraextra;
        $this->sueldoNominal = $salario;
        $this->prestamo = $prestamo;

        $salarioTotal = $salario + $this->pagoxhoraextra;
        $this->isss = $salarioTotal * self::descISSS;
        $this->afp = $salarioTotal * self::descAFP;
        
        $salariocondescuento = $salarioTotal - ($this->isss + $this->afp);
        if ($salariocondescuento > 2038.10) {
            $this->renta = $salariocondescuento * 0.3;
        } elseif ($salariocondescuento > 895.24) {
            $this->renta = $salariocondescuento * 0.2;
        } elseif ($salariocondescuento > 472.00) {
            $this->renta = $salariocondescuento * 0.1;
        } else {
            $this->renta = 0.0;
        }

        $this->sueldoLiquido = $salarioTotal - ($this->isss + $this->afp + $this->renta + $this->prestamo);
        $this->imprimirBoletaPago();
    }

    function imprimirBoletaPago(){
        echo "<table class='table'><tr>";
        echo "<td>Id empleado: </td><td>" . self::$idEmpleado . "</td></tr>";
        echo "<tr><td>Nombre empleado: </td><td>" . $this->nombre . " " . $this->apellido . "</td></tr>";
        echo "<tr><td>Salario nominal: </td><td>$ " . number_format($this->sueldoNominal, 2) . "</td></tr>";
        echo "<tr><td>Salario por horas extras: </td><td>$ " . number_format($this->pagoxhoraextra, 2) . "</td></tr>";
        echo "<tr><td>Descuento ISSS: </td><td>$ " . number_format($this->isss, 2) . "</td></tr>";
        echo "<tr><td>Descuento AFP: </td><td>$ " . number_format($this->afp, 2) . "</td></tr>";
        echo "<tr><td>Descuento renta: </td><td>$ " . number_format($this->renta, 2) . "</td></tr>";
        
        if ($this->prestamo > 0) {
            echo "<tr><td>Descuento préstamo: </td><td>$ " . number_format($this->prestamo, 2) . "</td></tr>";
        }
        
        echo "<tr><td>Sueldo líquido a pagar: </td><td>$ " . number_format($this->sueldoLiquido, 2) . "</td></tr>";
        echo "</table>";
    }
}
?>
