<?php
	if(isset($_POST['submit'])){
        include "../../CONFIG.php";
        $mysqli = new mysqli($HOST, $USER, $PASS, $DB);
        if ($mysqli->connect_errno) { //Terminate script if there is a connection error
            echo "Failed to connect to MySQLI on Line 5";
            exit();
        }
		$query = "UPDATE person SET `Last Name`=? WHERE `First Name`=?";
    	$stmt = $mysqli->stmt_init();
    	if(!$stmt->prepare($query))
    	{
    		echo "Failed";
        	exit();
    	}
    	$stmt->bind_param("ss", $_POST['lName'], $_POST['fName']);
    	$stmt->execute() or die ($mysqli->error);
        echo ("Update succesful!");

	}
?>
<br>
<a href="http://cs3380.rnet.missouri.edu/~aardz6/lab9/">Search User</a>
