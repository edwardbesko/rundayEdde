<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Lägg till en ny medlem</title>
</head>

<body>
<?php

// Create connection
mysql_connect("127.0.0.1","root","");
mysql_select_db("rundaydb");

// Check connection
if (mysqli_connect_errno())
  {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else 
  {
  	echo "allt ok";
  }
  $query='DELETE FROM members WHERE id = "' . $_GET['id'] . '"';
  $result = mysql_query($query);
  
  if ($result == false)
  {
  	echo "fel i sqlsatsen";
  }
  
  
echo "databas klar";
  mysql_close();
?>
<a href="index.php">Start</a><br>
<a href="memberlist.php">Medlemslista</a><br>
<a href="addmember.php">Lägg till ny medlem</a><br>
<a href="removemember.php">Ta bort</a><br>
</body>
</html>
