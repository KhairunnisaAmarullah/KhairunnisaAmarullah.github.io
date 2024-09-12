<?php
    include_once("connection.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>JWD PEMBAYARAN</title>
</head>
<body>
    <?php
    if($_POST) {
        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        $sql = "SELECT * FROM tabel_user WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) > 0){
            $_SESSION['sudahlogin'] = true;
            header("Location: index.php");
        } else {
            header("Location: login.php");
        }
    }
    ?>
    <div class="main-container">
        <section class="panel-form">
            <h1>Login Form</h1>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>

                <input type="submit" value="login">
            </form>
        </section>

    </div>
    <script src="color.js"></script>
</body>
</html>
