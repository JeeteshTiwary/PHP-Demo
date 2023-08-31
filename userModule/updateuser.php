<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-Demo/include/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php-demo/layouts/header.php';

$id = $_GET['id'];

$sql = "select * from `users` where id=$id";
$con = get_connection();
$result = mysqli_query($con, $sql);
// echo "<pre>";
// print_r($result);
// die();
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$phone_number = $row['phone_number'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    do_update($id, $name, $email, $phone_number, $password);
    // if ($result) {
    //     echo "updated successfully";
    //     header('location:display.php');
    // } else {
    //     die(mysqli_error($con));
    // }
}

?>

<div class="container mt-4">
    <div class="d-flex justify-content-center align-items-center">
        <div class="jumbotron w-50 ">
            <h1>Update user</h1>
            <hr>
            <form action="" method="post">
                <div class="form-group">
                    <label for="Name">Name<span class="text-danger">*</span></label>
                    <input class="form-control col-sm-9" type="text" name="name" value=<?php echo $name; ?>>
                </div>
                <div class="form-group">
                    <label for="Email">Email<span class="text-danger">*</span></label>
                    <input id="" class="form-control col-sm-9" type="email" name="email" value=<?php echo $email; ?>>
                </div>
                <div class="form-group">
                    <label for="Phone number">Phone number<span class="text-danger">*</span></label>
                    <input type="tel" name="phone_number" class="form-control  col-sm-9" value=<?php echo $phone_number; ?>>
                </div>
                <div class="row">
                    <input type="hidden" name="id" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : 0;?>">
                    <input type="Submit" name="submit" value="update" class="btn btn-outline-primary col-md-4 mx-3">
                    <a href="<?php echo BASE_URL; ?>/userModule/showusers.php"
                        class="btn btn-outline-warning col-md-4 mx-3">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/php-demo/layouts/footer.php'; ?>