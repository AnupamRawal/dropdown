<?php 
$serverName = 'localhost';
$userName = 'root';
$password = 'password';
$db = 'mCountry';

$conn = mysqli_connect($serverName,$userName,$password,$db);


$q2 = "INSERT INTO `city`(`stateId`,`cityName`) VALUES(4,'Red deer')";

$result = mysqli_query($conn,$q2);

// if($result){
// echo 'done';
// }else{
//     echo 'notdone';
// }

?>