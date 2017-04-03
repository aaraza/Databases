<?php
/*
 * @author Ali Raza
 * @description: Insert to Database
 */
?>

<html>
    <head>
        <!--  I USE BOOTSTRAP BECAUSE IT MAKES FORMATTING/LIFE EASIER -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
    </head>

<body class="container">
<br>
<a href="http://cs3380.rnet.missouri.edu/~aardz6/lab9/index.php">Search</a>
<hr>
<form action="" method=POST>
  First Name:<br>
  <input type=text name="fname" required="required"> <br>
  Last Name:<br>
  <input type="text" name="lname" required="required">
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
    $query = "SELECT * FROM person WHERE `First Name`=? AND `Last Name`=?";
    $stmt = $mysqli->stmt_init();
    if(!$stmt->prepare($query))
    {
        exit();
    }
    $stmt->bind_param("ss", $_POST['fname'], $_POST['lname']);
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
        $query = "INSERT INTO person VALUES(?,?)";
        $stmt = $mysqli->stmt_init();
        if(!$stmt->prepare($query)){
            exit();
        }
        $stmt->bind_param("ss", $_POST['fname'], $_POST['lname']);
        $stmt->execute();
        echo "<hr>User created<br>";
    } else {
        echo "<hr>User name taken";
    }
    $stmt->close();
    $mysqli->close();
}
?>