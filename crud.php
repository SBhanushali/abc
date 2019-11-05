<html>
<head>
	<title>Exp 6: CRUD operations using php</title>
</head>
<body>
	<form method="post" id="Form1">
    	<h2>Client Form</h2>
    	<div>
        	<label>Name:</label>
        	<input type="text" placeholder="Enter Name" name="fullname" id="Name">
    	</div>
    	<div>
        	<label>Address:</label>
        	<input type="text" placeholder="Enter Address" id="Address" name="add">
    	</div>
    	<div>
        	<label>Salary:</label>
        	<input type="number" placeholder="Enter Salary" id="Salary" name="salary">
    	</div>
    	<input name="submit" type="submit" value="SUBMIT" id="btn">
	</form>
    
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script>
    	$(document).ready(function(){
        	$("#btn").click(function(e){
   	 
           	$(".error").remove();
           	var name = $("#Name").val();
           	if(name === "")
           	{
                	e.preventDefault();
                	$("#Name").focus();
                	$("#Name").after("<span class='error' style='color:red'>Enter Correct Name</span>");
           	}
           	var addr = $("#Address").val();
           	if(addr === "")
           	{
                	e.preventDefault();
                	$("#Address").focus();
                	$("#Address").after("<span class='error' style='color:red'>Enter Correct Address</span>");
           	}
           	var sal = $('#Salary').val();
           	if(sal <= 0)
           	{
                	e.preventDefault();
                	$("#Salary").focus();
                	$("#Salary").after("<span class='error' style='color:red'>Enter Correct Salary</span>");
           	}
        	});
    	});
	</script>
   </body>
</html>
<?php
	$server = "localhost";
	$username = "root";
	$password = "ubuntu";
	$connection = mysqli_connect(
    	$server,$username,$password,"crud"
	);
	if(!$connection){
    	die('ERROR: coonection failed'.mysqli_connect_error());
	}
    
	if(isset($_POST['submit']))
	{
    	$name = $_POST['fullname'];
    	$address = $_POST['add'];
    	$salary = $_POST['salary'];
    	//echo $name;
   	 
    	$insert_query = "INSERT INTO employee VALUES('$name','$address','$salary')";
   	 
    	if(mysqli_query($connection,$insert_query)){
        	//echo "Value added into database succesfully";
    	}
   	 
    	$query = "SELECT * from employee";
    	$result_query = mysqli_query($connection,$query);
   	 
    	if(mysqli_num_rows($result_query) > 0)
    	{
   		 echo "<table border=1>";
        	while($row = mysqli_fetch_assoc($result_query)){
            	echo "<tr><td>".$row['name']."</td><td>".$row['address']."</td><td>".$row['salary']."</td></tr>";
        	}
        	echo "</table>";
    	}
	}
?>
