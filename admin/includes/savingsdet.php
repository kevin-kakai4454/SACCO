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

<?php
connection();
if (isset($_POST['deposit'])) {
    $amount  = $_POST['amount'];
    $acc_no  = $_POST['phone'];
    $To = $_POST['To'];
    $Pin = $_POST['PIN'];

    $bal = "SELECT * FROM savings WHERE Acc_No = '$acc_no' ORDER BY ID DESC LIMIT 1 ";
    $bal_query = mysqli_query($connection, $bal);
    while ($row = mysqli_fetch_assoc($bal_query)) {
        $ID = $row['ID'];
        $member_id = $row['member_id'];
        $total_savings = $row['total_savings'];
        $name = $row['name'];


        $acc_ballance = $total_savings + $amount;

        $query = "INSERT INTO savings(member_id, name, Acc_No, deposit_date, saving_amount, withdraw_date,amount,fixed_saving_amt,saving_plan,saving_duration,target,total_savings,withdraw_amount )";
        $query .= "VALUES('$member_id', '$name',$acc_no, 'now()', '0', '0', '$amount','0','0','0','0','$acc_ballance' ,'0')";

        $savings_query = mysqli_query($connection, $query);
        if (!$savings_query) {
            die("Erro on saving money" . mysqli_error($connection));
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Confirmed!</strong> You have successfully deposited $amount to the savings account.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
}

?>

<body>
    <h1 style="text-align: center;"></h1>
    <div class="container my-5 border">
        <div class="row">
            <a class="col-lg-2  btn btn-primary" href="../index.php?source=savings.php">Back</a>
            <?php
            //connection();
            if (isset($_GET['acc_id'])) {
                $acc_id = $_GET['acc_id'];


                $query = "SELECT * FROM savings WHERE ID = '$acc_id' ";

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
                            <tr>
                                <th>ID</th>
                                <td><?php echo $acc_id ?></td>
                            </tr>
                            <tr>
                                <th>Account/phone No.</th>
                                <td><?php echo $acc_no ?></td>
                            </tr>

                            <tr>
                                <th>Fixed saving amount</th>
                                <td>KSH. <?php echo $saving_amount ?></td>
                            </tr>
                            <tr>
                                <th>Saving Plan</th>
                                <td><?php echo $saving_plan ?></td>
                            </tr>
                            <!--<input class="form-control" id="contact" name="contact" type="text" value=" //echo $result['contactno']; "  pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required />-->
                            <tr>
                                <th>Saving Duration</th>
                                <td colspan="3"><?php echo $saving_duration ?> Weeks</td>
                            </tr>
                            <tr>
                                <th>Target</th>
                                <td colspan="3">KSH. <?php echo $target ?></td>
                            </tr>
                            <tr>

                                <?php

                                $query = "SELECT * FROM savings WHERE Acc_No = '$acc_no' ORDER BY ID DESC LIMIT 1 ";
                                $select_query = mysqli_query($connection, $query);
                                if (!$select_query) {
                                    die("Error in account " . mysqli_error($connection));
                                }
                                while ($row = mysqli_fetch_assoc($select_query)) {
                                    $acc_ballance = $row['Amount'];
                                    $transact_id = $row['ID'];


                                    //echo  $transact_id);
                                ?>
                                    <th>Acc. Ballance</th>
                                    <td colspan='3'><?php echo $acc_ballance ?></td>



                                <?php } ?>

                            </tr>

                            <tr>
                                <td colspan="4" style="text-align:center ;">

                                    <!--<button type="submit" class="btn btn-primary btn-block" name="update">Save</button>-->
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropS">
                                        Save
                                    </button>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropW">
                                        Withdraw
                                    </button>
                                </td>

                            </tr>
                            </tbody>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdropS" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Deposit to Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1>Deposit money to saving Acc.</h1>

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


                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <select class="form-control" name="To" id="">
                                    <option value="Mpesa">Mpesa</option>
                                    <option value="Main Acc">Main Acc.</option>
                                </select>
                                <!--<input class="form-control" id="amount" name="amount" type="number" placeholder="Enter Amount" required />-->
                                <label for="inputFirstName">From</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="acc_no" name="PIN" type="number" placeholder="Enter Reciever account" required />
                                <label for="inputLastName">PIN</label>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdropW" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Deposit to Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1>Withdraw from Saving Acc.</h1>

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


                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <select class="form-control" name="from" id="">
                                    <option value="Main_Acc">Main Acc</option>
                                    <option value="Mpesa">M-pesa</option>
                                </select>
                                <!--<input class="form-control" id="amount" name="amount" type="number" placeholder="Enter Amount" required />-->
                                <label for="inputFirstName">TO</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="acc_no" name="PIN" type="number" placeholder="Enter Reciever account" required />
                                <label for="inputLastName">PIN</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit" name="save" value="Deposit">
                </div>
            </form>
        </div>
    </div>
</div>


</html>