function addEmployee(e) {
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "controller.php?action=save&",
		data: $("#employee_form").serialize()
	})
	.done(function(response) {
		$("#success")[0].innerHTML=response;
	});
}

function getEmployees(e) {
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "controller.php?action=display&"
	})
	.done(function(response) {
		result = JSON.parse(response);
		html = "<tr><th>Name</th><th>Address</th><th>Salary</th></tr>";
		for (let row of result) {
			html+="<tr>";
			html+="<td>"+row['name']+"</td>";
			html+="<td>"+row['address']+"</td>";
			html+="<td>"+row['salary']+"</td>";
			html+="</tr>";
		}
		$('#employee_table')[0].innerHTML=html;
		$("#success")[0].innerHTML="success";
	});
}
