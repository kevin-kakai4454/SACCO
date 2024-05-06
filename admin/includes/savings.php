<?php include("../header.php") ?>
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

    <div class="container border my-5">

        <div class="row">
            <h1 style="text-align:center">savings</h1>




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

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Save Money
            </button>

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
                                            <input class="form-control" id="amount" name="amount" type="number" placeholder="Enter Amount" required />
                                            <label for="inputFirstName">Amount</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control" id="acc_no" name="acc_no" type="number" placeholder="Enter Reciever account" required />
                                            <label for="inputLastName">Your Acc. No.</label>
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
            </div>


        </div>

    </div>

    <script src="../js/bootstrap.js"></script>

</body>

</html>