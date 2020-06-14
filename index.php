<?php

require_once ("php/component.php");
require_once ("php/operation.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Megashop 4 Star</h1>

        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-id-badge'></i>","customer_id", "book_id",setID()); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-book'></i>","Customer Name", "CustomerName",""); ?>
                </div>
				<div class="pt-2">
                    <?php inputElement("<i class='fas fa-map-marked-alt'></i>","Adress", "Address",""); ?>
                </div>
<!--                <div class="author_zhjoy"></div>-->
				<div class="pt-2">
                    <?php inputElement("<i class='fas fa-address-book'></i>","Phone Number", "Phone",""); ?>
                </div>
				<div class="pt-2">
                    <?php inputElement("<i class='fas fa-people-carry'></i>","Product Name", "ProductName",""); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='fas fa-file-invoice'></i>","Invoice Number", "InvoiceNumber",""); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("<i class='fas fa-dollar-sign'></i>","Price", "TotallPrice",""); ?>
                    </div>
				</div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='fas fa-hand-holding-usd'></i>","Paid Taka", "PaidTaka",""); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("<i class='fas fa-money-check-alt'></i>","Paid Amount", "PaidAmount",""); ?>
                    </div>	
                </div>
                <div class="d-flex justify-content-center">
                        <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                        <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                        <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                        <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                        <?php deleteBtn();?>
                </div>
            </form>
        </div>
        <div class="search_a"><a href="search/search.php" style="
    border: 2px solid #007bff;
    padding: 7px 40px;
">Search</a></div>
        <!-- Bootstrap table  -->
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
					<th>Address</th>
					<th>Phone Number</th>
					<th>Product Name</th>
                        <th>Invoice Number</th>
                        <th>Totall Price</th>
						<th>Paid Taka</th>
						<th>Paid Amount</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                   <?php


                   if(isset($_POST['read'])){
                       $result = getData();

                       if($result){

                           while ($row = mysqli_fetch_assoc($result)){ ?>

                               <tr>
                                   <td data-id="<?php echo $row['customer_id']; ?>"><?php echo $row['customer_id']; ?></td>
                                   <td data-id="<?php echo $row['customer_id']; ?>"><?php echo $row['CustomerName']; ?></td>
								   <td data-id="<?php echo $row['customer_id']; ?>"><?php echo $row['Address']; ?></td>
								   <td data-id="<?php echo $row['customer_id']; ?>"><?php echo $row['Phone']; ?></td>
								   <td data-id="<?php echo $row['customer_id']; ?>"><?php echo $row['ProductName']; ?></td>
                                   <td data-id="<?php echo $row['customer_id']; ?>"><?php echo $row['InvoiceNumber']; ?></td>
                                   <td data-id="<?php echo $row['customer_id']; ?>"><?php echo '$' . $row['TotallPrice']; ?></td>
								   <td data-id="<?php echo $row['customer_id']; ?>"><?php echo '$' . $row['PaidTaka']; ?></td>
								   <td data-id="<?php echo $row['customer_id']; ?>"><?php echo '$' . $row['PaidAmount']; ?></td>
                                   <td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['customer_id']; ?>"></i></td>
                               </tr>

                   <?php
                           }

                       }
                   }


                   ?>
                </tbody>
            </table>
        </div>


    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="php/main.js"></script>
</body>
</html>
<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>
