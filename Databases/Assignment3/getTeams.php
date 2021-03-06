<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Ordered Teams</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<?php
  if (isset($_POST["order"])){
     $order = $_POST["order"];
     $query='SELECT * FROM Team ORDER BY '.$order.'';
     $result = pg_query($query);
     if (!$result) {
        die ("Database query failed!");
     }
     
     echo "<ol>";
     $fieldname = pg_field_name($result,0);
     echo ($fieldname." | ".(pg_field_name($result,1))." | ".(pg_field_name($result,2)));
     while ($row = pg_fetch_row($result)) {
        echo("<li>");
        echo $row[0]." | ".$row[1]." | ".$row[2]."</li>";
     }
     echo "</ol>";
     echo ("Teams ordered by ".$order);
     pg_free_result($result);
  }
  else{
     echo ("Teams ordered by default");
     $query='SELECT * FROM Team';
     $result = pg_query($query);
     if (!$result) {
        die ("Database query failed!");
     }
     echo "<ol>";
     while ($row = pg_fetch_row($result)) {
        echo("<li>");
        echo $row[0]." | ".$row[1]." | ".$row[2]."</li>";
     }
     echo "</ol>";
     pg_free_result($result);     
  }
  
?>
</ol>
<?php
   pg_close($connection);
?>
</body>
</html>
