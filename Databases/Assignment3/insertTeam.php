<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment 3 NHL</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Inserting New Team...</h1>
<?php
$newName = $_POST["teamname"];
$newCity = $_POST["teamcity"];
$query1 = 'SELECT MAX(team_ID) AS maxid FROM Team';
$result = pg_query($query1);
if (!$result) {
   die("database max query failed.");
}
$row = pg_fetch_array($result);
$newkey = intval($row["maxid"])+1;
$newID = (string)$newkey;
$query = "INSERT INTO team VALUES('" . $newID . "','" . $newCity . "','" . $newName . "')";
if (!pg_query($query)) {
    die("Error: insert failed-->" . pg_last_error($connection));
}
echo "Your team was added!";
pg_close($connection);
?>
</ol>
</body>
</html>

