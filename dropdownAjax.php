<!DOCTYPE html>
<html lang="en">
<?php
include 'conn.php';

$q = "SELECT * FROM country";
$result1 = mysqli_query($conn, $q);
?>


<head>
    <title>Dropdown cities</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <form id="myform" method="post">
            <div class="col md-6">
                <div class="form-group row-md-3">
                    <label for="sel1">country</label>
                    <select id="country" class="form-control">
                        <option>select country</option>
                        <?php
                        while ($country = mysqli_fetch_array($result1)) {
                        ?>
                            <option value=<?php echo $country['id']; ?>>
                                <?php echo $country['countryName']; ?>
                            </option>
                        <?php
                        }
                        ?>

                    </select>
                </div>

                <div class="form-group row-md-3">
                    <label for="sel2">State</label>
                    <select id="state" class="form-control">
                        <option>Select State</option>
                        <!-- ajax call here-->
                    </select>
                </div>

                <div class="form-group row-md-3">
                    <label for="sel3">city</label>
                    <select id="city" class="form-control">
                        <option id="0">Select City</option>
                        <!-- ajax call city here -->
                    </select>
                </div>
                <button id="submit" type="submit" class="btn btn-primary col-md-1">Submit</button>
                <button id="submit" type="reset" class="btn btn-primary col-md-1">reset</button>
            </div>
        </form>
        </br>
    </div>
</body>
<script type="text/javascript">
    $('document').ready(function() {
        $('#country').on('change', function() {
            // $(this).find('option:selected').attr('id');
            let countryId = $(this).val();
            console.log(countryId);
            $.ajax({
                method: "post",
                url: "state.php",
                data: {
                    id: countryId
                },
                success: function(data) {
                    if (data != null) {
                        $('#state').html(data);
                    }else{
                        $('#state').hide();
                    }
                }
            })
        })


        $('#state').on('change', function() {
            let stateId = $(this).val();
            console.log(stateId);
            $.ajax({
                method: "post",
                url: "city.php",
                data: {
                    stateId: stateId
                },
                success: function(data) {
                    if (data) {
                        console.log(data);
                        $('#city').html(data);
                    } else {
                        $('#city').html('<option>Please select state first</option>');
                    }

                }
            })
        })
    })
</script>







<!-- <script type="text/javascript">
    $('document').ready(function() {
        $('#city1').hide();
        $('#city2').hide();
        $('#city3').hide();

        $('#submit').click(function(e) {
            e.preventDefault();
            let sel1 = $('#sel1').val();
            let sel2 = $('#sel2').val();
            let sel3 = $('#sel3').val();

            // let val1 = $('#sel1').find('option:selected').attr('id');
            // let val2 = $('#sel2').find('option:selected').attr('id');
            // let val3 = $('#sel3').find('option:selected').attr('id');

            if (sel1 == "" && sel2 == "" && sel3 == "") {
                alert('Please select atleast one value each field');
            } else if (sel1 != "" && sel2 == "" && sel3 == "") {
                alert('please select other fields');
            } else if (sel1 == "" && sel2 != "" && sel3 != "") {
                alert('plese select the first field');
            } else if (sel1 != "" && sel2 == "" && sel3 != "") {
                alert('please select the second field');
            } else if ((sel1 != "" && sel2 != "") && (sel1 == sel2)) {
                alert('already selected in first field please choose other values in second field');
            } else if ((sel2 != "" && sel3 != "") && (sel2 == sel3)) {
                alert('already selected in second field please choose other value is third field');
            } else if ((sel1 != "" && sel3 != "") && (sel1 == sel3)) {
                alert('this is already selected');
            } else {
                alert(`selected citites are 1:${sel1} 2:${sel2} 3:${sel3}`);
            }

            // $('#city1').show();
            // $('#city1').html(sel1);
            // $('#city2').show();
            // $('#city2').html(sel2);
            // $('#city3').show();
            // $('#city3').html(sel3);

        })
    })
</script> -->

</html>