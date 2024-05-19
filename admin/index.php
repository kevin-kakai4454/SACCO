<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styled.css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/cssall.main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    
</head>-->
<?php include("header.php") ?>

<body>
    <div class="sidebar">
        <div class="logo">
            <ul class="menu">
                <li class="active">
                    <a href="index.php?source=index.php">
                        <i class="bi bi-clock"><img style=" height: 25px;" src="bootstrap-icons-1.11.3/speedometer2.svg" alt=""></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?source=members.php">
                        <i class="fas fa-user"><img style=" height: 25px;" src="bootstrap-icons-1.11.3/people-fill.svg" alt=""></i>
                        <span>Members</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-chart-bar"><img style=" height: 25px;" src="bootstrap-icons-1.11.3/bar-chart-fill.svg" alt=""></i>
                        <span>Statistics</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?source=savings.php">
                        <i class="fas fa-briefcase"><img style=" height: 25px;" src="bootstrap-icons-1.11.3/basket2-fill.svg" alt=""></i>
                        <span>Savings</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?source=accounts.php">
                        <i class="fas fa-question-circle"><img style=" height: 25px;" src="bootstrap-icons-1.11.3/bank.svg" alt=""></i>
                        <span>Accounts</span>
                    </a>
                </li>

                <li>
                    <a href="index.php?source=transactions.php">
                        <i class="fas fa-star"><img style=" height: 25px;" src="bootstrap-icons-1.11.3/calculator-fill.svg" alt=""></i>
                        <span>Transactions</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-star"><img style=" height: 25px;" src="bootstrap-icons-1.11.3/calendar-event.svg" alt=""></i>
                        <span>Events</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-cog"><img style=" height: 30px;" src="bootstrap-icons-1.11.3/chat-left-heart-fill.svg" alt=""></i>
                        <span>CMS</span>
                    </a>
                </li>
                <li class="logout">
                    <a href="#">
                        <i class="fas fa-log-out-alt"><img style=" height: 25px;" src="bootstrap-icons-1.11.3/arrow-right-circle-fill.svg" alt=""></i>
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
                <h2>Dashboard</h2>
            </div>
            <div class="user--info">
                <!--<div class="search--box">
                    <i class="fa-solid fa-search"><img style=" height: 25px;" src="bootstrap-icons-1.11.3/search.svg" alt=""></i>
                    <input type="text" placeholder="search">
                </div>-->
                <figure style="text-align: center;">
                    <img src="images/KEVIN PHOTO.jpg" alt="">
                    <figcaption>KEVIN KAKAI</figcaption>
                </figure>
            </div>
        </div>
        <?php
        if (isset($_GET['source'])) {
            $source = $_GET['source'];
            switch ($source) {
                case 'accounts.php':
                    include("accounts.php");
                    break;
                case 'members.php':
                    include("members.php");
                    break;
                case 'dashboard':
                    include("dashboard.php");
                    break;
                case 'index2.php':
                    include("index2.php");
                    break;
                case 'transactions.php':
                    include("transactions.php");
                    break;
                case 'accountdet.php':
                    include("includes/accountdet.php");
                    break;
                case 'profile.php':
                    include("profile.php");
                    break;
                case 'savings.php':
                    include("includes/savings.php");
                    break;
                default:
                    include("index2.php");
                    break;
            }
        } else {
            include("index2.php");
        }
        ?>

        <!--<div class="container">
            <div class="row">



                <div class="col-lg-3 col-md-2">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body"> Total Sacco Members<br>
                            <span style="font-size:22px;">126 </span>
                            <!--<img style="padding-left: 180px; height: 30px;" src="bootstrap-icons-1.11.3/2-circle-fill.svg" alt="">-
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
                        <div class="card-body"> Total Acc. Ballance <br>
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
                        <div class="card-body"> Recent Forum posts<br>
                            <span style="font-size:22px;">23</span>
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
                        <div class="card-body"> Recente Transactions<br>
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
        </div>
    </div>
    </div>-->
    </div>
    <script src="../js/bootstrap.js"></script>
</body>