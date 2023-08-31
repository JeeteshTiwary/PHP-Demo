<?php
if (!empty($_SESSION['employee'])) {
    session_unset();
    session_destroy();
    header('location: index.php?message=You have successfully logged out');   
}
?>