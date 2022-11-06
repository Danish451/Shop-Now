<?php
  $firstName = $_POST['firstName'];
  $mail = $_POST['mail'];
  $password = $_POST['password'];

  //DATABASE connection

  $conn = new mysqli('localhost','root','','shopnow');
  if($conn->connect_error){
    die('Connection Failed : ' .$conn->connect_error);
  }
  else{
  $stmt = $conn->prepare("insert into signup(firstName, mail, password)values(?, ?, ?)");
  $stmt->bind_param("sss", $firstName, $mail, $password);    //s->for string
  $stmt->execute();
  echo "registration Successfully...";
  $stmt->close();
  $conn->close();

  }
  
?>