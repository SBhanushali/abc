
<!DOCTYPE html>
<head>
</head>
<body>
    <form action="prime.php", method="post">
        <fieldset>
            <label> Number1</label>
            <input type="number" name="n" id="n">
            <label> Number2</label>
            <input type="number" name="no" id="no">
            <input type="submit" value="prime check">
        </fieldset>
    </form>
</body>
</html>


<?php
$n1=$_POST['n'];
$n2=$_POST['no'];
for ($j=$n1; $j<=$n2 ;$j++){
    $count=0;
    for ($i=2; $i<$j;$i++){
        $count=$count+1;
    }
    if($count>0){
        echo $j."<br>";
    }
}
 
?>
