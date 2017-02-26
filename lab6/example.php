<?php

include "../../CONFIG.php";

$mysqli = new mysqli($HOST, $USER, $PASS, $DB);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQLI on Line 5";
    exit();
}

$query = "SELECT * FROM person";
$result = $mysqli->query($query);

while ($fieldinfo=mysqli_fetch_field($result)){
    echo $fieldinfo->name . " " ;
}  

echo "<br>";

while($row = $result->fetch_array(MYSQLI_NUM)){
    foreach($row as $r){
        echo $r . "  ";
    }
    echo "<br>";
}

?>
