<?php

require_once ("db.php");
require_once ("component.php");

$con = Createdb();

// create button click
if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}

if(isset($_POST['deleteall'])){
    deleteAll();

}

function createData(){
    $customername = textboxValue("CustomerName");
	$address = textboxValue("Address");
	$phonenumber = textboxValue("Phone");
	$productname = textboxValue("ProductName");
    $invoicenumber = textboxValue("InvoiceNumber");
    $totallprice = textboxValue("TotallPrice");
	$paidtaka = textboxValue("PaidTaka");
	$paidamount = textboxValue("PaidAmount");

    if($customername && $address && $phonenumber && $productname && $invoicenumber  && $totallprice && $paidtaka && $paidamount){

        $sql = "INSERT INTO books (CustomerName, Address, Phone, ProductName, InvoiceNumber, TotallPrice, PaidTaka, PaidAmount) 
                        VALUES ('$customername', '$address', '$phonenumber', '$productname', '$invoicenumber', '$totallprice', '$paidtaka', '$paidamount' )";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Record Successfully Inserted...!");
        }else{
            echo "Error";
        }

    }else{
            TextNode("error", "Provide Data in the Textbox");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}


// messages
function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


// get data from mysql database
function getData(){
    $sql = "SELECT * FROM books";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

// update dat
function UpdateData(){
    $bookid = textboxValue("book_id");
    $customername = textboxValue("CustomerName");
	$address = textboxValue("Address");
	$phonenumber = textboxValue("Phone");
	$productname = textboxValue("ProductName");
    $invoicenumber = textboxValue("InvoiceNumber");
    $totallprice = textboxValue("TotallPrice");
	$paidtaka = textboxValue("PaidTaka");
	$paidamount = textboxValue("PaidAmount");

    if($customername && $address && $phonenumber && $productname && $invoicenumber && $totallprice && $paidtaka && $paidamount){
        $sql = "
                    UPDATE books SET CustomerName='$customername', Address='$address', Phone = '$phonenumber', ProductName='$productname', InvoiceNumber='$invoicenumber', TotallPrice = '$totallprice', PaidTaka = '$paidtaka', PaidAmount = '$paidamount' WHERE customer_id='$bookid';                    
        ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Data Successfully Updated");
        }else{
            TextNode("error", "Enable to Update Data");
        }

    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }


}


function deleteRecord(){
    $bookid = (int)textboxValue("book_id");

    $sql = "DELETE FROM books WHERE id=$bookid";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Enable to Delete Record...!");
    }

}


function deleteBtn(){
    $result = getData();
    $i = 0;
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i > 3){
                buttonElement("btn-deleteall", "btn btn-danger" ,"<i class='fas fa-trash'></i> Delete All", "deleteall", "");
                return;
            }
        }
    }
}


function deleteAll(){
    $sql = "DROP TABLE books";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","All Record deleted Successfully...!");
        Createdb();
    }else{
        TextNode("error","Something Went Wrong Record cannot deleted...!");
    }
}


// set id to textbox
function setID(){
    $getid = getData();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['customer_id'];
        }
    }
    return ($id + 1);
}








