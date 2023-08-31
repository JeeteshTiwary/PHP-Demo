<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-Demo/include/config.php';

// if ($_POST) {
$id = $_GET['id'];
do_delete($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Delete User | PhpMySql Demo</title>
</head>

<body>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8">
                <h2>Record has been deleted successfully!!</h2>
            </div>
            <div class="col-md-4">
                <a class="btn btn-outline-primary" href="<?php echo BASE_URL; ?>userModule/showusers.php">Back to Home</a>
            </div>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>