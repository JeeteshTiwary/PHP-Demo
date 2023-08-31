<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo BASE_URL; ?>">PhpMySql Demo </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo BASE_URL; ?>dashboard.php">Dashboard<span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo BASE_URL; ?>todo/list.php">Todo <span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" data-toggle="dropdown">UserModule
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="btn" href="<?php echo BASE_URL; ?>userModule/signup.php">Add user</a></li>
                        <li><a class="btn" href="<?php echo BASE_URL; ?>userModule/showusers.php">User Deatails</a></li>
                        <li><a class="btn" href="<?php echo BASE_URL; ?>userModule/deleteuser.php">Delete account</a>
                        </li>
                        <li><a class="btn" href="<?php echo BASE_URL; ?>userModule/updateuser.php">Update account</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo BASE_URL; ?>logout.php">Logout</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>