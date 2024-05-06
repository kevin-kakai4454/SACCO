<?php
function contact_exist()
{
}

function email_exists($email)
{
    global $connection;
    $query = "SELECT email FROM members WHERE email = '$email' ";
    $result2 = mysqli_query($connection, $query);
    if (!$result2) {
        die("ERROR IN CHECKING EMAIL" . mysqli_error($connection));
    }
    if (mysqli_num_rows($result2) > 0) {
        echo "<p>The email already exist</p>";
    }
}

function ID_exists($id_number)
{
    global $connection;
    $query = "SELECT id_number FROM members WHERE id_number = '$id_number' ";
    $result2 = mysqli_query($connection, $query);
    if (!$result2) {
        die("ERROR IN CHECKING ID" . mysqli_error($connection));
    }
    if (mysqli_num_rows($result2) > 0) {
        echo "<p>The ID number already exist</p>";
    }
}

function phone_exists($phone)
{
    global $connection;
    $query = "SELECT phone_number FROM members WHERE phone_number = '$phone' ";
    $result2 = mysqli_query($connection, $query);
    if (!$result2) {
        die("ERROR IN CHECKING phone" . mysqli_error($connection));
    }
    if (mysqli_num_rows($result2) > 0) {
        echo "<p>The phone number already exist</p>";
    }
}

function regest_user($name, $id_number, $phone_number, $email, $image)
{
    global $connection;
    if (isset($_POST['Register'])) {
        $name = $_POST['fullname'];
        $id_number = $_POST['idnumber'];
        $phone_number = $_POST['contact'];
        $email = $_POST['email'];
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        //$date = date('d-m-y');
        $status = "Active";
        $post = "Chair";
        move_uploaded_file($image_temp, "images/$image");

        $query = "INSERT INTO members(Full_name,id_number,phone_number, email, post, reg_date, member_status,photo)";
        $query .= "VALUES('$name', '$id_number', '$phone_number', '$email','$post', now(), '$status', '$image')";
        $members_query = mysqli_query($connection, $query);
        if (!$members_query) {
            echo "ERROR IN MEMBERS QUERY" . mysqli_error($connection);
        } else {
            echo "<p class='bg-success' >post updated successfully";
        }
    }
}
