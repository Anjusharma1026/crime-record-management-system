<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <title>Head Login</title>
    <?php
    if (isset($_POST['s'])) {
        session_start();
        $_SESSION['x'] = 1;
        
        $conn = mysqli_connect("localhost", "root", "", "crime_portal");
        if (!$conn) {
            die("Could not connect: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['email'];
            $pass = $_POST['password'];
            $result = mysqli_query($conn, "SELECT h_id, h_pass FROM head WHERE h_id='$name' AND h_pass='$pass'");

            if (mysqli_num_rows($result) == 0) {
                $message = "Id or Password not Matched.";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } else {
                header("location:headHome.php");
                exit();
            }
        }                
    }
    ?> 
    <style>
        body {
            color: black;
            background-image: url(locker.jpeg);
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Lato', sans-serif;
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.7);
            border: none;
        }
        .navbar-brand {
            font-weight: bold;
            color: #fff !important;
        }
        .nav > li > a {
            color: #fff !important;
        }
        .nav > li.active > a {
            background-color: #007bff !important;
            color: #fff !important;
        }
        .form-container {
            margin-top: 10%;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            max-width: 400px; /* Set a maximum width for the form */
            margin-left: auto; /* Center the form */
            margin-right: auto; /* Center the form */
        }
        h1 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group input {
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 40px;
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            text-align: center;
            line-height: 40px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="official_login.php">Official Login</a></li>
                    <li class="active"><a href="headlogin.php">HQ Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container form-container">
        <form method="post">
            <h1>HQ Login</h1>
            <div class="form-group">
                <label for="exampleInputEmail1"></label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter user id" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"></label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="s">Submit</button>
        </form>
    </div>
</body>
</html>
