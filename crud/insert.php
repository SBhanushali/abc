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
      $nameErr = $emailErr = $genderErr = $insErr = "";
      $name = $email = $gender = $ins = "";

      if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["name"])) {
          $nameErr = "Name is required";
        }else {
          $name = test_input($_POST["name"]);
        }

        if(empty($_POST["email"])) {
          $emailErr = "Email is required";
        }else {
          $email = test_input($_POST["email"]);
          //check if e-mail address is well-formed
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
          }
        }
          
        if(empty($_POST["gender"])) {
          $genderErr = "Gender is required";
        } else {
          $gender = test_input($_POST["gender"]);
        }

        if(empty($_POST["ins"])) {
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
    <h2>PHP Form Validation</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      Name: <input type="text" name="name" value="<?php echo $name;?>">
      <span class="error">* <?php echo $nameErr;?></span>
      <br><br>
      E-mail: <input type="text" name="email" value="<?php echo $email;?>">
      <span class="error">* <?php echo $emailErr;?></span>
      <br><br>
      Insurance Number: <input type="text" name="ins" value="<?php echo $ins;?>">
      <span class="error">* <?php echo $insErr;?></span>
      <br><br>
      Gender:
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male 
      <span class="error">* <?php echo $genderErr;?></span>
      <br><br>
      <input type="submit" name="submit" value="Insert">
    </form>
    <br>
    <form action="update.php">
      <input type="submit" name="update" value="Update"> 
    </form>
    <br>
    <form action="delete.php">
      <input type="submit" name="delete" value="Delete">
    </form>
    <?php
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

      if(isset($_POST["submit"])) {
        // prepare and bind
        $fname = $_POST["name"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $ins = $_POST["ins"];
        
        $query = "INSERT INTO users VALUES (:fname, :email, :gender, :insno)";
        $stmt = $db->prepare($query);
        $stmt -> bindParam(":fname",$fname,PDO::PARAM_STR);
        $stmt -> bindParam(":email",$email,PDO::PARAM_STR);
        $stmt -> bindParam(":gender",$gender,PDO::PARAM_STR);
        $stmt -> bindParam(":insno",$ins,PDO::PARAM_STR);
        $stmt -> execute();
        if($status) {
          echo "Records Entered Successfully";
        } else {
          echo "An error occured";
        }
      } 
    ?>
  </body>
</html>
