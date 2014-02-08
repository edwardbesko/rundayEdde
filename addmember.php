<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Lägg till en ny medlem</title>
</head>

<body>
<form action="executeAdd.php?namn=" method="get">
  Namn: <input type="text" name="name"><br>
  E-post: <input type="text" name="mail"><br>
    URL: <input type="text" name="url"><br>
  <input type="submit" value="Submit">
</form>

<a href="memberlist.php">Medlemslista</a><br>
<a href="addmember.php">Lägg till ny medlem</a><br>
<a href="removemember.php">Ta bort</a><br>

</body>
</html>
