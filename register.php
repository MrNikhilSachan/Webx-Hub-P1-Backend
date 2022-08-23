<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet">

</head>

<body>
    <div class="wrapper position-relative">
        <div class="card w-r position-absolute top-0 start-50 translate-middle-x">
            <form action="" class="d-flex flex-column p-5">
                <div class="h5 text-center text-white"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                        fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg> Register</div>
                <div class="row">
                    <div class="col-md-6 my-3 mb-4">
                        <label class="form-label">User Id</label>
                        <span class="far fa-user p-2"></span>
                        <input type="text" name="username" placeholder="Username" required class="form-control">
                    </div>
                    <div class="col-md-6 my-3 mb-4">
                        <label class="form-label">Email Id</label>
                        <span class="far fa-user p-2"></span>
                        <input type="text" name="email" placeholder="Email" required class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 my-2 mb-2">
                        <label class="form-label">Password</label>
                        <span class="fas fa-lock p-2"></span>
                        <input type="password" placeholder="Password" name="password" required class="form-control" id="pwd">
                        <button class="btn" onclick="showPassword()">
                            <span class="fas fa-eye-slash"></span>
                        </button>
                    </div>
                    <div class="col-md-6 my-2 mb-2">
                        <label class="form-label">Phone</label>
                        <span class="far fa-user p-2"></span>
                        <input type="text" placeholder="1234567890" name="phone" required class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 my-3 mb-4">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-100">Name of Corporate</button>
                        </div>
                    </div>
                    <div class="col-md-6 my-3 mb-4">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-100">Address</button>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-50">Register</button>
                </div>
            </form>

            <?php
            require ('connection.php');
            
            if (isset($_REQUEST['username'])) {
                // removes backslashes
                $username = stripslashes($_REQUEST['username']);
                //escapes special characters in a string
                $username = mysqli_real_escape_string($con, $username);
                $email    = stripslashes($_REQUEST['email']);
                $email    = mysqli_real_escape_string($con, $email);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con, $password);
                $phone = stripslashes($_REQUEST['phone']);
                $phone = mysqli_real_escape_string($con, $phone);
                $create_datetime = date("Y-m-d H:i:s");
                $query    = "INSERT into `users` (username, password, email,phone, create_datetime)
                             VALUES ('$username', '" . md5($password) . "', '$email',' $phone', '$create_datetime')";
                $result   = mysqli_query($con, $query);
                if ($result) {
                    echo "<div class='form text-center alert'>
                          <h3>You are registered successfully.</h3><br/>
                          <p class='link'>Click here to <a href='login.php'>Login</a></p>
                          </div>";
                } else {
                    echo "<div class='form'>
                          <h3>Required fields are missing.</h3><br/>
                          <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                          </div>";
                }
            }            
            
            ?>

        </div>
    </div>
</body>

</html>