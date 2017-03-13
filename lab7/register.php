<!DOCTYPE html>
<head>
  <title>Register</title>
</head>

<body>

<form action="" method=POST>
  Name:<br>
  <input type=text name="name" required="required"> <br>
  Pass:<br>
  <input type="text" name="pass" required="required">
  <br><br>
  <input type="submit" name="submit">
</form>

<?php

if(isset($_POST['submit'])){

    include "../../CONFIG.php";

    $mysqli = new mysqli($HOST, $USER, $PASS, $DB);

    if($mysqli->connect_errno){
        echo "Connection failed on line 5";
        exit();
    }

    $query = "SELECT * FROM user WHERE user=?";
    $stmt = $mysqli->stmt_init();
    if(!$stmt->prepare($query))
    {
        exit();
    }
    $stmt->bind_param("s", $_POST['name']);
    $stmt->execute();
    $result = $stmt->get_result();
    $exists = $result->num_rows;
    echo "Found: " . $exists;

    /* If we wanted to print results:
        while ($row = $result->fetch_array(MYSQLI_NUM))
        {
            foreach ($row as $r)
            {
                echo "$r ";
            }
            echo "<br>";
        }
    */

    if($exists == 0){
        $query = "INSERT INTO user VALUES(?,?)";
        $stmt = $mysqli->stmt_init();

        if(!$stmt->prepare($query)){
            exit();
        }

        $hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);

        $stmt->bind_param("ss", $_POST['name'], $hash);

        $stmt->execute();
        echo "<hr>User created<br>";
    } else {
        echo "<hr>User name taken";
    }

    $stmt->close();
    $mysqli->close();

}

?>
