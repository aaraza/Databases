<?php

include "../../CONFIG.php";

$mysqli = new mysqli($HOST, $USER, $PASS, $DB);

if($mysqli->connect_errno){
	echo "Connection failed on line 5";
	exit();
}

$sql = "SELECT * FROM person;";
$result = $mysqli->query($sql);

echo "<table>";

while($fieldInfo = mysqli_fetch_field($result)){
	echo "<th>" . $fieldInfo->name . "</th>";
}

while($row = $result->fetch_array(MYSQLI_NUM)){
	echo "<tr>";
	foreach($row as $data){
		echo "<td>" . $data . "</td>";
	}
	echo "</tr>";
}

?>