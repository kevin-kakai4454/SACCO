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
            <a class="col-lg-2  btn btn-primary" href="../index.php?source=accounts.php">Back</a>
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
                                        // header("Location:savingsdet.php?acc_id = $acc_id");
                                        $query = "SELECT * FROM main_account WHERE member_id = '$acc_id' ORDER BY id DESC LIMIT 1 ";
                                        $select_query = mysqli_query($connection, $query);
                                        if (!$select_query) {
                                            die("Error in account " . mysqli_error($connection));
                                        }
                                        while ($row = mysqli_fetch_assoc($select_query)) {
                                            $acc_ballance = $row['current_ballance'];
                                            $transact_id = $row['ID'];


                                            //echo  $transact_id);
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

                                                $current_ballance = $acc_ballance - $amount;

                                                if ($amount < $acc_ballance && $current_ballance > 10) {



                                                    $s_query = "INSERT INTO main_account(member_id, Acc_No, acc_Name,deposit_date, deposit_amount, withdraw_date, withdraw_amount,sent_date, sent_amount,recieve_date,reciever_acc,recieve_amount, current_ballance)";
                                                    $s_query .= "VALUES ('$acc_id', '$acc_no', '$name', '0', '0', '0','0', now(), '$amount', '0', '0', '0', '$current_ballance' )";

                                                    $transfer_query = mysqli_query($connection, $s_query);
                                                    if (!$transfer_query) {
                                                        die("Error in sender query  " . mysqli_error($connection));
                                                    } else {
                                                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                    <strong>Confirmed!</strong> You have successfully send $amount to $reciever_acc.
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                  </div>";
                                                    }




                                                    $rec_query = "SELECT * FROM main_account WHERE Acc_No = '$reciever_acc'  ORDER BY ID DESC LIMIT 1  ";
                                                    $recieve_query = mysqli_query($connection, $rec_query);
                                                    while ($row = mysqli_fetch_assoc($recieve_query)) {
                                                        $reciever_id = $row['member_id'];
                                                        $reciever_name = $row['acc_Name'];
                                                        $acc_ballance = $row['current_ballance'];
                                                        //}
                                                        $current_ballance = $acc_ballance + $amount;

                                                        $r_query = "INSERT INTO main_account(member_id, Acc_No, acc_Name,deposit_date, deposit_amount, withdraw_date, withdraw_amount,sent_date, sent_amount,recieve_date,reciever_acc,recieve_amount, current_ballance)";
                                                        $r_query .= "VALUES ('$reciever_id', '$reciever_acc', '$reciever_name', '0', '0', '0','0', '0', '0', now(),'$reciever_acc', '$amount', '$current_ballance' )";

                                                        $reciever_query = mysqli_query($connection, $r_query);
                                                        if (!$reciever_query) {
                                                            die("Error in reciever query  " . mysqli_error($connection));
                                                        } else {
                                                            //echo "<p class='success'>You have successfully Recieved $amount</p>";
                                                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                        <strong>Confirmed!</strong> $reciever_name will recieve $amount  .
                                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                      </div>";
                                                        }
                                                    }
                                                    echo "<meta http-equiv='refresh' content='0'>";
                                                } else {
                                                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                                    <strong>Filed!</strong> You dont have enough money in your account, account ballance cant be bellow 10.
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                  </div>";
                                                }
                                            }


                                            ?>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
                                                Transfer Money
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="" method="post">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h1>Transer money</h1>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <div class="form-floating mb-3 mb-md-0">
                                                                            <input class="form-control" id="amount" name="amount" type="number" placeholder="Enter Amount" required />
                                                                            <label for="inputFirstName">Amount</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-floating">
                                                                            <input class="form-control" id="acc_no" name="acc_no" type="number" placeholder="Enter Reciever account" required />
                                                                            <label for="inputLastName">Reciever Acc. No.</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <input class="btn btn-primary" type="submit" name="send" value="Send">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>




                                            <!--<button type="submit" class="btn btn-primary btn-block" name="update">Transfer</button>-->

                                            <?php
                                            if (isset($_POST['withdraw'])) {
                                                $withdraw_amount = $_POST['amount'];
                                                $account_no = $_POST['phone'];

                                                if ($account_no ==  $acc_no) {

                                                    $current_ballance = $acc_ballance - $withdraw_amount;

                                                    if ($withdraw_amount < $acc_ballance && $current_ballance > 10) {


                                                        //}

                                                        $acc_query = "INSERT INTO main_account(member_id, Acc_No, acc_Name,deposit_date, deposit_amount, withdraw_date, withdraw_amount, current_ballance )";
                                                        $acc_query .= "VALUES ('$acc_id', '$account_no', '$name', '0', '0', now(),'$withdraw_amount', '$current_ballance' )";

                                                        $mainaccount_query = mysqli_query($connection, $acc_query);
                                                        if (!$mainaccount_query) {
                                                            die("Error in withdraw account  " . mysqli_error($connection));
                                                        } else {
                                                            echo "<meta http-equiv='refresh' content='0'>";
                                                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                    <strong>Confirmed!</strong> You have Withdrawn $withdraw_amount.
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                  </div>";
                                                        }
                                                    } else {
                                                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                                        <strong>Filed!</strong> You dont have enough money in your account, account ballance cant be bellow 10.
                                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                      </div>";
                                                    }
                                                } else {
                                                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                                    <strong>Filed!</strong> The entered does not match with your main Number.
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                  </div>";
                                                }
                                            }

                                            ?>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                                                Withdraw
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="" method="post">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Deposit to Account</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h1>withdraw money to <br>M-pesa</h1>

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
                                                                <input class="btn btn-primary" type="submit" name="withdraw" value="Withdraw">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>



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
                                                    echo "<meta http-equiv='refresh' content='0'>";
                                                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                                    <strong>Confirmed!</strong> You have deposited $deposit_amount.
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                  </div>";
                                                }
                                            }
                                            //header("Location:savingsdet.php");

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