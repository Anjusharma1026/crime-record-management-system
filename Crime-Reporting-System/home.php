<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crime Portal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(home.jpg) no-repeat center center fixed;
            background-size: cover;
            font-family: "Lato", sans-serif;
            color: white;
        }

        h1 {
            font-weight: 700;
            font-size: 4em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        h3 {
            font-weight: 300;
            font-size: 1.5em;
            margin-bottom: 40px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
        }

        .content {
            padding: 15% 0;
            text-align: center;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            padding: 15px 30px;
            font-size: 1.2em;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
        }

        hr {
            width: 250px;
            border-top: 1px solid #f8f8f8;
            margin: 20px auto;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.7);
            border: none;
        }

        .navbar-default .navbar-nav>li>a {
            color: white;
            transition: color 0.3s;
        }

        .navbar-default .navbar-nav>li>a:hover {
            color: #007bff;
        }

        .navbar-brand {
            font-size: 1.5em;
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home.php">Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="userlogin.php">User Login <i class="fa fa-user"></i></a></li>
                    <li><a href="official_login.php">Official Login <i class="fa fa-user"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content">
                    <h1>Online Criminal Complaint registration</h1>
                    <h3>Register Below &nbsp;&nbsp;<i class="fa fa-hand-o-down" aria-hidden="true"></i></h3>
                    <hr>
                    <a href="registration.php" class="btn btn-custom" role="button" aria-pressed="true">Sign Up!</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
