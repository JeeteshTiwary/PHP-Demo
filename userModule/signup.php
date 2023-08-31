<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/PHP-Demo/include/config.php';

//  create('users',['name','email','phone_number','password','status'],['Jeet','jeet@narola.email','7631331693',password_hash('1234',PASSWORD_DEFAULT),0]);

if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    create('users', ['name', 'email', 'phone_number', 'password'], [$name, $email, $phone_number, password_hash($password, PASSWORD_DEFAULT)]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Sign Up | PHP MySql Demo</title>
</head>

<body>
    <div class="container">
        <div class="">
            <h1 class="display-4 mx-3">Sign Up Here</h1>
            <hr>
            <form name="SignupForm" action="signup.php" method="post" autocomplete="on"
                onsubmit="return validateForm()">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="your name here.."
                        required>
                </div>
                <div class="form-group col-md-6">
                    <label for="Email1">Email address</label>
                    <input type="email" class="form-control" id="Email" name="email" placeholder="your email here.."
                        required>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" class="form-control" id="phone" name="phone_number"
                        placeholder="your phone number here.." required>
                </div>
                <div class="form-group col-md-6">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="Password" name="password"
                        placeholder="your password here.." required>
                </div>
                <div class="form-group col-md-6">
                    <label for="cnfPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="cnfPassword" name="cnfpassword"
                        placeholder="confirm the password" required>
                    <small> <i>confirm password should be same as the entered password</i> </small>
                </div>
                <div class="form-group form-check mx-3">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-outline-primary mx-3">Sign Up</button>
                    </div>
                    <div class="col">
                        <a class="btn btn-outline-primary" href="<?php echo BASE_URL; ?>index.php"> Back </a>
                    </div>
                </div>
            </form>
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