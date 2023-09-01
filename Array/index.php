<?php
    //Arrays

    // To create an array, you can use array() -
    $carros = array("Gol", "Uno", "Fiesta", 14, 20.8, false, true);

    // You can't use echo to show arrays in its full extension -
    // echo $carros; - It shows a warning message;

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
    echo "<hr>";

    //*******************************************************************************************

    // Functions with array --
    $nomes = ["Pai"=>"João", "Irmão"=>'Pedro', "Primo"=>'Carlos', "Mãe"=>'Maria'];

    // It checks if it's a array--
    echo is_array($nomes); // -- 1 it's true, 0 it's false;
    echo '<hr>';
    var_dump($nomes);
    echo '<hr>';

    // It checks if exists in the array--
    echo in_array("Carlos", $nomes);
    echo '<hr>';
    if(in_array("Rodrigo", $nomes)){
        echo "There's a name like this here";
    } else {
        echo "There's no name like this here";
    }
    echo '<hr>';

    // It saves the keys of an array -- 
    $subjects = ['DD', 'CMS', 'PHP', 'JS'];
    $keys = array_keys($subjects);
    print_r($keys);
    echo '<hr>';
    $family = array_keys($nomes);
    print_r($family);
    echo '<hr>';

    //*******************************************************************************************

    // Exercise:

    $arr1 = ["a"=> "cadeira", "2"=> "mesa", "3"=> "balcão"];
    $arr2 = ["a"=> "sofá", "b"=> "tv", "c"=> "tapete"];

    if(array_keys($arr1) === array_keys($arr2)){
        echo "Keys are identical";
    } else {
        echo "Keys aren't identical";
    }
    echo "<hr>";
    
    //*******************************************************************************************

    $veiculos = ["opala", "corcel", "chevett"];
    $anos = ["1975", '1980', "1993"];
    // You merge the arrays --
    $merge = array_merge($veiculos, $anos);
    print_r($merge);
    echo "<hr>";

    //*******************************************************************************************

    // Exercise:

    $infoAntiga = ["Tel"=>"55 11 99022-5294", "End."=>"Avenida Interlagos, 871", "Owner"=>"Robert Renan"];
    $infoNova = ["Tel"=>"55 11 99530-5370", "Spouse"=>"Marie Jane"];
    print_r(array_merge($infoAntiga, $infoNova));

    echo '<hr>';

    //*******************************************************************************************

    $arr = [1,2,3,4];
    // Reverse the array --
    print_r(array_reverse($arr));

    echo '<hr>';
?>