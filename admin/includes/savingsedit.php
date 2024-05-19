<?php include("db.php"); ?>
<?php
connection();
if (isset($_POST['Update'])) {
    $acc_id = $_POST['ID'];
    $acc_no = $_POST['phone'];
    $saving_amount = $_POST['fixed_saving_amt'];
    $saving_plan = $_POST['saving_plan'];
    $saving_duration = $_POST['saving_duration'];
    $target = $_POST['target'];
    $savings = $_POST['total_savings'];


    $query = "UPDATE savings SET ";
    $query .= "Acc_No = '$acc_no', fixed_saving_amt = '$saving_amount', saving_duration = '$saving_duration', target = '$target', total_savings = '$savings' ";
    $query .= "WHERE member_id = '$acc_id' ";

    $update_query = mysqli_query($connection, $query);
    if (!$update_query) {
        die("Error in withdraw account  " . mysqli_error($connection));
    } /*else {
        //echo "<p class='success'>You have successfully Deposited $deposit_amount</p>";
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>Confirmed!</strong> $acc_no details edited successfully.
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    }*/ else {
        echo "<script>alert('Savings updated successfully');</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../styled.css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/cssall.main.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../styled.css">

</head>

<?php //include("../header.php") 
?>

<body>

    <div class="container my-5 border">
        <h1 style="text-align: center;">Saving</h1>
        <div class="row">
            <a class="col-lg-2  btn btn-primary" href="../index.php?source=savings.php">Back</a>
            <?php
            connection();
            if (isset($_GET['acc_id'])) {
                $acc_id = $_GET['acc_id'];


                $query = "SELECT * FROM savings WHERE member_id = '$acc_id' ";

                $profile_query = mysqli_query($connection, $query);
                if (!$profile_query) {
                    die("Error is profile display " . mysqli_error($connection));
                }
                while ($row = mysqli_fetch_assoc($profile_query)) {
                    $member_id = $row['member_id'];
                    $name = $row['name'];
                    $acc_no = $row['Acc_No'];
                    $savings = $row['total_savings'];
                    $saving_amount = $row['fixed_saving_amt'];
                    $saving_plan = $row['Saving_plan'];
                    $saving_duration = $row['saving_duration'];
                    $target = $row['target'];
                }
            }
            ?>
            <?php
            $image_query = "SELECT photo FROM members WHERE ID = '$member_id' ";
            $photo_query = mysqli_query($connection, $image_query);
            while ($row = mysqli_fetch_assoc($photo_query)) {
                $image = $row['photo'];
                //}
            ?>
                <figure style="text-align: center; border-radius: 50%;">
                    <img height="100px" style="border-radius: 50%;" src="../images/<?php echo $image ?>" alt="">
                    <figcaption>NAME: <?php echo $name ?></figcaption>
                </figure>
            <?php } ?>
            <div class="container">
                <div class="row">
                    <div class="card-body">
                        <table class="table table-bordered ">
                            <form class="form-control" action="" method="post">
                                <tr>
                                    <th>ID</th>
                                    <td><input name="ID" type="number" value="<?php echo $acc_id ?>"></td>
                                </tr>
                                <tr>
                                    <th>Account/phone No.</th>
                                    <td><input name="phone" class="form-group" type="number" value="<?php echo $acc_no ?>"></td>
                                </tr>

                                <tr>
                                    <th>Fixed saving amount</th>
                                    <td><input name="fixed_saving_amt" type="number" value="<?php echo $saving_amount ?>"></td>
                                </tr>
                                <tr>
                                    <th>Saving Plan</th>
                                    <td><input name="saving_plan" type="text" value="<?php echo $saving_plan ?>"></td>
                                </tr>
                                <!--<input class="form-control" id="contact" name="contact" type="text" value=" //echo $result['contactno']; "  pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required />-->
                                <tr>
                                    <th>Saving Duration</th>
                                    <td colspan="3"><input name="saving_duration" type="number" value="<?php echo $saving_duration ?>"></td>
                                </tr>
                                <tr>
                                    <th>Target</th>
                                    <td colspan="3"><input name="target" type="number" value="<?php echo $target ?>"></td>
                                </tr>
                                <tr>

                                    <?php

                                    $query = "SELECT * FROM savings WHERE member_id = '$member_id' ORDER BY ID DESC LIMIT 1 ";
                                    $select_query = mysqli_query($connection, $query);
                                    if (!$select_query) {
                                        die("Error in account " . mysqli_error($connection));
                                    }
                                    while ($row = mysqli_fetch_assoc($select_query)) {
                                        $acc_ballance = $row['total_savings'];
                                        $transact_id = $row['ID'];


                                        //echo  $transact_id);
                                    ?>
                                        <th>Acc. Ballance</th>
                                        <td colspan='3'><input name="total_savings" type="text" value="<?php echo $savings ?>"></td>



                                    <?php } ?>

                                </tr>

                                <tr class="form-group">
                                    <td colspan="4" style="text-align:center ;">

                                        <button type="submit" class="btn btn-primary btn-block" name="Update">Edit</button>
                                    </td>

                                </tr>
                            </form>
                        </table>
                        <?php //}
                        //} 
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.js"></script>
</body>

</html>