<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Borttagna medlemmar</title>
</head>

<body>
<?php

$idToRemove = $_POST['medlemmar'];
$idForSQL = "";
  if(empty($idToRemove)) {
  	echo "du valde inga medlemmar";
  }
  else {
  
  	$index = count($idToRemove);
  	
  	foreach ($idToRemove as $value) {
  	
  		if ($index<=1) {
  			$idForSQL .= $value;
  		}
  		else {
  			$idForSQL .= $value . ", ";
  			$index = $index - 1;
  		}
  		 
  	}
  	
  }
  
	mysql_connect("127.0.0.1","root","");
	mysql_select_db("rundaydb");

// Check connection
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else 
  {
  	echo "allt ok";
  }
  $query='DELETE FROM members WHERE id IN (' . $idForSQL . ')';
  $result = mysql_query($query);
  
  if ($result == false)
  {
  	echo "fel i sqlsatsen";
  }
  
  
echo "databas klar";
  mysql_close();
  
?>

</body>
</html>
