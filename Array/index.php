<?php
    //Arrays

    // To create an array, you can use array() -
    $carros = array("Gol", "Uno", "Fiesta", 14, 20.8, false, true);

    // You cant use echo to show arrays in its full extension -
    // echo $animais; - It shows a warning message;

    // You can use var_dump() and see all its informations -
    var_dump($carros);
    echo "<br>";

    // You can use print_r to display arrays, showing its index and values -
    print_r($carros);

    // Or use specific index positions to write using both of them -
    echo '<br>'.$carros[2].'<br>';
    print_r($carros[1]);
    echo "<hr>";

    //*******************************************************************************************

    // You can also use [] to create arrays -
    $animais = ['cachorro', 'gato', 'elefante'];
    // To add nem elements to the array, use [] at the name: $var[] = "newElement" -
    $animais[] = "leão";
    // You can even choose the position that you want to put  it, replacing or creating others -
    $animais[8] = "jacaré";
    
    print_r($animais);
    echo '<br>'.$animais[2];
    echo '<hr>';

    //*******************************************************************************************
    
    // You can also choose the index of each element, when creating -
    $cervejas = array(1=>'Brahma', 2=>"Skol" );
    $cervejas[] = "heineken";
    //$cervejas[3] = "heineken"; -  Would work too, having the same result;
    print_r($cervejas);
    echo '<br>'.$cervejas[2];
    echo '<hr>';

    //*******************************************************************************************

    // You can also create empty arrays and add elements to it after -
    $motos = array();
    $motos [] = "Yamaha";
    $motos []= "Kawasaki";
    $motos []= "Ducati";
    print_r($motos);
    echo "<hr>";

    //*******************************************************************************************

    // You can count the lenght of the array -
    echo 'A quantidade de motos é: '.count($motos);
    echo "<br>";
    echo 'A quantidade de animais é: '.count($animais);
    echo "<br>";
    echo 'A quantidade de cervejas é: '.count($cervejas);
?>