<!-- <span style="font-family: verdana, geneva, sans-serif;">
-->

<?php
require('db.php');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']) ? true : false;
    $query = "SELECT * FROM admin WHERE email='$email' && password='$password'";
    $run = mysqli_query($db, $query);
    $data = mysqli_fetch_array($run);
    if ($data !== null && count($data) > 0) {
        $_SESSION['isUserLoddesIn'] = true;
        $_SESSION['emailId'] = $_POST['email'];
        if ($remember_me) {
            setcookie('user_email', $_POST['email'], time() + (30 * 24 * 60 * 60)); // 30 days expiration
        }
        echo "<script>window.location.href='admin.php';</script>";
    } else {
        echo "<script>alert('Incorrect Email or Password!')</script>";
    }
}

?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <!-- <input type="checkbox" id="show">
        <label for="show" class="show-btn">View Form</label> -->

    <div class="container">
        <!-- <label for="show" class="close-btn" title="close">×</label> -->
        <h1>Welcome</h1>
        <form method="post">
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <label>
                <input type="checkbox" name="remember_me"> Remember Me
            </label>
            <!-- <a href="#">Forgot Password?</a> -->
            <button name="submit" >Submit</button>
            <!-- <div class="link">Not a member? <a href="#">Sigup here</a></div> -->

        </form>
    </div>
</body>

</html>
</span>