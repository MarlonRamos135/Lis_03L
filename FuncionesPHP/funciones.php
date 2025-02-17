<?php 
    function calcularDistanciaEntrePuntos($x0, $y0, $x1=0,$y1=0){
        return sqrt(pow($x0 - $x1,2) + pow($y0 - $y1,2));
    }

    function calcularMediaVarianza(...$numeros){
        $n = count($numeros);
        if($n == 0){
            return 0;
        }
        $suma = array_sum($numeros);
        $promedio = $suma/$n;

        $suma_numerador = 0;

        foreach($numeros as $num){
            $suma_numerador += pow($num, 2);
        }

        $varianza = ($suma_numerador/$n) - pow($promedio,2);

        return [$promedio, $varianza];
    }

    function factorialRecursivo($n){
        if($n==0 || $n == 1){
            return 1;
        }
        else{
            return $n*factorialRecursivo($n-1);
        }
    }

    echo "La distancia del punto (3,5) al origen es ".calcularDistanciaEntrePuntos(3,5);
    echo "<br>La distancia del punto (3,5) al (1,1) es ".calcularDistanciaEntrePuntos(3,5,1,1);
    $resultado = calcularMediaVarianza(10,12,14,16,18);
    echo "<br>El promedio es: ".$resultado[0];
    echo "<br>La varianza es: " .$resultado[1];
    echo "<br>El factorial de 6 es: ".factorialRecursivo(6);
?>