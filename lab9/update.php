<a href="http://cs3380.rnet.missouri.edu/~aardz6/lab9/">Search User</a>
<hr>

<?php

if(isset($_POST['update'])){
	$id = $_POST['fName'];
	include "../../CONFIG.php";
	$mysqli = new mysqli($HOST, $USER, $PASS, $DB);

	if ($mysqli->connect_errno) { //Terminate script if there is a connection error
	    echo "Failed to connect to MySQLI on Line 5";
	    exit();
	}

	$sql = "SELECT * FROM person WHERE `First Name`='$id'";
	$result = $mysqli->query($sql) or die ($mysqli->error);
	$row = $result->fetch_array(MYSQLI_NUM) or die ($mysqli->error);
	?>
	<form action="handleUpdate.php" method="POST">
	  <input type='text' readonly name="fName" value= <?= $row[0] ?> >
	  <input type='text' name="lName" value= <?= $row[1] ?> >
	  <input type='submit' name='submit' value='Update Record'>
	 </form>

<?php

} 
?>