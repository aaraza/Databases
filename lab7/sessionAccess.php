<?php

session_start();

if(isset($_SESSION['name'])){
    echo $_SESSION['name'] . "<br>";
    echo "<a href='http://cs3380.rnet.missouri.edu/~aardz6/lab7/'>Return Home</a>";

}
else{
    echo "Session not created yet<br>";
    echo "<a href='http://cs3380.rnet.missouri.edu/~aardz6/lab7/'>Return Home</a>";
}

session_destroy();

?>
