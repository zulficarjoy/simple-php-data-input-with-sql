<?php
$connect = mysqli_connect("localhost", "root", "", "joy");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM books 
	WHERE CustomerName LIKE '%".$search."%'
	OR Address LIKE '%".$search."%' 
	OR Phone LIKE '%".$search."%' 
	OR ProductName LIKE '%".$search."%' 
	OR InvoiceNumber LIKE '%".$search."%'
	OR TotallPrice LIKE '%".$search."%'
	OR PaidTaka LIKE '%".$search."%'
	OR PaidAmount LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM books ORDER BY customer_id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th style="color: #fff;background-color: #343a40;border-color: #454d55;">Customer Name</th>
							<th style="color: #fff;background-color: #343a40;border-color: #454d55;">Address</th>
							<th style="color: #fff;background-color: #343a40;border-color: #454d55;">Phone</th>
							<th style="color: #fff;background-color: #343a40;border-color: #454d55;">ProductName</th>
							<th style="color: #fff;background-color: #343a40;border-color: #454d55;">InvoiceNumber</th>
							<th style="color: #fff;background-color: #343a40;border-color: #454d55;">TotallPrice</th>
							<th style="color: #fff;background-color: #343a40;border-color: #454d55;">PaidTaka</th>
							<th style="color: #fff;background-color: #343a40;border-color: #454d55;">PaidAmount</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td style="color: #fff;background-color: #343a40;border-color: #454d55;">'.$row["CustomerName"].'</td>
				<td style="color: #fff;background-color: #343a40;border-color: #454d55;">'.$row["Address"].'</td>
				<td style="color: #fff;background-color: #343a40;border-color: #454d55;">'.$row["Phone"].'</td>
				<td style="color: #fff;background-color: #343a40;border-color: #454d55;">'.$row["ProductName"].'</td>
				<td style="color: #fff;background-color: #343a40;border-color: #454d55;">'.$row["InvoiceNumber"].'</td>
				<td style="color: #fff;background-color: #343a40;border-color: #454d55;">'.$row["TotallPrice"].'</td>
				<td style="color: #fff;background-color: #343a40;border-color: #454d55;">'.$row["PaidTaka"].'</td>
				<td style="color: #fff;background-color: #343a40;border-color: #454d55;">'.$row["PaidAmount"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>