<?php
$fname = $_POST['fname'];
$email = $_POST['email'];
$address=$_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$cardname = $_POST['cardname'];
$cardnumber = $_POST['cardnumber'];
$expmonth = $_POST['expmonth'];
$expyear = $_POST['expyear'];
$conn = new mysqli('localhost','root','','shopnow');        //localhost-> server || root -> server name || '' -> password || payment -> database name
if($conn->connect_error)
{
    die('Connection Failed : '.$conn->connect_error);
}
else
{
    $stmt =$conn->prepare("insert into payment(fname,email,address,city,state,zip,cardname,cardnumber,expmonth,expyear)values(?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssisiii",$fname,$email,$address,$city,$state,$zip,$cardname,$cardnumber,$expmonth,$expyear);
    $stmt->execute();
    echo "registration successful";
    $stmt->close();
    $conn->close();
}
?>