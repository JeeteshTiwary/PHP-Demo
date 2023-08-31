<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/php-demo/layouts/header.php';

$user_id = $_SESSION['user']['id'];
$todos = get_records(TBL_TODOS, 'title, status, description, created_at', "user_id=$user_id");

?>
<div class="container">
    <div class="mt-5 d-flex justify-content-between align-items-center">
        <h1>Todo List</h1>
        <a class="btn btn-outline-success" href="<?php echo BASE_URL . 'todo/create.php'; ?>">Add</a>
    </div>

    <?php if (!empty($_GET['message'])) { ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>Hurray!</strong>
            <span>
                <?php echo $_GET['message']; ?>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

    <?php if (!empty($_GET['error'])) { ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong>Oops!</strong>
            <span>
                <?php echo $_GET['error']; ?>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Description</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>

            <?php if (!empty($todos)) {?>
                <?php foreach ($todos as $todo) { ?>
                    <tr>

                        <td>
                            <?php echo $todo['title'] ?>
                        </td>
                        <td>
                            <?php echo $todo['status'] ?>
                        </td>
                        <td>
                            <?php echo $todo['description'] ?>
                        </td>
                        <td>
                            <?php echo date('dS F, Y h:s A', strtotime($todo['created_at'])) ?>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td rowspan="4">No todos found!</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/php-demo/layouts/footer.php' ?>