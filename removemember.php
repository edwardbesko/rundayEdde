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
  $query="SELECT * FROM members";
  $result = mysql_query($query);
  
  echo "<form action='membersRemoved.php' method='post'>";
  echo "<table>";
  
  
  while( ($row = mysql_fetch_array($result)))
  {
  	echo "<tr>";
  	echo "<td><input type='checkbox' name='medlemmar[]' value='" . $row['id'] . "'></td>";
  	echo "<td>".$row['id']."</td>";
  	echo "<td>".$row['namn']."</td>";
  	echo "<td>".$row['epost']."</td>";
  	echo "<td>".$row['url']."</td>";
	echo "</tr>";
  }
  
	echo "<input type='submit' name='formSubmit' value='Ta bort!'>";
	
  echo "</table>";
  echo "</form>";
  mysql_close();
  
  
  
?>
<br><br>




<a href="memberlist.php">Medlemslista</a><br>
<a href="addmember.php">Lägg till ny medlem</a><br>
<a href="removemember.php">Ta bort</a><br>
</body>
</html>
