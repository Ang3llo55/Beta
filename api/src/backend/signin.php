<?php
require('../../config/db_connection.php');

$email = $_POST['email'];
$pass = $_POST['password'];
$enc_pass = md5($pass);

$query = "SELECT * FROM users WHERE email = '$email'";
$result = pg_query($conn, $query);
$row = pg_fetch_assoc($result);
if ($row) {
    $query = "SELECT * FROM users WHERE password='$enc_pass'";
    $result = pg_query($conn, $query);
    $row = pg_fetch_assoc($result);
    if ($row) {
        echo "<script>alert('correct')</script>";
    } else {
        echo "<script>alert('password incorrect')</script>";
    }
    header ('refresh:0; url=http://127.0.0.1/Beta/api/src/login_form.html');
    exit();
}

$result = pg_query($conn, $query);
if ($result) {
    echo "<script>alert('No registration')</script>";
    header ('refresh:0; url=http://127.0.0.1/Beta/api/src/login_form.html');
} else {
    echo "Registration failed!";
}
pg_close($conn)

?>