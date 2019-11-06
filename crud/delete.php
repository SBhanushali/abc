<?php
  if(isset($_POST['delete']))
  {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname="insurance";

    // Create connection and check
    try{
      $db=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    }
    catch(PDOException $e){
      echo("Connection Failed:" . $e->getMessage());
    }
      
    $ins = $_POST["ins"];
    // sql to delete a record
    $sql = "DELETE FROM users WHERE insno = :ins";
    $query = $db -> prepare($sql);
    $query -> bindParam(":ins",$ins);
    $status = $query -> execute();
    if($status) {
      echo "Records deleted successfully";
    } else {
      echo "An error occurred while deleting the record";
    }
  }
?>


<!DOCTYPE HTML>  
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
  <style>
  .error {color: #FF0000;}
  </style>
  </head>
  <body>  
    <?php
      $insErr = "";
      $ins = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        if (empty($_POST["ins"])) {
          $insErr = "Insurance number is required";
        } else {
          $ins = test_input($_POST["ins"]);
        }
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>
    <h2>To Delete Data</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      Insurance Number: <input type="text" name="ins" value="<?php echo $ins;?>">
      <span class="error">* <?php echo $insErr;?></span>
      <br>
      <input type="submit" name="delete" value="submit">
    </form>
  </body>
</html>
