<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Lägg till en ny medlem</title>
</head>

<body>
<?php
require_once('ImageText.php');


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

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

  
  $urlsnippet = 'memberfolder/';
  $generatedvalue = generateRandomString();
    

  
  	$memberName = $_GET['name'];
	$imagetext = new ImageText($memberName, 'memberfolder/' . $generatedvalue . '.png');
  	$imagetext->createImageText();
  	date_default_timezone_set("Europe/Stockholm");
  	$oneYearOn = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 365 day"));
  	echo $oneYearOn;
  
  $query='INSERT INTO members (namn, epost, url, expiryDate) VALUES ("' . $_GET['name'] . '", "' .  $_GET['mail'] . '", "' . $urlsnippet . $generatedvalue . '.html", "' . $oneYearOn . '")';
  $result = mysql_query($query);
	//echo "databas klar<br>";
	//echo $memberName;
	
	  if ($result == false)
  {
  	echo "fel i sqlsatsen";
  }
  mysql_close();
  

$ourFileHandle = fopen('memberfolder/' . $generatedvalue . '.html', 'w') or die("can't open file");
$content = "<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Russo+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel='stylesheet' type='text/css' href='membercard.css'>
<meta charset='UTF-8'>
<title>Mitt medlemskort</title>
</head>
<body> 
<div id='wrapper'>
	<div id='container'>
		<div class='container img'> <img src='/memberfolder/" . $generatedvalue . ".png'>	
		</div>
	</div>
</div> 
</body>
</html>";
fwrite($ourFileHandle,$content);
fclose($ourFileHandle);


?>
<br>
<a href="memberlist.php">Medlemslista</a><br>
<a href="addmember.php">Lägg till ny medlem</a><br>
<a href="removemember.php">Ta bort</a><br>
</body>
</html>
