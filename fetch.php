<?php

$email =$_GET['email'];

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Please enter the valid Email ID")
    exit;
}

$servername="localhost";
$username="root";
$password=" ";
$dbname="userdata";

$conn = new mysqli('localhost','root','','userdata');

if($conn connect_error){
    die("Connection Failed:".$conn connect_error);
    
}
$sql="SELECT health_report FROM healthreport WHERE email='$email'";
$result=$conn->query($sql);

if($result num-rows>0){
    $row=$result fetch_assoc();
    $reportPath=$row['healthreport'];
    header("Content-type:application/pdf");
    header("Content-Disposition:attachment;file='healthreport.pdf'");
    readfile($reportPath);
}
else{
    echo("Health Report not in the given email id")
}
$conn close();


?>