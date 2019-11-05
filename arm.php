<!DOCTYPE html>
    <head></head>
    <body>
        <form action="armstrong.php" method="POST">
            <fieldset>
                <label>Enter number:</label>
                <input type="number" name="n1" id="n1">
                <br>
                <input type="submit" value="armstrong">
 
            </fieldset>
        </form>
    </body>
</html>


<?php
  $n=$_POST['n1'];
  $sum =0;
  $ld =0;
  $temp=$n;
  while($temp>0){
      $ld=$temp%10;
      $sum = $sum+ $ld*$ld*$ld;
      $temp=$temp/10;
  }
 if($sum ==$n){
     echo "armstrong";
 }
else{
    echo" not armstrong";
}
?>
