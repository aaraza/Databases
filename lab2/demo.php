<!DOCTYPE html>
<head>
  <title>Intro to PHP</title>
</head>
<body>
<?php

/* I am going to use the echo function to output HTML from within PHP.
   The code will be parsed by the PHP interpretor. 
   If there is no error in my code, the browser will output the result.
   If there is an error, the page will crash. */
echo "<h1>PHP Tutorial</h1>";

//======================================================================
// Data Types
//======================================================================

/* The boolean data type is a very common concept.
   A boolean can either have a value of true or false.
   In C, it is not present but often imitated by using an integer. */
$bool = TRUE;

if($bool){
	echo "Bool is true<br>";
} else {
	echo "Bool is false<br>";
}

echo "<hr>";

$bool = (int)$bool; //Explicit type conversion
echo $bool . "<br>";

echo "<hr>";

$int = 1;
$int2 = -1;
if($int > 2 && $int < 4){ //Conditional statement using the and operator
	echo "Value matches<br>";
} else if($int2 < 0 || $int2 > 10){ //Conditional statement using the or operator
	echo "Value 2 matches<br>";
}

echo "<hr>";

$int = 1.5; //Implicit type conversion
if(isset($int)){
	echo "Int: " . $int . "<br>";
}

echo "<hr>";

$greeting = "Hello, my name is "; //Strings
$name = "Ali";

echo $greeting . $name . "<br>";

echo "<hr>";

/* An array in PHP is actually an ordered map. 
   A map is a type that associates values to keys. */
$array = array(
		1 => $name,
		2 => $int,
	);

/* The next two lines are useful for debugging programs */
//var_dump($array); echo "<br>";
//print_r($array); echo "<br>";

echo $array[1] . "<br>";

echo "<hr>";

$map = array(
		"Name" => "Ali Raza",
		"Major" => "Computer Science",
		"Age" => 21,
	);

foreach($map as $val){
	echo $val . "<br>";
}

$int = NULL; //NULL Type
if(isset($int)){
	echo "Int: " . $int . "<br>";
}

echo "<hr>";
for($i = 1; $i <= 10; $i++){
	echo "This is iteration $i of the for loop.<br>";
}

echo "<hr>";

$i = 1;
while($i <= 10){
	echo "This is iteration $i of the while loop.<br>";
	$i++;
}

?>
</body>