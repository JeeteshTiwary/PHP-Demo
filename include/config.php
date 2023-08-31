<?php
define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/' . basename(dirname(__DIR__)) . '/');

session_start();

define('TBL_USERS', 'users');
define('TBL_TODOS', 'todos');

function createSlug($str, $delimiter = '-')
{

    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;

}

function get_connection()
{
    try {
        return mysqli_connect('localhost', 'root', '', 'php_demo');
    } catch (\Throwable $th) {
        die($th->getMessage());
    }
}

function get_records($tableName, $columns, $where = null)
{
    if (is_array($columns)) {
        $columns = implode(', ', $columns);
    }

    $sql = "SELECT $columns FROM $tableName";

    if ($where) {
        $sql .= " WHERE $where";
    }
    try {
        $connetion = get_connection();
        $result = mysqli_query($connetion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
        }
    } catch (\Throwable $th) {
        $response = [];
    }

    return $response;
}

function create($tableName, $columns, $values)
{
    if (is_array($columns)) {
        $columns = implode(', ', $columns);
    }
    if (is_array($values)) {
        $values = '"' . implode('", "', $values) . '"';
    }

    $sql = "INSERT INTO $tableName($columns) VALUES($values)";

    try {
        $connetion = get_connection();
        mysqli_query($connetion, $sql);
        $response = mysqli_insert_id($connetion);
    } catch (\Throwable $th) {
        $response = 0;
    }
    // $url = echo BASE_URL;
    header('location: ' . BASE_URL . 'index.php?message=You have successfully signed up');
    return $response;
}

function do_login($email, $password)
{
    $sql = "SELECT id, name, email, phone_number, password FROM " . TBL_USERS . " WHERE email='$email'";
    $connetion = get_connection();
    try {
        $result = mysqli_query($connetion, $sql);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            unset($user['password']);
            // store value in session
            $_SESSION['user'] = $user;
            header('location: dashboard.php');
            exit();
        }
    } catch (\Throwable $th) {
    }
    header('location: index.php?message=Invalid Credentials');
}

function do_delete($userid)
{
    $response = 0;
    $sql = "DELETE FROM " . TBL_USERS . " WHERE id='$userid'";
    $connetion = get_connection();
    try {
        $result = mysqli_query($connetion, $sql);
        $response = mysqli_affected_rows($connetion);
    } catch (Exception $th) {
        die($th->getMessage());
    }
    header('location: ' . BASE_URL . 'userModule/showusers.php?message=User has been Deleted successfully!');
    return $response;
}

function do_update($id, $name, $email, $phone_number, $password)
{
    // die('in update fun');
    $response = 0;
    $sql = "update `users` set name='$name', email='$email', phone_number=$phone_number where id=$id";
    $connetion = get_connection();
    try {
        $result = mysqli_query($connetion, $sql);
        $response = mysqli_affected_rows($connetion);
        $response ? header('location: ' . BASE_URL . 'userModule/showusers.php?message=Record has been updated successfully! ') : header('location: ' . BASE_URL . 'userModule/showusers.php?error=No any record has been updated') ;
    } catch (Exception $th) {
        die($th->getMessage());
    }
    return $response;
}