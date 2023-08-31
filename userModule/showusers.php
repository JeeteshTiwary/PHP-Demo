<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-Demo/include/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php-demo/layouts/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php-demo/layouts/footer.php';

$users = get_records(TBL_USERS, 'id, name, email, created_at','id != 2');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | PhpMySql Demo</title>
</head>
<body>
<div class="container">
    <div class="mt-5 d-flex justify-content-between align-items-center">
        <h1>Our Users </h1>
        <a class="btn btn-outline-success" href="<?php echo BASE_URL; ?>userModule/signup.php ?>">Add</a>
    </div>

    <?php if (!empty($_GET['message'])) { ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>Hurray!</strong>
            <span>
                <?php echo $_GET['message'] ?>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>

            <?php if (!empty($users)) {?>
                <?php foreach ($users as $user) { ?>
                    <tr>

                        <td>
                            <?php echo $user['id'] ?>
                        </td>
                        <td>
                            <?php echo $user['name'] ?>
                        </td>
                        <td>
                            <?php echo $user['email'] ?>
                        </td>
                        <td>
                            <?php echo date('dS F, Y h:s A', strtotime($user['created_at'])) ?>
                        </td>
                        <td>
                            <a class="btn btn-outline-info" href="<?php echo BASE_URL; ?>userModule/updateuser.php?id=<?php echo $user['id'] ?>">Update</a>
                            <a class="btn btn-outline-danger" href="<?php echo BASE_URL; ?>userModule/deleteuser.php?id=<?php echo $user['id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td rowspan="4">Currently there is no any user!</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>