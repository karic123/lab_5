<?php
$mysqli = new mysqli("MYSQL.eecs.ku.edu", "kcieslak", "password", "kcieslak");

/* check connection */
if ($mysqli->connect_errno) {
  echo "connnection failed";
  exit();
}
$removal = $_POST['remove'];
$len = count($removal);
$counter = 0;

if($len > 0){
  for($i = 0; $i < $len; $i++){
    $sql = sprintf("DELETE FROM Posts  WHERE post_Id = '%s';", $removal[$i]);
    if($poop = mysqli_query($mysqli, $sql)){
      echo $removal[$i] . " was deleted. <br>";
      $counter++;
    }
  }
  if ($counter == $len) {

    echo " All posts deleted successfully.<br>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli) . "<br><br>";
  }
}
else {
  echo "Nothing was deleted.<br>";
}
?>
