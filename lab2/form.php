<!DOCTYPE html>
<html> 
<head>
  <title>Forms</title>
</head>
<body>
<form action="" method="POST">
  First Name<br>
  <input type="text" name="firstname" required="required"><br>
  Last Name<br>
  <input type="text" name="lastname" required="required"><br>
  <input type="radio" name="gender" value="m" checked="checked"> Male<br>
  <input type="radio" name="gender" value="f"> Female<br>
  <input type="radio" name="gender" value="o"> Other<br>
  <select name="school">
    <option value="Engineering"> Engineering</option>
    <option value="Journalism"> Journalism</option>
    <option value="Other"> Other</option>
  </select><br><br>
  <input type="submit" name="submit">
</form>

<?php

if(isset($_POST['submit'])){
	echo $_POST['firstname'] . "<br>";
	echo $_POST['lastname'] . "<br>";
	echo $_POST['gender'] . "<br>";
	//echo $_POST['school'] . "<br>";
	switch($_POST['school']){
	  case "Engineering":
	    echo "You are an engineering student";
	    break;
	  case "Journalism":
	    echo "You are a journalism student";
	    break;
	  default:
	    echo "You study something else";
	}
}

?>