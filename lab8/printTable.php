<?php
/*
 * @author Ali Raza
 * @description: Execute multiple queries on one page using a dropdown.
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

<br><br>
<form action="" method="POST" class="col-md-4 col-md-offset-5">
    <select name="dropDown">
<?php
for($i = 1; $i <= 2; $i++) {
    if(isset($_POST['dropDown']) && $_POST['dropDown']==$i) {
        echo "<option selected='selected' value='".$i."'>Query ".$i."</option>";
    }else {
        echo "<option value='".$i."'>Query ".$i."</option>"; 
    }
}
?>
    </select> <br><br>
    <input type="submit" name="submit" class="btn" value="Execute"/>
</form>

<?php

/*
 * @param sql SQL query you want to execute
 * @return The table that results from the sql query
 */
function executeQuery($sql){

    /* Include credentials file.
     * It is essential to place this file outside of 
     * the web directory so users cannot access it.
     */ 
    include "../../CONFIG.php";
    $mysqli = new mysqli($HOST, $USER, $PASS, $DB);

    if ($mysqli->connect_errno) { //Terminate script if there is a connection error
        echo "Failed to connect to MySQLI on Line 5";
        exit();
    }

    $result = $mysqli->query($sql); //Execute query

    echo "<table class='table table-hover'>"; 

    echo "Number of Results: " . $result->num_rows; //Display number of results

    // Collect column names in a while loop and place mark them as headers in out table
    while($fieldInfo = mysqli_fetch_field($result)){
        echo "<th>". $fieldInfo->name. "</th>";
    } 
    echo "</thead>";

    while($row = $result->fetch_array(MYSQLI_NUM)){ //Fetch the results as a numeric array
        echo "<tr>"; //Each element of the array is a row

        /*
         * Each row's data is stored in an array
         * Iterate that array and place each value
         * into the table
         */
        foreach($row as $r){
            echo "<td>" . $r . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
    $mysqli->close(); //Close mysql connection
}

if(isset($_POST['submit'])){

    switch($_POST['dropDown']){
    case 1: 
        $sql = "SELECT * FROM person";
        break;
    case 2: 
        $sql = "SELECT `First Name` FROM person";
        break;
    }

    executeQuery($sql);
}

?>
