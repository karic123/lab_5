
<?php
$mysqli = new mysqli("MYSQL.eecs.ku.edu", "kcieslak", "password", "kcieslak");

/* check connection */
if ($mysqli->connect_errno) {
  echo "connnection failed";
  exit();
}
else{echo "connection is good.<br>";}
$username = $_POST['un'];
echo $username . "<br>";
$checkuser = "SELECT User_Id FROM Users WHERE User_Id='$username';";//I DON'T KNOW WHY THIS WON'T WORK :c
//$check = "SELECT CASE WHEN User_Id = '$username' THEN 1 ELSE 0 END AS bit FROM Users;";
$result = mysqli_query($mysqli, $checkuser);
// $row = mysqli_fetch_row($mysqli, $checkuser);
//echo mysqli_rows($result)
//echo $result . "why isn't this working??? <br>";
//if($mysqli->query($checkuser) == 1)
if($result->fetch_assoc())
{
  echo "user exists!!!<br>";
  $post = $_POST['post'];
  if($post != ""){
    echo "post is valid!<br>";
      $sql = "INSERT INTO Posts (author_Id, content)
      VALUES ('$_POST[un]','$_POST[post]');";

      if (mysqli_query($mysqli, $sql)) {
          echo "New record created successfully<br>";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($mysqli) . "<br>";
      }
    }
   else {
    echo "Error: Input cannot be blank.<br>";
  }

} else {
  echo "Error: That user does not exist.<br>";
}

  //else{echo "you suck.";} //this is a personal check ;)

  /* close connection */
  $mysqli->close();
  ?>
