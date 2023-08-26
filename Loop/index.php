<?php
    // For --
    for($i=0;$i<2;$i++){
        if($i==3){
            echo '<br> A quantidade de mundias do SP é:';
        }
        echo '<br>' .$i;
    }

    echo '<hr>';

    //***********************************************************************************

    // While --
    $contador = 1;
    // while(condition){code} --
    while($contador <= 2):
        echo "Contador é $contador <br>";
        $contador++;
    // End loop --
    endwhile;

    echo "<hr>";

    //***********************************************************************************
    
    // Exercise --

    $input = 2;
    $number = 1;
    $soma = 0;
    while($number <= $input){
        $soma = ($number*$number) + $soma;
        echo "A soma é $soma <br>";
        $number++;
    }

    echo "<hr>";

    //***********************************************************************************
    
    // Do while --
    $num = 1;
    do{
        echo 'Hello <br>';
        $num++;
    } while ($num < 2);

    echo "<hr>";

    //***********************************************************************************

    // Exercise --

    $tabuada = 2;
    $i = 1;

    do{
        echo $tabuada*$i."<br>";
        $i++;
    } while($i<=3);
    echo "<hr>";

    //***********************************************************************************

    // Exercise --

    $l = 3;

    do{
        echo $l."<br>";
        $l--;
    } while($l>=1);
    echo "<hr>";

    //***********************************************************************************

    // Exercise --

?>