<?php
include 'conn.php';
if (isset($_POST["stateId"])) {
    $stateId = $_POST["stateId"];
    // echo $stateId;
}
$q = "SELECT * FROM `city` WHERE `stateId`= $stateId ";
$result2 = mysqli_query($conn, $q);

while ($city = mysqli_fetch_array($result2)) {
    print_r($city);
?>
    <option value=" <?php echo $city['cityId']; ?> "> <?php echo $city['cityName']; ?> </option>

<?php }
?>