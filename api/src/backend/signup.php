<?php
    //DB connection
    require('../../config/db_connection.php');
    //Get data from register form
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    //Encrypt password with md5 hashing algorithm
    $enc_pass = md5($pass);
    //Query to insert data into users table
    $query = "INSERT INTO users (email,password)
        VALUES ('$email', '$enc_pass');
    ";

    //Execute query
    $result = pg_query($conn, $query);

    if ($result) {
        //echo "<br>Registration successful!";
        echo"<script>alert('Registration successful!')</script>";
            header('refresh:0;url=http://127.0.0.1/Beta/api/src/login_form.html');
    } else {
        echo "Registration failed!";
    }
    pg_close($conn)
    
    /*echo "Email: " . $email;
    echo "<br>Password: " . $pass;
    echo "<br>Enc. Password: " . $enc_pass;
    */
?>