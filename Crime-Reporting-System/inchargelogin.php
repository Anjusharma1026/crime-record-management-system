<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet">
    <title>Incharge Login</title>

    <style>
        body {
            color: #fff;
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
            color: #fff;
            margin-bottom: 20px;
            text-align: center;
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
            $result = mysqli_query($conn, "SELECT i_id, i_pass FROM police_station WHERE i_id='$name' AND i_pass='$pass'");
            $_SESSION['email'] = $name;
            if (!$result || mysqli_num_rows($result) == 0) {
                echo "<script>alert('Id or Password not Matched.');</script>";
            } else {
                header("Location: incharge_complain_page.php");
                exit();
            }
        }
    }
    ?>

    <script>
    function f1() {
        var sta2 = document.getElementById("exampleInputEmail1").value;
        var sta3 = document.getElementById("exampleInputPassword1").value;
        if (sta2.includes(' ')) {
            alert("Space Not Allowed");
            document.getElementById("exampleInputEmail1").value = "";
            document.getElementById("exampleInputEmail1").focus();
        } else if (sta3.includes(' ')) {
            alert("Space Not Allowed");
            document.getElementById("exampleInputPassword1").value = "";
            document.getElementById("exampleInputPassword1").focus();
        }
    }
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php">Crime Portal</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="official_login.php">Official Login</a></li>
                    <li class="active"><a href="inchargelogin.php">Incharge Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container form-container">
        <form method="post">
            <h1>Incharge Login</h1>
            <div class="form-group">
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter user id" required onfocusout="f1()">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required onfocusout="f1()">
            </div>
            <button type="submit" class="btn btn-primary" name="s">Submit</button>
        </form>
    </div>
</body>
</html>
