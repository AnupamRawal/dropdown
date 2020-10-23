<?php
include 'conn.php';
$countryId='';

if(isset($_POST["countryId"])){
    $countryId = $_POST["countryId"];
}else{
    $countryId=1;
}

$q = "SELECT * FROM `state` WHERE `countryId`=$countryId";
$result1 = mysqli_query($conn, $q);
$state = mysqli_fetch_array($result1);
print_r($states);
?>

<?php 
while($state>0){
?>
<option id=<?php echo $state['id'];?>> <?php echo $states['stateName'] ?></option>
<?php }
?>


