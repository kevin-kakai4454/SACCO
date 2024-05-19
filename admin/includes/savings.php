<?php include("db.php");
include("function.php");
?>

<?php
connection();
if (isset($_POST['Dailysave'])) {
    $daily_amount = $_POST['daily_amount'];
    $account_no = $_POST['acc_no'];
    $target_amount = $_POST['Target_amount'];
    $saving_duration = $_POST['save_time'];

    $query_m = "SELECT * FROM members WHERE phone_number = '$account_no' ";
    $m_query = mysqli_query($connection, $query_m);

    if (!$m_query) {
        die("Erro on savings members" . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($m_query)) {
        $member_id = $row['ID'];
        $name = $row['Full_name'];
        //}

        $plan = "Daily";
        $acc_ballance = '0';

        $query = "INSERT INTO savings(member_id, name, deposit_date, saving_amount, withdraw_date,amount,fixed_saving_amt,saving_plan,saving_duration,target,total_savings,withdraw_amount )";
        $query .= "VALUES('$member_id', '$name', '0', '0', '0', '0','$daily_amount','$plan','$saving_duration','$target_amount','$acc_ballance' ,'0')";

        $savings_query = mysqli_query($connection, $query);
        if (!$savings_query) {
            die("Erro on savings" . mysqli_error($connection));
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Confirmed!</strong> You have joined the daily saving plan .
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
}

?>

<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Save Money
            </button>-->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1>Save money</h1>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="amount" name="daily_amount" type="number" placeholder="Enter Amount" required />
                                <label for="inputFirstName">Daily Amount</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="acc_no" name="acc_no" type="number" placeholder="Enter Reciever account" required />
                                <label for="inputLastName">Your Acc. No.</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="amount" name="Target_amount" type="number" placeholder="Enter Amount" required />
                                <label for="inputFirstName">Target Amount</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="acc_no" name="save_time" type="number" placeholder="Enter Reciever account" required />
                                <label for="inputLastName">Saving duration</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit" name="Dailysave" value="Join">
                </div>
            </form>
        </div>
    </div>
</div>


<?php
if (isset($_POST['Weeklysave'])) {
    $daily_amount = $_POST['weekly_amount'];
    $account_no = $_POST['acc_no'];
    $target_amount = $_POST['Target_amount'];
    $saving_duration = $_POST['save_time'];

    $query_m = "SELECT * FROM members WHERE phone_number = '$account_no' ";
    $m_query = mysqli_query($connection, $query_m);

    if (!$m_query) {
        die("Erro on savings members" . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($m_query)) {
        $member_id = $row['ID'];
        $name = $row['Full_name'];
        //}

        $plan = "Weekly";
        $acc_ballance = '0';

        $query = "INSERT INTO savings(member_id, name, deposit_date, saving_amount, withdraw_date,amount,fixed_saving_amt,saving_plan,saving_duration,target,total_savings,withdraw_amount )";
        $query .= "VALUES('$member_id', '$name', '0', '0', '0', '0','$daily_amount','$plan','$saving_duration','$target_amount','$acc_ballance' ,'0')";

        $savings_query = mysqli_query($connection, $query);
        if (!$savings_query) {
            die("Erro on savings" . mysqli_error($connection));
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Confirmed!</strong> You have joined the weekly saving plan .
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
}

?>

<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Save Money
            </button>-->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop5" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1>Weekly money</h1>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="amount" name="weekly_amount" type="number" placeholder="Enter Amount" required />
                                <label for="inputFirstName">Saving Amount</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="acc_no" name="acc_no" type="number" placeholder="Enter Reciever account" required />
                                <label for="inputLastName">Your Acc. No.</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="amount" name="Target_amount" type="number" placeholder="Enter Amount" required />
                                <label for="inputFirstName">Target Amount</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="acc_no" name="save_time" type="number" placeholder="Enter Reciever account" required />
                                <label for="inputLastName">Saving duration</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit" name="Weeklysave" value="Join">
                </div>
            </form>
        </div>
    </div>
</div>


<?php
if (isset($_POST['Monthlysave'])) {
    $daily_amount = $_POST['daily_amount'];
    $account_no = $_POST['acc_no'];
    $target_amount = $_POST['Target_amount'];
    $saving_duration = $_POST['save_time'];

    $query_m = "SELECT * FROM members WHERE phone_number = '$account_no' ";
    $m_query = mysqli_query($connection, $query_m);

    if (!$m_query) {
        die("Erro on savings members" . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($m_query)) {
        $member_id = $row['ID'];
        $name = $row['Full_name'];
        //}

        $plan = "Monthly";
        $acc_ballance = '0';

        $query = "INSERT INTO savings(member_id, name, deposit_date, saving_amount, withdraw_date,amount,fixed_saving_amt,saving_plan,saving_duration,target,total_savings,withdraw_amount )";
        $query .= "VALUES('$member_id', '$name', '0', '0', '0', '0','$daily_amount','$plan','$saving_duration','$target_amount','$acc_ballance' ,'0')";

        $savings_query = mysqli_query($connection, $query);
        if (!$savings_query) {
            die("Erro on savings" . mysqli_error($connection));
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Confirmed!</strong> You have joined the Monthly saving plan .
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
}

?>

<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Save Money
            </button>-->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1>Monthly money</h1>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="amount" name="amount" type="number" placeholder="Enter Amount" required />
                                <label for="inputFirstName">Monthly Amount</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="acc_no" name="acc_no" type="number" placeholder="Enter Reciever account" required />
                                <label for="inputLastName">Your Acc. No.</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="amount" name="Target_amount" type="number" placeholder="Enter Amount" required />
                                <label for="inputFirstName">Target Amount</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="acc_no" name="save_time" type="number" placeholder="Enter Reciever account" required />
                                <label for="inputLastName">Saving Duration</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit" name="Monthlysave" value="Join">
                </div>
            </form>
        </div>
    </div>
</div>


<?php
if (isset($_POST['Targetsave'])) {
    $daily_amount = $_POST['daily_amount'];
    $account_no = $_POST['acc_no'];
    $target_amount = $_POST['Target_amount'];
    $saving_duration = $_POST['save_time'];

    $query_m = "SELECT * FROM members WHERE phone_number = '$account_no' ";
    $m_query = mysqli_query($connection, $query_m);

    if (!$m_query) {
        die("Erro on savings members" . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($m_query)) {
        $member_id = $row['ID'];
        $name = $row['Full_name'];
        //}

        $plan = "Target";
        $acc_ballance = '0';

        $query = "INSERT INTO savings(member_id, name, deposit_date, saving_amount, withdraw_date,amount,fixed_saving_amt,saving_plan,saving_duration,total_savings,withdraw_amount )";
        $query .= "VALUES('$account_no', '$name', '0', '0', '0', '0','$daily_amount','$plan','$saving_duration','$acc_ballance' ,'0')";

        $savings_query = mysqli_query($connection, $query);
        if (!$savings_query) {
            die("Erro on savings" . mysqli_error($connection));
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Confirmed!</strong> You have joined the Target saving plan .
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
}

?>

<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Save Money
            </button>-->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop7" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1>Target Saving</h1>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="amount" name="daily_amount" type="number" placeholder="Enter Amount" required />
                                <label for="inputFirstName">Daily Amount</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="acc_no" name="acc_no" type="number" placeholder="Enter Reciever account" required />
                                <label for="inputLastName">Your Acc. No.</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="amount" name="Target_amount" type="number" placeholder="Enter Amount" required />
                                <label for="inputFirstName">Target Amount</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" id="acc_no" name="save_time" type="number" placeholder="Enter Reciever account" required />
                                <label for="inputLastName">Saving Duration</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit" name="Targetsave" value="Join">
                </div>
            </form>
        </div>
    </div>
</div>


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

<body>
    <!--<h1 style="text-align:center">savings</h1>-->
    <div class="container border my-5">
        <div class="row">

            <div class="col-lg-3 col-md-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Daily Saving Plan<br>
                        <span style="font-size:22px;">SH. 10,000</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <!--<a class="small text-white stretched-link btn btn-primary" href="includes/savings.php?daily">View Details</a>-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Join
                        </button>
                        <div class=" small text-white"><i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Weekly Saving Plan<br>
                        <span style="font-size:22px;">SH. 10,000</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <!--<a class="small text-white stretched-link" href="class.php?class=b1">View Details</a>-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop5">
                            Join
                        </button>
                        <div class=" small text-white"><i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Monthly Saving Plan <br>
                        <span style="font-size:22px;">SH. 10,000</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <!--<a class="small text-white stretched-link" href="class.php?class=b1">View Details</a>-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop4">
                            Join
                        </button>
                        <div class=" small text-white"><i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Target Saving Plan <br>
                        <span style="font-size:22px;">SH. 10,000</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <!--<a class="small text-white stretched-link" href="class.php?class=b1">View Details</a>-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop7">
                            Join
                        </button>
                        <div class=" small text-white"><i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-6 col-md-6">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search by phone" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <div class="col-lg-2 col-md-2">
                    <form class="d-flex">
                        <!--<input class="form-control me-2" type="dropdown" placeholder="Search by phone" aria-label="Search">-->
                        <select class="form-control" value="<?php echo $maths ?>" name="maths" id="">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <button class="btn btn-outline-success" type="submit">Display</button>
                    </form>
                </div>
                <div class="col-lg-2 col-md-2">
                    <form class="d-flex">
                        <!--<input class="form-control me-2" type="dropdown" placeholder="Search by phone" aria-label="Search">-->
                        <select class="form-control" value="<?php echo $maths ?>" name="maths" id="">
                            <option value="1">Select plan</option>
                            <option value="Daily">Daily</option>
                            <option value="Weekly">Weekly</option>
                            <option value="Monthly">Monthly</option>
                        </select>
                        <button class="btn btn-outline-success" type="submit">Viewplan</button>
                    </form>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>ACC. NO.</th>
                        <th>Savings</th>
                        <th>Fixed savings</th>
                        <th>Saving plan</th>
                        <th>saving duration</th>
                        <th>Target</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = "SELECT * FROM savings ";
                    $save_query = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($save_query)) {
                        $acc_id = $row['ID'];
                        $member_id = $row['member_id'];
                        $name = $row['name'];
                        $acc_no = $row['Acc_No'];
                        $savings = $row['total_savings'];
                        $saving_amount = $row['fixed_saving_amt'];
                        $saving_plan = $row['Saving_plan'];
                        $saving_duration = $row['saving_duration'];
                        $target = $row['target'];

                        //}
                    ?>
                        <tr>
                            <td><?php echo $acc_id ?></td>
                            <td><?php echo $name ?></td>
                            <td><?php echo $acc_no ?></td>
                            <td>KSH.<?php echo $acc_id ?></td>
                            <td><?php echo $saving_amount ?></td>
                            <td><?php echo $saving_plan ?></td>
                            <td><?php echo $saving_duration . " " ?>Weeks</td>
                            <td><?php echo $target ?></td>
                            <td>
                                <span>
                                    <a class="btn btn-primary" href="includes/savingsdet.php?acc_id=<?php echo $acc_id ?>">View</a>
                                    <a class=" btn btn-primary" href="includes/savingsedit.php?acc_id=<?php echo $member_id ?>">Edit</a>
                                    <a class="btn btn-danger" href="#">Delete</a>
                                </span>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


            <?php
            if (isset($_POST['Save'])) {
                $amount = $_POST['amount'];
                //$frequent_savings = $_POST['daily_amount'];
                //$sarving_date = $_POST['time'];
                $account_no = $_POST['acc_no'];

                $query = "INSERT INTO savings(member_id, name, Acc_No, deposit_date, saving_amount, withdraw_date,amount)";
                $query .= "VALUES('$acc_id', '$name', '$acc_no', 'now()', '0', '$withdraw_date', '$amount')";

                $savings_query = mysqli_query($connection, $query);
                if (!$savings_query) {
                    die("Erro on savings" . mysqli_error($connection));
                } else {
                    echo "saved successfully";
                }
            }

            ?>

            <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Save Money
            </button>-->

            <!-- Modal -->
            <!--<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h1>Save money</h1>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="amount" name="amount" type="number" placeholder="Enter Amount" required />
                                            <label for="inputFirstName">Daily Amount</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control" id="acc_no" name="acc_no" type="number" placeholder="Enter Reciever account" required />
                                            <label for="inputLastName">Your Acc. No.</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="amount" name="amount" type="number" placeholder="Enter Amount" required />
                                            <label for="inputFirstName">Target Amount</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control" id="acc_no" name="acc_no" type="number" placeholder="Enter Reciever account" required />
                                            <label for="inputLastName">Withdraw month</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input class="btn btn-primary" type="submit" name="Save" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>-->


        </div>

    </div>

    <script src="../js/bootstrap.js"></script>

</body>

</html>