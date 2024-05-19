<?php include("header.php") ?>
<?php include("includes/db.php") ?>

<?php
connection();
if (isset($_GET['member_id'])) {
    $member_id = $_GET['member_id'];

    /*$query = "SELECT members.ID members.Full_name,members.id_number,members.phone_number,members.email,members.post,members.reg_date,members.member_status,members.photo,members.address,";
    $query .= "accounts.acc_id,accounts.shares,accounts.creation_date,accounts.savings,accounts.merry_go,accounts.fee";
    $query .= "FROM members";
    $query .= "LEFT JOIN accounts ON members.ID = accounts.acc_id";
*/
    $query = "SELECT * FROM members WHERE ID = '$member_id' ";

    $profile_query = mysqli_query($connection, $query);
    if (!$profile_query) {
        die("Error is profile display " . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($profile_query)) {
        $name = $row['Full_name'];
        $id_no = $row['id_number'];
        $phone = $row['phone_number'];
        $email = $row['email'];
        $post = $row['post'];
        $reg_date = $row['reg_date'];
        $photo = $row['photo'];
        $address = $row['address'];
    }
}

?>

<?php
if (isset($_POST['Update'])) {
    //$name = $row['Full_name'];
    $id_no = $_POST['id_number'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $post = $_POST['post'];
    //$reg_date = $row['reg_date'];
    //$photo = $_POST['photo'];
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $address = $_POST['address'];

    move_uploaded_file($image_temp, "images/$image");
    if (empty($image)) {
        $query = "SELECT * FROM members WHERE ID = $member_id";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_image)) {
            $image = $row['post'];
        }
    }


    $query = "UPDATE members SET ";
    $query .= "phone_number = '$phone', email = '$email', post = '$post', photo = '$image', address = '$address' ";
    $query .= "WHERE ID = '$member_id' ";

    $update_query = mysqli_query($connection, $query);

    if (!$update_query) {
        die("Error in updating member  " . mysqli_error($connection));
    } else {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>Confirmed!</strong> member details edited successfully.
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    }
}

?>

<body>

    <div class="container my-5 border">

        <div class="row">
            <a class="col-lg-2  btn btn-primary" href="index.php?source=accounts.php">Back</a>
            <h1 style="text-align: center;">User Details</h1>
            <figure style="text-align: center; border-radius: 50%;">
                <img width="200px" style="border-radius: 50%;" src="images/<?php echo $photo ?>" alt="">
                <figcaption> NAME : <?php echo $name ?></figcaption>
            </figure>

            <div class=" card-body">
                <table class="table table-bordered ">
                    <form class="form-control" action="" method="post" enctype="multipart/form-data">
                        <tr>
                            <th>ID</th>
                            <td><?php echo $member_id ?></td>
                        </tr>
                        <tr>
                            <th>Post</th>
                            <td><input class="form-group" name="post" type="text" value="<?php echo $post ?>"></td>
                        </tr>

                        <tr>
                            <th>Registration Date</th>
                            <td><?php echo $reg_date ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><input class="form-group" name="address" type="text" value="<?php echo $address ?>"></td>
                        </tr>
                        <!--<input class=" form-control" id="contact" name="contact" type="text" value="<?php echo $result['contactno']; ?>" pattern="[0-9]{10}" title="10 numeric characters only" maxlength="10" required />-->
                        <tr>
                            <th>Contact No.</th>
                            <td colspan="3"><input class="form-group" name="phone" type="number" value="<?php echo $phone ?>"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td colspan=" 3"><input class="form-group" name="email" type="email" value="<?php echo $email ?>"></td>
                        </tr>


                        <tr>
                            <th>ID Number</th>
                            <td colspan="3"><input class="form-group" name="id_number" type="number" value="<?php echo $id_no ?>"></td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td colspan="3"><input class="form-group" name="image" type="file" value="<?php echo $photo ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="Update">Update</button></td>

                        </tr>
                        </tbody>
                    </form>
                </table>
                <?php // }
                // } 
                ?>
            </div>

        </div>
    </div>
</body>

</html>