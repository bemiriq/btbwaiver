<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "root"; /* Password */
$dbname = "vuedatabase"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

$data = json_decode(file_get_contents("php://input"));
$request = $data->request;
if($request == 2){
  $username = $data->username;
  if(mysqli_num_rows($userData) == 0){
    mysqli_query($con,"INSERT INTO vuewaiver(username) VALUES('".$username."')");
    echo "Inserted waiver url successfully";
  }else{
    echo "Something went wrong from php page.";
  }

  exit;
}