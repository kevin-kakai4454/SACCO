<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../styled.css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/cssall.main.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    
</head>-->
<?php include("header.php") ?>

<body>
    <!--<div class="sidebar">
        <div class="logo">
            <ul class="menu">
                <li class="active">
                    <a href="dashboard.html">
                        <i class="bi bi-clock"><img style=" height: 25px;" src="../bootstrap-icons-1.11.3/speedometer2.svg" alt=""></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="members.html">
                        <i class="fas fa-user"><img style=" height: 25px;" src="../bootstrap-icons-1.11.3/people-fill.svg" alt=""></i>
                        <span>Members</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-chart-bar"><img style=" height: 25px;" src="../bootstrap-icons-1.11.3/bar-chart-fill.svg" alt=""></i>
                        <span>Statistics</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-briefcase"><img style=" height: 25px;" src="../bootstrap-icons-1.11.3/basket2-fill.svg" alt=""></i>
                        <span>Savings</span>
                    </a>
                </li>
                <li>
                    <a href="accounts.html">
                        <i class="fas fa-question-circle"><img style=" height: 25px;" src="../bootstrap-icons-1.11.3/bank.svg" alt=""></i>
                        <span>Accounts</span>
                    </a>
                </li>

                <li>
                    <a href="transactions.html">
                        <i class="fas fa-star"><img style=" height: 25px;" src="../bootstrap-icons-1.11.3/calculator-fill.svg" alt=""></i>
                        <span>Transactions</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-star"><img style=" height: 25px;" src="../bootstrap-icons-1.11.3/calendar-event.svg" alt=""></i>
                        <span>Events</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-cog"><img style=" height: 30px;" src="../bootstrap-icons-1.11.3/chat-left-heart-fill.svg" alt=""></i>
                        <span>CMS</span>
                    </a>
                </li>
                <li class="logout">
                    <a href="#">
                        <i class="fas fa-log-out-alt"><img style=" height: 25px;" src="../bootstrap-icons-1.11.3/arrow-right-circle-fill.svg" alt=""></i>
                        <span>Log Out</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Primary</span>
                <h2>Sacco Members</h2>
            </div>
            <div class="user--info">
                <div class="">
                    <!--<i class="fa-solid fa-search"><img style=" height: 25px;" src="../bootstrap-icons-1.11.3/search.svg" alt=""></i>-->
    <!--<input type="text" placeholder="search">--
                </div>
                <figure style="text-align: center;">
                    <img src="images/KEVIN PHOTO.jpg" alt="">
                    <figcaption>KEVIN KAKAI</figcaption>
                </figure>
            </div>
        </div>-->

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"> Total transactions<br>
                        <span style="font-size:22px;">126 </span>
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
                    <div class="card-body"> Deposits <br>
                        <span style="font-size:22px;">10/15</span>
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
                    <div class="card-body"> Withdrawals<br>
                        <span style="font-size:22px;">8</span>
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
                    <div class="card-body"> Pending Applications<br>
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
        <h3 style="text-align: center; text-decoration: underline;">Members Transactions</h3>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-6 col-md-6">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search by phone" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="col-lg-4 col-md-4">
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
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>ID Number</th>
                    <th>Phone No</th>
                    <th>TransactionID</th>
                    <th>TransType</th>
                    <th>Date&Time</th>
                    <th>Amount</th>
                    <th>Fee</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="hover">
                <tr>
                    <td>1</td>
                    <td>Mark Twain</td>
                    <td>40199381</td>
                    <td>0700101155</td>
                    <td>SDI6KOW6F8</td>
                    <td>Deposit</td>
                    <td>12/03/2024 12:05am</td>
                    <td>KSH.300</td>
                    <td>sh.5</td>
                    <td>
                        <span>
                            <a class="btn btn-primary" href="#">View</a>
                            <a class="btn btn-primary" href="#">Edit</a>
                            <a class="btn btn-danger" href="#">Delete</a>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob Waliaula</td>
                    <td>10005826</td>
                    <td>0703741143</td>
                    <td>SDI6KOW6F8</td>
                    <td>Transfer</td>
                    <td>12/03/2024 12:05am</td>
                    <td>KSH.300</td>
                    <td>sh.5</td>
                    <td>
                        <span>
                            <a class="btn btn-primary" href="#">View</a>
                            <a class="btn btn-primary" href="#">Edit</a>
                            <a class="btn btn-danger" href="#">Delete</a>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Mark Twain</td>
                    <td>40199381</td>
                    <td>0700101155</td>
                    <td>SDI6KOW6F8</td>
                    <td>Withdraw</td>
                    <td>12/03/2024 12:05am</td>
                    <td>KSH.300</td>
                    <td>sh.5</td>
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
                    <td>10005826</td>
                    <td>0703741143</td>
                    <td>SDI6KOW6F8</td>
                    <td>Deposit</td>
                    <td>12/03/2024 12:05am</td>
                    <td>KSH.300</td>
                    <td>sh.5</td>
                    <td>
                        <span>
                            <a class="btn btn-primary" href="#">View</a>
                            <a class="btn btn-primary" href="#">Edit</a>
                            <a class="btn btn-danger" href="#">Delete</a>
                        </span>
                    </td>
                </tr>
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

</html>