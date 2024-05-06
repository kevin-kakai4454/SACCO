<?php include("includes/db.php") ?>

<?php
connection();
if (isset($_POST['Register'])) {
    $name = $_POST['fullname'];
    $id_number = $_POST['idnumber'];
    $phone_number = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    //$date = date('d-m-y');
    $status = "Active";
    $post = "Chair";
    move_uploaded_file($image_temp, "images/$image");

    $query = "INSERT INTO members(Full_name,id_number,phone_number, email, post, reg_date, member_status,photo, address)";
    $query .= "VALUES('$name', '$id_number', '$phone_number', '$email','$post', now(), '$status', '$image', '$addrss')";
    $members_query = mysqli_query($connection, $query);
    if (!$members_query) {
        echo "ERROR IN MEMBERS QUERY" . mysqli_error($connection);
    } else {
        echo "<p class='bg-success' >post updated successfully";
    }
}

//regest_user($name, $id_number, $phone_number, $email, $image);
?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"> Total memebers<br>
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
                    <div class="card-body"> Merry-go List <br>
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
                    <div class="card-body"> Members with loans<br>
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
        <h3 style="text-align: center; text-decoration: underline;">List of Members</h3>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-6 col-md-6">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search by phone" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="form-group">
                    <!-- Button trigger modal -->
                    <button style="margin-left: 180px;" type=" button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Add Member
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="atic" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <br>
                                    <h3 style="text-align: center;">Register Member</h3>
                                    <form method="post" action="" name="signup" enctype="multipart/form-data" onsubmit="return checkpass();">

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="fullname" name="fullname" type="text" placeholder="Enter your first name" required />
                                                    <label for="inputFirstName">Full Name</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="idnumber" name="idnumber" type="number" placeholder="Enter your last name" required />
                                                    <label for="inputLastName">ID Number</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" name="email" value="" type="email" placeholder="phpgurukulteam@gmail.com" required />
                                            <label for="inputEmail">Email address</label>
                                            <?php //email_exists($email) 
                                            ?>
                                        </div>


                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="contact" name="contact" type="text" placeholder="1234567890" required pattern="[0-9]{10}" title="10 numeric characters only" maxlength="10" required />
                                            <label for="inputcontact">Contact Number</label>
                                        </div>



                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="address" name="address" type="text" placeholder="Enter Address" required />
                                                    <label for="Address">Address</label>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="image" name="image" type="file" placeholder="select image" />
                                                    <label for="selectimage">Select Image</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" name="Register">Register</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    <div class="small"><a href="index.php">Back to Home</a></div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Understood</button>
                                </div>
                            </div>
                        </div>
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
                <th>ID Number</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Post</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody <?php
                //video 264

                error_reporting(0);
                connection();
                $query = "SELECT * FROM members ";
                $members_query = mysqli_query($connection, $query);
                if (!$members_query) {
                    die("ERROR IN DISPLAYING MEMBERS" . mysqli_error($connection));
                }
                while ($row = mysqli_fetch_array($members_query)) {
                    $member_id = $row['ID'];
                    $member_name = $row['Full_name'];
                    $id_number = $row['id_number'];
                    $phone_number = $row['phone_number'];
                    $email = $row['email'];
                    $post = $row['post'];
                    $address = $row['address'];
                    //}


                ?>>
            <tr>
                <td><?php echo $member_id ?></td>
                <td><?php echo $member_name ?></td>
                <td><?php echo $id_number ?></td>
                <td><?php echo $phone_number ?></td>
                <td><?php echo $address ?></td>
                <td><?php echo $post ?></td>
                <td><?php echo $email ?></td>
                <td>
                    <span>
                        <a class="btn btn-primary" href="profile.php?memeber_id=<?php echo $member_id ?>">View</a>
                        <a class="btn btn-primary" href="reg2.php">Edit</a>
                        <a class="btn btn-danger" href="#">Delete</a>
                    </span>
                </td>
            </tr>
        <?php } ?>
        <!--<tr>
                <td>2</td>
                <td>Jacob Waliaula</td>
                <td>10005826</td>
                <td>0703741143</td>
                <td>Nzoia</td>
                <td>Member</td>
                <td>kevinkakai@gmail.com</td>
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

</html>