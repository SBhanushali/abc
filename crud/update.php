<?php
  // php code to Update data from mysql database Table
  if(isset($_POST['update'])) {
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
    
    // get values form input text and number
    
    $fname = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $ins = $_POST["ins"];
            
    // mysql query to Update data
    $temp = "UPDATE users SET fname=:fname, email=:email ,gender=:gender WHERE insno=:insno";
    $query = $db -> prepare($temp);
    $query -> bindParam(":fname",$fname);
    $query -> bindParam(":email",$email);
    $query -> bindParam(":gender",$gender);
    $query -> bindParam(":insno",$ins);
    $status = $query -> execute();    
    if($status)
    {
      echo 'Data Updated';
    } else {
      echo 'Data Not Updated';
    }
  }
?>

<!DOCTYPE HTML>  
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    .error {
      color: #FF0000;
    }
  </style>
  </head>
  <body>
    <?php
      $nameErr = $emailErr = $genderErr = $insErr = "";
      $name = $email = $gender = $ins = "";

      if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["name"])) {
          $nameErr = "Name is required";
        } else {
          $name = test_input($_POST["name"]);
        }
        
        if(empty($_POST["email"])) {
          $emailErr = "Email is required";
        } else {
          $email = test_input($_POST["email"]);
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
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

    <h2>To Update Data</h2>
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
      <input type="submit" name="update" value="submit">
    </form>
  </body>
</html>
