<?php
require 'koneksi.php';

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

    if (mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])){
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Halaman Login</title>
</head>
<body>
    <div class="container">
        <h1>HALAMAN LOGIN</h1>
        <?php 
        if (isset($error)) : ?>
            <p>Username atau Password anda salah</p>
            <?php endif; ?>
       
            <form action="" method="post">
                <table>
                    <tr>
                        <td>
                            <label for="username">Username</label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="username" name="username" id="username">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password" name="password" id="password">Password</label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="password" name="password" id="password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" name="login">Login</button>
                        </td>
                        <td>
                            <button><a href="registrasi.php">Register</a></button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        </body>
        </html>