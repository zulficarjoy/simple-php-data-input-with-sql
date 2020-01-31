<?php

function Createdb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "joy";

    // create connection
    $con = mysqli_connect($servername, $username, $password);

    // Check Connection
    if (!$con){
        die("Connection Failed : " . mysqli_connect_error());
    }

    // create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "
                        CREATE TABLE IF NOT EXISTS books(
                            customer_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            CustomerName VARCHAR (255),
							Address VARCHAR(255),
							Phone FLOAT,
							ProductName VARCHAR (255),
							InvoiceNumber FLOAT,
                            TotallPrice FLOAT, 
							PaidTaka VARCHAR (255), 
							PaidAmount FLOAT 
                        );
        ";

        if(mysqli_query($con, $sql)){
            return $con;
        }else{
            echo "Cannot Create table...!";
        }

    }else{
        echo "Error while creating database ". mysqli_error($con);
    }

}
