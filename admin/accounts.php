<?php include("includes/db.php") ?>
<?php include("./header.php") ?>
<?php ?>

<?php
connection();
if (isset($_POST['create'])) {
    $fee = $_POST['fee'];
    echo $account_no = $_POST['account_no'];

    $shares = "Yes";
    $savings = "Yes";
    $merry_go = "Yes";

    $query = "SELECT * FROM members ";
    $member_query = mysqli_query($connection, $query);
    if (!$member_query) {
        die("ERROR IN MEMBER SELECT" . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($member_query)) {
        $member_id = $row['ID'];
        $name = $row['Full_name'];
        $phone = $row['phone_number'];

        if ($phone == $account_no) {

            $query_acc = "INSERT INTO accounts(acc_id, Name, Acc_No, shares, creation_date, savings, merry_go, fee)";
            $query_acc .= "VALUES( $member_id, '$name', '$phone', '$shares', now(), '$savings', '$merry_go', '$fee')";

            $acc_query = mysqli_query($connection, $query_acc);
            if (!$acc_query) {
                die("ERROR IN ACCOUNTS INSERT" . mysqli_error($connection));
            } else {
                echo "<p class='success' >Account created successfully</p>";
            }
        } else
            echo "Account no doesent exist";
    }
}

?>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"> Total memebers savings<br>
                    <span style="font-size:22px;">KSH. 12600 </span>
                    <!--<img style="padding-left: 180px; height: 30px;" src="bootstrap-icons-1.11.3/2-circle-fill.svg" alt="">-->
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="class.php?class=b1">View Details</a>
                    <div class=" small text-white"><i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"> Chama Account Ballance <br>
                    <span style="font-size:22px;">SH. 10,000</span>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="class.php?class=b1">View Details</a>
                    <div class=" small text-white"><i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"> Savings Acc. Ballance<br>
                    <span style="font-size:22px;">KSH. 8,000</span>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="class.php?class=b1">View Details</a>
                    <div class=" small text-white"><i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"> Transactions<br>
                    <span style="font-size:22px;">12</span>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="class.php?class=b1">View Details</a>
                    <div class=" small text-white"><i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h3 style="text-align: center; text-decoration: underline;">Members Accounts</h3>
    <!--<a class="btn btn-primary" style="margin-bottom: 8px; padding-left: 50px;" href="addmember.html">Add member</a>-->

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-6 col-md-6">
            <!--<div class="form-group">
                    <input name="phone" class="form-control" type="search" placeholder="search by phone">

                </div>-->
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
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Create Account
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Create Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h2>Please donate something for account management</h2>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="fee" name="fee" type="number" placeholder="Enter Amount" required />
                                            <label for="inputFirstName">Amount (50 - 100)</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control" id="account_no" name="account_no" type="number" placeholder="Enter Reciever account" required />
                                            <label for="inputLastName">Your Acc. No.</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input class="btn btn-primary" type="submit" name="create" value="create">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Phone/ACC. NO.</th>
                <th>Shares</th>
                <th>Last saving date</th>
                <th>Savings</th>
                <th>Merry-go</th>
                <th>Donation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            // $query = "SELECT Accounts.acc_id, Accounts.name, Accounts.phone/Acc_No, Accounts.shares, Accounts.sarving_date, Accounts.savings, Accounts.merry_go, Accounts.fee, ";
            // $query .= "members.ID, members.name, members.phone_number";
            connection();
            $query = "SELECT * FROM Accounts";
            $accounts_query = mysqli_query($connection, $query);
            if (!$accounts_query) {
                die("ERROR IN ACCOUNTS DISPLAY" . mysqli_error($connection));
            }
            while ($row = mysqli_fetch_assoc($accounts_query)) {
                $acc_id = $row['acc_id'];
                $name = $row['Name'];
                $phone = $row['Acc_No'];
                $shares = $row['shares'];
                $date = $row['creation_date'];
                $savings = $row['savings'];
                $merry_go = $row['merry_go'];
                //$target = $row['target'];
                $fee = $row['fee'];
                //}
            ?>
                <tr>
                    <td><?php echo $acc_id ?></td>
                    <td><?php echo  $name ?></td>
                    <td><?php echo $phone ?></td>
                    <td><?php echo $shares ?></td>
                    <td><?php echo $date ?></td>
                    <td><?php echo $savings ?></td>
                    <td><?php echo $merry_go ?></td>
                    <td><?php echo $fee ?></td>
                    <td>
                        <span>
                            <a class="btn btn-primary" href="includes/accountdet.php?acc_id=<?php echo $acc_id ?>">View</a>
                            <a class="btn btn-primary" href="#">Edit</a>
                            <a class="btn btn-danger" href="#">Delete</a>
                        </span>
                    </td>
                </tr>
            <?php } ?>
            <!--<tr>
                <td>2</td>
                <td>Jacob Waliaula</td>
                <td>0703741143</td>
                <td>KSH. 400</td>
                <td>12/05/2022</td>
                <td>KSH. 650</td>
                <td>KSH. -300</td>
                <td>KSH. 50</td>
                <td>
                    <span>
                        <a class="btn btn-primary" href="includes/accountdet.php">View</a>
                        <a class=" btn btn-primary" href="#">Edit</a>
                        <a class="btn btn-danger" href="#">Delete</a>
                    </span>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Mark Twain</td>
                <td>0700101155</td>
                <td>KSH. 100</td>
                <td>12/05/2022</td>
                <td>KSH. 1500</td>
                <td>KSH. -400</td>
                <td>KSH. 50</td>
                <td>
                    <span>
                        <a class="btn btn-primary" href="#">View</a>
                        <a class="btn btn-primary" href="#">Edit</a>
                        <a class="btn btn-danger" href="#">Delete</a>
                    </span>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Jacob Waliaula</td>
                <td>0703741143</td>
                <td>KSH. 150</td>
                <td>12/05/2022</td>
                <td>KSH. 250</td>
                <td>KSH. 700</td>
                <td>KSH. 50</td>
                <td>
                    <span>
                        <a class="btn btn-primary" href="#">View</a>
                        <a class="btn btn-primary" href="#">Edit</a>
                        <a class="btn btn-danger" href="#">Delete</a>
                    </span>
                </td>
            </tr>-->
            <!--<tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
              </tr>-->
        </tbody>
    </table>


</div>
</div>
</div>
</div>
<script src="../js/bootstrap.js"></script>
</body>