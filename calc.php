<!DOCTYPE html>
<head>
    <script type="text/javascript">
    function validate(){
        var n1= document.myform.n1.value;
        if (n1==""){
            alert("enter number");
            return false;
        }
        var n2= document.myform.n2.value;
        if (n2==""){
            alert("enter number");
            return false;
        }
         return true;
    }
    </script>
</head>
 <body>
     <form action="calculator.php" method="post" name="myform" onsubmit="return validate()">
         <fieldset>
             <label>
                 number1
             </label>
             <input type="number" name="n1" id="n1">
             <br>
             <label>number2</label>
             <input type="number" name="n2" id="n2">
             <br>
             <input type="submit" name="submit" value="add">
             <input type="submit" name="submit" value="sub">
             <br>
             <input type="submit" name="submit" value="mul">
             <input type="submit" name="submit" value="div">
         </fieldset>
     </form>
 </body>
 
</html>
 


<?php
    $n1= $_POST['n1'];
    $n2=$_POST['n2'];
    $op= $_POST['submit'];
    if ($op=='add'){
        $sum=$n1+$n2;
        echo $sum;    
    }
    elseif($op=='sub'){
        $sub=$n1-$n2;
        echo $sub;
    }
 
    elseif($op=='mul'){
        $m=$n1*$n2;
        echo $m;
    }
    elseif($op=='div'){
        $d=$n1/$n2;
        echo $d;
    }
 
?>

