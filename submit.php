<?php

  // Database connection
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $email = $_POST['email'];
  $phoneNum = $_POST['phoneNum'];

  // Check if two password match
  if($password == $password2){
    $conn = new mysqli('localhost','root','','test');
    if(mysqli_connect_error()){
      die('Connection Failed('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else {
      $stmt = $conn->prepare("INSERT INTO registration(username,
        password,email,phoneNum) values(?, ?, ?, ?)");
        $stmt->bind_param("sssi", $username, $password, $email, $phoneNum);
        $stmt->execute();
        echo "Submit Successfully...";
        $stmt->close();
        $conn->close();
    }
  }
  else{
    echo "Two passwords do not match. Try again.";
    die();
  }


?>
