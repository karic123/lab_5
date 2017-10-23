<?php
$mysqli = new mysqli("MYSQL.eecs.ku.edu", "kcieslak", "password", "kcieslak");

/* check connection */
if ($mysqli->connect_errno) {
    echo "connnection failed";
    exit();
}

echo "Here are their posts: <br>";
$query = "SELECT content FROM Posts WHERE author_Id = '$_POST[un]';";
if ($result = $mysqli->query($query)) {
	//echo "???\n";
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
      //  printf ("%s (%s)\n", $row["User_Id"],"\n");
	echo $row["content"];
  echo "<br>";
  // hile ($row = mysql_fetch_assoc($result)) {
  //   echo $row["userid"];
    }

    /* free result set */
    $result->free();
}
else{echo "you suck.";} //this is a personal check ;)

/* close connection */
$mysqli->close();
?>
