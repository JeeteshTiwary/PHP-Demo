<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/php-demo/layouts/header.php';

if ($_POST) {
    $slug = createSlug($_POST['title']);
    $columns = ['user_id', 'title', 'slug', 'description', 'status'];
    $values = [ $_SESSION['user']['id'], $_POST['title'], $slug, $_POST['description'], $_POST['status']];
    $todo_id = create(TBL_TODOS, $columns, $values);
    if ($todo_id ) {
        header('location: ' . BASE_URL . 'todo/list.php?message=New Todo has been created.');
    }
}

?>
    <div class="container">
        <div class="mt-5 d-flex justify-content-between align-items-center">
            <h1>Create Todo</h1>
            <a class="btn btn-outline-warning" href="<?php echo BASE_URL . 'todo/list.php'; ?>">Back</a>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6    ">
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title" autofocus required />
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="custom-select" name="status" id="status">
                                    <option selected value="0">Pending</option>
                                    <option value="1">In-Progress</option>
                                    <option value="2">Completed</option>
                                    <option value="3">Cancelled</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description <span class="text-danger">*</span></label>
                                <textarea rows="4" cols="50" name="description" id="description" class="form-control" placeholder="Description" required></textarea>
                            </div>
                        </div>
    
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-outline-primary">Create</button>
                        </div>
                    </div>
                </form>                                                                             
            </div>
        </div>
    </div>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/php-demo/layouts/footer.php' ?>