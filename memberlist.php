<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Namnlöst dokument</title>
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
  
  echo "<table>";
  echo "<tr>";
  
  while( ($row = mysql_fetch_array($result)))
  {
  	echo "<tr>";
  	echo "<td>".$row['id']."</td>";
  	echo "<td>".$row['namn']."</td>";
  	echo "<td>".$row['epost']."</td>";
  	echo "<td><a href=".$row['url'].">URL</a></td>";
	echo "</tr>";
  }
  echo "</tr>";
  echo "</table>";
  mysql_close();
?>



<a href="memberlist.php">Medlemslista</a><br>
<a href="addmember.php">Lägg till ny medlem</a><br>
<a href="removemember.php">Ta bort</a><br>
</body>
</html>
