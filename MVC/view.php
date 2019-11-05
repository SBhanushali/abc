<html>
	<head>
		<title>Add Employee</title>
	</head>
	<body>
		<p id="success" style="color:green"></p>
		<form name="employee_form" id="employee_form">
			<fieldset>
				<legend><h2>Details</h2></legend>
				<p id="error" style="color:red"><p>
				<label for="name">Name: </label><input type="text" name="name" id="name"/><br/><br/>
				<label for="address">Address: </label><input type="text" name="address" id="address"/><br/><br/>
				<label for="salary">Salary: </label><input type="number" name="salary" id="salary"/><br/><br/>
				<input type="submit" onclick="addEmployee(event)" value="Add Employee"/>
			</fieldset>
		</form>
		<form method="post" name="table_form">
			<input type="submit" onclick="getEmployees(event)" value="Display All Employees"/>
		</form>
		<table id="employee_table" border="1">
			
		</table>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="script.js"></script>	

	</body>
</html>