<html>
<head>




<p></p>

  <title>view user posts</title>



  </head>
<br>
  <p>
    Choose a name: <br>
    <form action="viewuserpost.php" method="post">
      <select name="un">
      <?php
      $mysqli = new mysqli("MYSQL.eecs.ku.edu", "kcieslak", "password", "kcieslak");

      /* check connection */
      if ($mysqli->connect_errno) {
          echo "connnection failed";
          exit();
      }



      $query = "SELECT User_Id FROM Users ORDER BY User_Id;";



            /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */
            //
            // echo "<select>"; // list box select command
            //
            // foreach ($mysqli->query($query) as $row){//Array or records stored in $row
            //
            // echo "<option value=$row[User_Id]>$row[User_Id]</option>";
            //
            // /* Option values are added by looping through the array */
            //
            // }


      if ($result = $mysqli->query($query)) {
      	//echo "???\n";
          // echo "<select name="un">";
          /* fetch associative array */
          while ($row = $result->fetch_assoc()) {
            //  printf ("%s (%s)\n", $row["User_Id"],"\n");

      	// echo $row["User_Id"];
        // echo "<br>";
        echo "<option value=$row[User_Id]>$row[User_Id]</option>";
        // hile ($row = mysql_fetch_assoc($result)) {
        //   echo $row["userid"];
          }
          // echo "</select>";// Closing of list box

          /* free result set */
          $result->free();
      }
      else{echo "you suck.";} //this is a personal check ;)
      /* close connection */
      $mysqli->close();

      ?>
    </select>
  <input type="submit" value="Submit">
</form>



<!-- Choose a name:
<select>
 <option value="volvo">Volvo</option>
 <option value="saab">Saab</option>
 <option value="mercedes">Mercedes</option>
 <option value="audi">Audi</option>
</select>
  <input type="submit" value="Submit">
</form> -->

</p>





</html>
