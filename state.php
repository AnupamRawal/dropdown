<?php
include 'conn.php';
if (isset($_POST["id"])) {
    $countryId = $_POST["id"];
    $q = "SELECT * FROM `state` WHERE `countryId`= $countryId ";
$result1 = mysqli_query($conn, $q);
// $state = mysqli_fetch_assoc($result1);

while ($state = mysqli_fetch_array($result1)) {
    print_r($state);
    if(!empty($state)){
?>
    <option value=" <?php echo $state['stateId']; ?> "> <?php echo $state['stateName']; ?> </option>
<?php }}}
?>



