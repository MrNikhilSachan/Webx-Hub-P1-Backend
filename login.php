<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet">

</head>

<body>
    <div class="wrapper position-relative">
        <div class="card w-l position-absolute top-0 start-50 translate-middle-x">
            <form action="" method="POST" class="d-flex flex-column p-md-5" name="login">
                <div class="h5 text-center text-white"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                        fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg> Login</div>
                <div class="my-3 mb-4">
                    <label class="form-label">User Id</label>
                    <span class="far fa-user p-2"></span>
                    <input type="text" name="username" placeholder="Username" required class="form-control">
                </div>
                <div class="my-3 mb-4">
                    <label class="form-label">Password</label>
                    <span class="fas fa-lock p-2"></span>
                    <input type="password" name="password" placeholder="Password" required class="form-control" id="pwd">
                    <button class="btn" onclick="showPassword()">
                        <span class="fas fa-eye-slash"></span>
                    </button>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-75">Login</button>
                </div>
            </form>
            <?php
            require('connection.php');
            session_start();
            // When form submitted, check and create user session.
            if (isset($_POST['username'])) {
                $username = stripslashes($_REQUEST['username']);    // removes backslashes
                $username = mysqli_real_escape_string($con, $username);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con, $password);
                // Check user is exist in the database
                $query    = "SELECT * FROM `users` WHERE username='$username'
                            AND password='" . md5($password) . "'";
                $result = mysqli_query($con, $query) or die(mysql_error());
                $rows = mysqli_num_rows($result);
                if ($rows == 1) {
                    $row = $result->fetch_assoc(); 
                    $_SESSION['username'] = $username;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['phone'] = $row['phone'];
                    // Redirect to user dashboard page
                    header("Location: edit.php");
                } else {
                    echo "<div class='form'>
                        <h3>Incorrect Username/password.</h3><br/>
                        <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                        </div>";
                }
            }
                ?>
        </div>
    </div>
</body>

</html>