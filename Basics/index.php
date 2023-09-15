<?php 
	//To declare variables use $ -
	$name = "Bruno";

	//You cant declare variables using -
	//$ v ar - (space)
	//$1nota - (number)
	//$%var¨ - (special caracters)

	//*****************************************************************************************

	//To write text, or even html and other codes, use echo 'text' and "."(dot) to concatenate -
	echo 'Hello, '.$name;
	echo '<hr>';

	$nota1 = 0;
	$nota2 = 8;
	$media = ($nota1+$nota2)/2;

	//You can use double quotes "" and you won't need to concatenate - 
	echo "A média é $media";
	echo "<hr>";

	//*****************************************************************************************

	// Dinamic variables
	$bebida = "refrigerante";
	//You transform the value of the first var (in this case, "refrigerante") into a variable-
	$$bebida = "coca-cola";

	echo $bebida; // You'll print "refrigerante";
	echo '<br>';
	echo $refrigerante; // You'll print "coca-cola", using "refrigerante" as variable;
	echo '<hr>';

	//*****************************************************************************************

	// You can use var_dump() to see informations about the var, as type, lenght, etc -
	$nome = "Pizza";
	var_dump($nome);
	echo "<br>";
	$idade = 20;
	var_dump($idade);
	echo "<br>";
	$price = 23.6;
	var_dump($price);
	echo "<br>";
	$isHandsome = true;
	var_dump($isHandsome);
?>