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
<?php include("db.php"); ?>
<?php //include("../header.php") 
?>

<body>
    <h1 style="text-align: center;"></h1>
    <div class="container my-5 border">
        <div class="row">
            <a class="col-lg-2  btn btn-primary" href="../accounts.php">Back</a>
            <?php
            connection();
            if (isset($_GET['acc_id'])) {
                $acc_id = $_GET['acc_id'];


                $query = "SELECT * FROM accounts WHERE acc_id = '$acc_id' ";

                $profile_query = mysqli_query($connection, $query);
                if (!$profile_query) {
                    die("Error is profile display " . mysqli_error($connection));
                }
                while ($row = mysqli_fetch_assoc($profile_query)) {
                    $name = $row['Name'];
                    $acc_no = $row['Acc_No'];
                    $creation_date = $row['creation_date'];
                    $shares = $row['shares'];
                    $savings = $row['savings'];
                    $merrry_go = $row['merry_go'];
                    $fee = $row['fee'];
                    // }
                    //}



            ?>

                    <?php
                    $image_query = "SELECT photo FROM members WHERE ID = '$acc_id' ";
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
                                    <tr>
                                        <th>ID</th>
                                        <td><?php echo $acc_id ?></td>
                                    </tr>
                                    <tr>
                                        <th>Account/phone No.</th>
                                        <td><?php echo $acc_no ?></td>
                                    </tr>

                                    <tr>
                                        <th>Registration Date</th>
                                        <td><?php echo $creation_date ?></td>
                                    </tr>
                                    <tr>
                                        <th>Savings</th>
                                        <td><?php echo $savings ?></td>
                                    </tr>
                                    <!--<input class="form-control" id="contact" name="contact" type="text" value=" //echo $result['contactno']; "  pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required />-->
                                    <tr>
                                        <th>Shares</th>
                                        <td colspan="3"><?php echo $shares ?></td>
                                    </tr>
                                    <tr>
                                        <th>Merry-go</th>
                                        <td colspan="3"><?php echo $merrry_go ?></td>
                                    </tr>
                                    <tr>

                                        <?php

                                        $query = "SELECT current_ballance FROM main_account WHERE member_id = '$acc_id' AND ID = '2' ";
                                        $select_query = mysqli_query($connection, $query);
                                        if (!$select_query) {
                                            die("Error in account " . mysqli_error($connection));
                                        }
                                        while ($row = mysqli_fetch_array($select_query)) {
                                            $acc_ballance = $row['current_ballance'];
                                            //echo $transact_id = $row['ID'];
                                        ?>
                                            <th>Acc. Ballance</th>
                                            <td colspan='3'><?php echo $acc_ballance ?></td>



                                        <?php } ?>

                                    </tr>

                                    <tr>
                                        <td colspan="4" style="text-align:center ;">

                                            <!--<button type="submit" class="btn btn-primary btn-block" name="update">Transfer</button>-->

                                            <?php
                                            if (isset($_POST['send'])) {
                                                $amount = $_POST['amount'];
                                                $reciever_acc = $_POST['acc_no'];
                                            }

                                            ?>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                Transfer Money
                                            </button>

                                            <a class="btn btn-primary" href="mainacc.php">Transfer</a>

                                            <!--<button type="submit" class="btn btn-primary btn-block" name="update">Transfer</button>-->

                                            <?php
                                            if (isset($_POST['deposit'])) {
                                                $deposit_amount = $_POST['amount'];
                                                $account_no = $_POST['phone'];

                                                $current_ballance = $acc_ballance + $deposit_amount;

                                                $acc_query = "INSERT INTO main_account(member_id, Acc_No, acc_Name,deposit_date, deposit_amount, withdraw_date, withdraw_amount, current_ballance )";
                                                $acc_query .= "VALUES ('$acc_id', '$account_no', '$name', now(), '$deposit_amount', '0','0', '$current_ballance' )";

                                                $mainaccount_query = mysqli_query($connection, $acc_query);
                                                if (!$mainaccount_query) {
                                                    die("Error in main account  " . mysqli_error($connection));
                                                } else {
                                                    echo "<p class='success'>You have successfully Deposited $deposit_amount</p>";
                                                }
                                            }

                                            ?>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                Deposit Money
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="" method="post">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Deposit to Account</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h1>Deposit money from <br>M-pesa</h1>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <div class="form-floating mb-3 mb-md-0">
                                                                            <input class="form-control" id="amount" name="amount" type="number" placeholder="Enter Amount" required />
                                                                            <label for="inputFirstName">Amount</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-floating">
                                                                            <input class="form-control" id="acc_no" name="phone" type="number" placeholder="Enter Reciever account" required />
                                                                            <label for="inputLastName">M-pesa Phone No.</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <input class="btn btn-primary" type="submit" name="deposit" value="Deposit">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                        <?php }
                } ?>
                            </div>

                        </div>
                    </div>
        </div>
    </div>
    <script src="../js/bootstrap.js"></script>
</body>

</html>